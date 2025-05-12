<?php

namespace App\Livewire\Configuracion;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Almacen_Producto;
use App\Models\Almacen;
use Livewire\WithPagination;

class Productos extends Component
{
    use WithPagination;
    public $crearFormulario = false;
    public $modoEdicion = false;
    public $producto_id;
    public $nom_producto;
    public $codigo_venta;
    public $categoria_id;

    public $mostrarModal = false;
    public $detalleProducto;
    public $detalleAlmacenes = [];

    public function rules()
    {
        return [
            'nom_producto' => 'required|string|max:200|unique:productos,nom_producto,' . $this->producto_id,
            'codigo_venta' => 'required|string|max:50|unique:productos,codigo_venta,' . $this->producto_id,
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }

    protected $messages = [
        'nom_producto.unique' => 'Ya existe un producto con ese nombre.',
        'codigo_venta.unique' => 'El código de venta ya está en uso.',
        'categoria_id.required' => 'Debe seleccionar una categoría.',
    ];

    public function guardar()
    {
        $this->validate();

        $producto = Producto::create([
            'nom_producto' => $this->nom_producto,
            'codigo_venta' => $this->codigo_venta,
            'categoria_id' => $this->categoria_id,
        ]);

        $almacenes = Almacen::all();
        foreach ($almacenes as $almacen) {
            Almacen_Producto::create([
                'almacen_id' => $almacen->id,
                'producto_id' => $producto->id,
                'stock' => 0,
                'cantidad_optima' => 0,
                'cantidad_minima' => 0,
                'ubicacion' => '',
            ]);
        }

        $this->resetForm();
        session()->flash('success', 'Producto registrado correctamente.');
    }

    public function editar($id)
    {
        $p = Producto::findOrFail($id);
        $this->producto_id = $p->id;
        $this->nom_producto = $p->nom_producto;
        $this->codigo_venta = $p->codigo_venta;
        $this->categoria_id = $p->categoria_id;
        $this->crearFormulario = true;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate();

        Producto::findOrFail($this->producto_id)->update([
            'nom_producto' => $this->nom_producto,
            'codigo_venta' => $this->codigo_venta,
            'categoria_id' => $this->categoria_id,
        ]);

        $this->resetForm();
        session()->flash('success', 'Producto actualizado correctamente.');
    }

    public function eliminar($id)
    {
        Producto::findOrFail($id)->delete();
        session()->flash('success', 'Producto eliminado correctamente.');
    }

    public function resetForm()
    {
        $this->reset([
            'producto_id',
            'nom_producto',
            'codigo_venta',
            'categoria_id',
            'crearFormulario',
            'modoEdicion',
        ]);
    }


    public function render()
    {
        return view('livewire.configuracion.productos', [
            'productos' => Producto::with('categoria')->orderBy('nom_producto')->paginate(10),
            'categorias' => Categoria::orderBy('nom_categoria')->get()
        ]);
    }


    public function ver($id)
    {
        $this->detalleProducto = Producto::with('categoria')->findOrFail($id);

        $this->detalleAlmacenes = \DB::table('almacen_productos')
            ->join('almacenes', 'almacen_productos.almacen_id', '=', 'almacenes.id')
            ->where('producto_id', $id)
            ->select(
                'almacenes.nom_almacen',
                'almacen_productos.stock',
                'almacen_productos.cantidad_optima',
                'almacen_productos.cantidad_minima',
                'almacen_productos.ubicacion'
            )
            ->get();

        $this->mostrarModal = true;
    }


    public function cancelar()
    {
        $this->resetForm();
    }
}
