<?php

namespace App\Livewire\RecursosHumanos;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Empleado;
use App\Models\Almacen;
use App\Models\Area;
use App\Models\User;

class Empleados extends Component
{
    use WithFileUploads;
    public $mostrarFormulario = false;
    public $modoLectura = false;

    public $nombre, $apellido, $telefono, $direccion, $correo;
    public $nro_carnet, $fecha_nacimiento, $fecha_contratacion, $foto;
    public $almacen_id, $area_id, $usuario_id;
    public $empleados = [];

    public $crearFormulario = false;
    public $modoEdicion = false;
    public $empleado_id;

    public $usuarios = [], $almacenes = [], $areas = [];

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'correo',
        'nro_carnet',
        'fecha_nacimiento',
        'fecha_contratacion',
        'area_id',
        'almacen_id',
        'user_id',
        'foto'
    ];

    public function mount()
    {
        $this->usuarios = User::all();
        $this->almacenes = Almacen::all();
        $this->areas = Area::all();
    }
    public function render()
    {
        return view('livewire.recursos-humanos.empleados', [
            'empleados' => Empleado::with('area', 'almacen', 'usuario')->get()
        ]);
    }

    public function mostrarFormulario()
    {
        $this->resetForm();
        $this->crearFormulario = true;
        $this->modoEdicion = false;
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:200',
            'correo' => 'nullable|email|max:100',
            'nro_carnet' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'fecha_contratacion' => 'required|date',
            'almacen_id' => 'required|exists:almacenes,id',
            'area_id' => 'required|exists:areas,id',
            'usuario_id' => 'required|exists:users,id',
            'foto' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        $rutaFoto = null;
        if ($this->foto) {
            $rutaFoto = $this->foto->store('img/empleados', 'public');
        }

        Empleado::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'correo' => $this->correo,
            'nro_carnet' => $this->nro_carnet,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'fecha_contratacion' => $this->fecha_contratacion,
            'area_id' => $this->area_id,
            'almacen_id' => $this->almacen_id,
            'user_id' => $this->user_id,
            'foto' => $rutaFoto,
        ]);

        session()->flash('success', 'Empleado registrado correctamente.');

        $this->resetForm();
        $this->mostrarFormulario = false;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:200',
            'correo' => 'required|email|unique:empleados,correo,' . $this->empleado_id,
            'nro_carnet' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'fecha_contratacion' => 'required|date',
            'area_id' => 'required|exists:areas,id',
            'almacen_id' => 'required|exists:almacenes,id',
            'user_id' => 'required|exists:users,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function resetForm()
    {
        $this->reset([
            'nombre',
            'apellido',
            'telefono',
            'direccion',
            'correo',
            'nro_carnet',
            'fecha_nacimiento',
            'fecha_contratacion',
            'almacen_id',
            'area_id',
            'foto',
            'empleado_id'
        ]);
    }

    public function cancelar()
    {
        $this->resetForm();
        $this->crearFormulario = false;
    }

    public function crear()
    {
        $this->resetForm();
        $this->mostrarFormulario = true;
        $this->modoEdicion = false;
        $this->modoLectura = false;
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'nro_carnet.required' => 'El número de carnet es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_contratacion.required' => 'La fecha de contratación es obligatoria.',
            'almacen_id.required' => 'Debe seleccionar un almacén.',
            'almacen_id.exists' => 'El almacén seleccionado no es válido.',
            'area_id.required' => 'Debe seleccionar un área.',
            'area_id.exists' => 'El área seleccionada no es válida.',
            'usuario_id.required' => 'Debe seleccionar un usuario.',
            'usuario_id.exists' => 'El usuario seleccionado no es válido.',
            'correo.email' => 'Debe ingresar un correo válido.',
            'foto.image' => 'El archivo debe ser una imagen.',
            'foto.mimes' => 'La imagen debe ser formato JPG o PNG.',
            'foto.max' => 'La imagen no debe superar los 2MB.',
        ];
    }
}
