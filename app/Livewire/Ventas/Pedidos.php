<?php

namespace App\Livewire\Ventas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\ListaPrecio;
use Illuminate\Support\Facades\DB;

class Pedidos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $listaVigente;
    public $precios = [];
    public $cliente_id, $fecha_pedido, $fecha_entrega, $productos = [], $cantidades = [];
    public $crearFormulario = false;
    public $modoLectura = false;
    public $clientes = [], $productosLista = [];
    public $subtotales = [];
    public $totalPedido = 0;
    public $descripcion_pedido = '';
    public $comentarios = '';
    public $modoEdicion = false;
    public $pedido_id;

    public function mount()
    {
        if (empty($this->productos)) {
            $this->agregarProducto();
        }
        $this->clientes = Cliente::all();
        $this->productosLista = Producto::all();
        $this->fecha_pedido = date('Y-m-d');
        $this->fecha_entrega = date('Y-m-d');

        $this->listaVigente = ListaPrecio::where('estado', true)
            ->whereDate('fecha_inicio', '<=', now())
            ->whereDate('fecha_final', '>=', now())
            ->first();

        if (!$this->listaVigente) {
            session()->flash('error', 'No hay una lista de precios vigente. Por favor, cree una antes de continuar.');
        }
    }

    public function obtenerPrecio($producto_id)
    {
        if (!$this->listaVigente) return 0;

        return DB::table('lista_precios_productos')
            ->where('lista_precio_id', $this->listaVigente->id)
            ->where('producto_id', $producto_id)
            ->value('precio') ?? 0;
    }


    public function render()
    {
        return view('livewire.ventas.pedidos', [
            'pedidos' => Pedido::latest()->paginate(10),
            'clientes' => Cliente::all(),
            'productosLista' => Producto::all(),
        ]);
    }

    public function ver($id)
    {
        $pedido = Pedido::with('productos')->findOrFail($id);

        $this->pedido_id = $pedido->id;
        $this->cliente_id = $pedido->cliente_id;
        $this->descripcion_pedido = $pedido->descripcion_pedido;
        $this->comentarios = $pedido->comentarios;
        $this->fecha_pedido = $pedido->fecha_registro;
        $this->fecha_entrega = $pedido->fecha_entrega;

        $this->productos = $pedido->productos->pluck('id')->toArray();
        $this->cantidades = $pedido->productos->pluck('pivot.cantidad')->toArray();
        $this->precios = $pedido->productos->pluck('pivot.precio_unitario')->toArray();
        $this->subtotales = [];

        foreach ($this->productos as $index => $producto_id) {
            $cantidad = $this->cantidades[$index] ?? 0;
            $precio = $this->precios[$index] ?? 0;
            $this->subtotales[$index] = $cantidad * $precio;
        }

        $this->totalPedido = array_sum($this->subtotales);
        $this->modoLectura = true;
        $this->crearFormulario = true;
        $this->modoEdicion = false;
    }


    public function agregarProducto()
    {
        $index = count($this->productos);

        $this->productos[$index] = null;
        $this->cantidades[$index] = 1;
        $this->precios[$index] = 0;
        $this->subtotales[$index] = 0;
    }



    public function iniciarCreacion()
    {
        $this->resetForm();
        $this->crearFormulario = true;
        $this->modoLectura = false;
        $this->modoEdicion = false;
        $this->agregarProducto(); // ← importante
    }


    public function guardar()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion_pedido' => 'required|string|max:255',
            'fecha_pedido' => 'required|date',
            'productos' => 'required|array|min:1',
            'productos.*' => 'required|exists:productos,id',
            'cantidades.*' => 'required|integer|min:1',
        ], [
            'cliente_id.required' => 'Se debe seleccionar un cliente.',
            'descripcion_pedido.required' => 'Debe ingresar una descripción para el pedido.',
            'fecha_pedido.required' => 'La fecha del pedido es obligatoria.',
            'productos.required' => 'Adicione productos al pedido.',
            'productos.*.required' => 'Debe seleccionar productos para crear el pedido.',
            'productos.*.exists' => 'Al menos un producto no es válido.',
            'cantidades.*.required' => 'Debe indicar la cantidad de cada producto.',
            'cantidades.*.integer' => 'Las cantidades deben ser números enteros.',
            'cantidades.*.min' => 'La cantidad mínima debe ser al menos 1.',
        ]);

        DB::beginTransaction();
        try {
            $lista = ListaPrecio::where('estado', true)
                ->whereDate('fecha_inicio', '<=', now())
                ->whereDate('fecha_final', '>=', now())
                ->firstOrFail();

            // CREACIÓN O EDICIÓN
            if ($this->modoEdicion && $this->pedido_id) {
                $pedido = Pedido::findOrFail($this->pedido_id);

                $pedido->update([
                    'cliente_id' => $this->cliente_id,
                    'descripcion_pedido' => $this->descripcion_pedido,
                    'fecha_registro' => $this->fecha_pedido,
                    'fecha_entrega' => $this->fecha_entrega,
                    'estado_pedido' => 'pedido',
                    'comentarios' => $this->comentarios,
                    'lista_precio_id' => $lista->id,
                    'total_pedido' => 0 // temporal
                ]);

                // Eliminar productos anteriores
                $pedido->productos()->detach();
            } else {
                $pedido = Pedido::create([
                    'cliente_id' => $this->cliente_id,
                    'descripcion_pedido' => $this->descripcion_pedido,
                    'fecha_registro' => $this->fecha_pedido,
                    'fecha_entrega' => $this->fecha_entrega,
                    'estado_pedido' => 'pedido',
                    'comentarios' => $this->comentarios,
                    'lista_precio_id' => $lista->id,
                    'total_pedido' => 0 // temporal
                ]);
            }

            // Agregar productos
            $total = 0;
            foreach ($this->productos as $i => $producto_id) {
                $cantidad = $this->cantidades[$i];
                $precio = $this->precios[$i] ?? 0;
                $subtotal = $cantidad * $precio;

                $pedido->productos()->attach($producto_id, [
                    'cantidad' => $cantidad,
                    'precio_unitario' => $precio,
                    'precio_total' => $subtotal
                ]);

                $total += $subtotal;
            }

            $pedido->update(['total_pedido' => $total]);

            DB::commit();

            // Resetear formulario
            $this->resetForm();
            $this->crearFormulario = false;
            $this->modoEdicion = false;
            session()->flash('success', $this->modoEdicion ? 'Pedido actualizado.' : 'Pedido registrado correctamente.');
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }


    public function cancelar()
    {
        $this->reset(['cliente_id', 'productos', 'cantidades', 'fecha_pedido', 'crearFormulario']);
        $this->resetForm();
        $this->crearFormulario = false;
        $this->modoLectura = false;
        $this->modoEdicion = false;
    }

    public function actualizarPrecios()
    {
        if (!$this->listaVigente) return;

        foreach ($this->productos as $index => $producto_id) {
            if ($producto_id) {
                $precio = DB::table('lista_precios_productos')
                    ->where('lista_precio_id', $this->listaVigente->id)
                    ->where('producto_id', $producto_id)
                    ->value('precio') ?? 0;

                $this->precios[$index] = $precio;
            } else {
                $this->precios[$index] = 0;
            }
        }
    }

    public function obtenerPrecioVigente($producto_id)
    {
        return DB::table('productos as p')
            ->join('lista_precios_productos as lpp', 'p.id', '=', 'lpp.producto_id')
            ->join('lista_precios as lp', 'lpp.lista_precio_id', '=', 'lp.id')
            ->where('p.id', $producto_id)
            ->where('lp.estado', true)
            ->whereDate('lp.fecha_inicio', '<=', now())
            ->whereDate('lp.fecha_final', '>=', now())
            ->select('lpp.precio')
            ->value('precio') ?? 0;
    }

    public function updated($name, $value)
    {
        logger("Cambiado: $name = $value"); // Verificá en storage/logs/laravel.log
        foreach ($this->productos as $index => $producto_id) {
            $precio = $this->obtenerPrecioVigente($producto_id);
            $this->precios[$index] = $precio;

            $cantidad = $this->cantidades[$index] ?? 0;
            $this->subtotales[$index] = $cantidad * $precio;
        }

        $this->totalPedido = array_sum($this->subtotales);
    }

    public function updatedProductos($value, $index)
    {
        $this->actualizarLinea($index);
    }

    public function updatedCantidades($value, $index)
    {
        $this->actualizarLinea($index);
    }

    public function actualizarLinea($index)
    {
        if (!isset($this->productos[$index])) return;

        $producto_id = $this->productos[$index];
        $cantidad = $this->cantidades[$index] ?? 1;

        if ($producto_id) {
            $precio = $this->obtenerPrecioVigente($producto_id);
            $this->precios[$index] = $precio;
            $this->subtotales[$index] = $precio * $cantidad;
        } else {
            $this->precios[$index] = 0;
            $this->subtotales[$index] = 0;
        }

        $this->totalPedido = array_sum($this->subtotales);
    }



    public function resetForm()
    {
        $this->cliente_id = '';
        $this->descripcion_pedido = '';
        $this->comentarios = '';
        $this->fecha_pedido = date('Y-m-d');
        $this->fecha_entrega = date('Y-m-d');

        $this->productos = [];
        $this->cantidades = [];
        $this->precios = [];
        $this->subtotales = [];
        $this->totalPedido = 0;
    }

    public function editar($id)
    {
        $pedido = Pedido::with('productos')->findOrFail($id);

        if (in_array($pedido->estado_pedido, ['entregado', 'facturado'])) {
            session()->flash('error', 'No se puede editar un pedido entregado o facturado.');
            return;
        }

        $this->pedido_id = $pedido->id;
        $this->cliente_id = $pedido->cliente_id;
        $this->descripcion_pedido = $pedido->descripcion_pedido;
        $this->comentarios = $pedido->comentarios;
        $this->fecha_pedido = $pedido->fecha_registro;
        $this->fecha_entrega = $pedido->fecha_entrega;

        $this->productos = $pedido->productos->pluck('id')->toArray();
        $this->cantidades = $pedido->productos->pluck('pivot.cantidad')->toArray();
        $this->precios = $pedido->productos->pluck('pivot.precio_unitario')->toArray();
        $this->subtotales = [];

        foreach ($this->productos as $index => $producto_id) {
            $cantidad = $this->cantidades[$index] ?? 0;
            $precio = $this->precios[$index] ?? 0;
            $this->subtotales[$index] = $cantidad * $precio;
        }

        $this->totalPedido = array_sum($this->subtotales);
        $this->modoLectura = false;
        $this->modoEdicion = true;
        $this->crearFormulario = true;
    }


    public function cambiarEstado($id)
    {
        $pedido = Pedido::findOrFail($id);

        // 🚫 Si ya está facturado, no permitimos cambiarlo
        if ($pedido->estado_pedido === 'facturado') {
            session()->flash('error', 'No se puede cambiar el estado de un pedido ya facturado.');
            return;
        }

        // Cambiar estado según el flujo: pedido → entregado → facturado
        if ($pedido->estado_pedido === 'pedido') {
            $pedido->estado_pedido = 'entregado';
        } elseif ($pedido->estado_pedido === 'entregado') {
            $pedido->estado_pedido = 'facturado';
        }

        $pedido->save();
        session()->flash('success', 'Estado actualizado correctamente.');
    }


    public function eliminar($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        session()->flash('success', 'Pedido eliminado correctamente.');
    }
}
