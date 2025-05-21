<?php


namespace App\Livewire\Compras;

use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\GuiaIngreso;
use App\Models\GuiaIngresoDetalle;
use Illuminate\Support\Facades\DB;

class Compras extends Component
{
    public $descripcion_ingreso, $fecha_pedido, $fecha_ingreso;
    public $estado_ingreso = 'Pendiente', $comentario = '';
    public $total_ingreso = 0, $descuento_ingreso = 0;
    public $proveedor_id;
    public $detalles = [];
    public $ingresos;
    public $proveedores = [];
    public $productos = [];
    public $modoFormulario = false;
    public $modoLectura = false;
    public $modoEdicion = false;
    public $ingreso_id;

    public function mount()
    {
        $this->fecha_pedido = date('Y-m-d');
        $this->fecha_ingreso = date('Y-m-d');
        $this->proveedores = Proveedor::where('estado', 1)->get();
        $this->productos = Producto::all();
        $this->ingresos = GuiaIngreso::with('proveedor')->orderBy('id', 'desc')->get();
    }

    public function agregarDetalle()
    {
        $this->detalles[] = [
            'producto_id' => '',
            'precio_unitario' => 0,
            'cantidad' => 1,
        ];
        $this->calcularTotal();
    }

    public function eliminarDetalle($index)
    {
        unset($this->detalles[$index]);
        $this->detalles = array_values($this->detalles);
        $this->calcularTotal();
    }

    public function updatedDetalles($value, $name)
    {
        $this->calcularTotal();
    }

    public function updatedDescuentoIngreso()
    {
        $this->calcularTotal();
    }

    public function calcularTotal()
    {
        $total = 0;
        foreach ($this->detalles as $detalle) {
            $subtotal = $detalle['precio_unitario'] * $detalle['cantidad'];
            $total += $subtotal;
        }
        $this->total_ingreso = $total - $this->descuento_ingreso;
    }

    public function guardarGuiaIngreso()
    {
        $this->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha_pedido' => 'required|date',
            'fecha_ingreso' => 'required|date',
            'estado_ingreso' => 'required',
            'detalles.*.producto_id' => 'required|exists:productos,id',
            'detalles.*.precio_unitario' => 'required|numeric|min:0',
            'detalles.*.cantidad' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            if ($this->modoEdicion && $this->ingreso_id) {
                $guia = GuiaIngreso::findOrFail($this->ingreso_id);
                $guia->update([
                    'descripcion_ingreso' => $this->descripcion_ingreso,
                    'fecha_pedido' => $this->fecha_pedido,
                    'fecha_ingreso' => $this->fecha_ingreso,
                    'estado_ingreso' => $this->estado_ingreso,
                    'comentario' => $this->comentario,
                    'total_ingreso' => $this->total_ingreso,
                    'descuento_ingreso' => $this->descuento_ingreso,
                    'proveedor_id' => $this->proveedor_id,
                ]);
                // Eliminar detalles anteriores
                $guia->detalles()->delete();
            } else {
                $guia = GuiaIngreso::create([
                    'descripcion_ingreso' => $this->descripcion_ingreso,
                    'fecha_pedido' => $this->fecha_pedido,
                    'fecha_ingreso' => $this->fecha_ingreso,
                    'estado_ingreso' => $this->estado_ingreso,
                    'comentario' => $this->comentario,
                    'total_ingreso' => $this->total_ingreso,
                    'descuento_ingreso' => $this->descuento_ingreso,
                    'proveedor_id' => $this->proveedor_id,
                ]);
            }


            foreach ($this->detalles as $detalle) {
                GuiaIngresoDetalle::create([
                    'guia_ingreso_id' => $guia->id,
                    'producto_id' => $detalle['producto_id'],
                    'precio_unitario' => $detalle['precio_unitario'],
                    'cantidad' => $detalle['cantidad'],
                    'precio_total' => $detalle['precio_unitario'] * $detalle['cantidad'],
                ]);
            }

            DB::commit();

            $this->resetForm();
            $this->modoFormulario = false;
            $this->ingresos = GuiaIngreso::with('proveedor')->orderBy('id', 'desc')->get();
            session()->flash('success', 'Guía de ingreso registrada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error al guardar: ' . $e->getMessage());
        }
    }

    public function ver($id)
    {
        $ingreso = GuiaIngreso::with('detalles')->findOrFail($id);
        $this->fill($ingreso);
        $this->detalles = $ingreso->detalles->map(function ($item) {
            return [
                'producto_id' => $item->producto_id,
                'precio_unitario' => $item->precio_unitario,
                'cantidad' => $item->cantidad,
            ];
        })->toArray();
        $this->modoFormulario = true;
        $this->modoLectura = true;
        $this->modoEdicion = false;
    }

    public function editar($id)
    {
        $ingreso = GuiaIngreso::with('detalles')->findOrFail($id);
        $this->ingreso_id = $ingreso->id;

        $this->descripcion_ingreso = $ingreso->descripcion_ingreso;
        $this->fecha_pedido = $ingreso->fecha_pedido;
        $this->fecha_ingreso = $ingreso->fecha_ingreso;
        $this->estado_ingreso = $ingreso->estado_ingreso;
        $this->comentario = $ingreso->comentario;
        $this->total_ingreso = $ingreso->total_ingreso;
        $this->descuento_ingreso = $ingreso->descuento_ingreso;
        $this->proveedor_id = $ingreso->proveedor_id;
        $this->ingreso_id = $ingreso->id;

        $this->detalles = $ingreso->detalles->map(function ($item) {
            return [
                'producto_id' => $item->producto_id,
                'precio_unitario' => $item->precio_unitario,
                'cantidad' => $item->cantidad,
            ];
        })->toArray();
        $this->modoFormulario = true;
        $this->modoLectura = false;
        $this->modoEdicion = true;
    }

    public function cambiarEstado($id)
    {
        $ingreso = GuiaIngreso::findOrFail($id);

        if ($ingreso->estado_ingreso === 'Pendiente') {
            $ingreso->estado_ingreso = 'Completado';
        } elseif ($ingreso->estado_ingreso === 'Completado') {
            $ingreso->estado_ingreso = 'Anulado';
        }

        $ingreso->save();
        $this->ingresos = GuiaIngreso::with('proveedor')->orderBy('id', 'desc')->get();
    }

    public function eliminar($id)
    {
        $ingreso = GuiaIngreso::findOrFail($id);
        $ingreso->detalles()->delete();
        $ingreso->delete();
        $this->ingresos = GuiaIngreso::with('proveedor')->orderBy('id', 'desc')->get();
        session()->flash('success', 'Guía de ingreso eliminada.');
    }

    public function mostrarFormulario()
    {
        $this->resetForm();
        $this->modoFormulario = true;
        $this->modoLectura = false;
        $this->modoEdicion = false;
    }

    public function resetForm()
    {
        $this->descripcion_ingreso = '';
        $this->fecha_pedido = date('Y-m-d');
        $this->fecha_ingreso = date('Y-m-d');
        $this->estado_ingreso = 'Pendiente';
        $this->comentario = '';
        $this->total_ingreso = 0;
        $this->descuento_ingreso = 0;
        $this->proveedor_id = null;
        $this->detalles = [];
        $this->ingreso_id = null;
        $this->agregarDetalle();
    }

    public function render()
    {
        return view('livewire.compras.compras');
    }

    public function cancelar()
    {
        $this->resetForm();
        $this->modoFormulario = false;
        $this->modoLectura = false;
        $this->modoEdicion = false;
    }
}
