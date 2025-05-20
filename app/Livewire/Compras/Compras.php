<?php

namespace App\Livewire\Modulos\Compras;

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

    public $proveedores = [];
    public $productos = [];

    public function mount()
    {
        $this->fecha_pedido = date('Y-m-d');
        $this->fecha_ingreso = date('Y-m-d');
        $this->proveedores = Proveedor::where('estado', 1)->get();
        $this->productos = Producto::all();
        $this->agregarDetalle(); // Al menos un detalle
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
        $this->detalles = array_values($this->detalles); // Reindexar
        $this->calcularTotal();
    }

    public function updatedDetalles()
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

            session()->flash('success', 'Guía de ingreso registrada correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error al guardar: ' . $e->getMessage());
        }
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
        $this->agregarDetalle();
    }

    public function render()
    {
        return view('livewire.compras.compras');
    }
}
