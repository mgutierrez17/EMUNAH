<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use Illuminate\Routing\RouteGroup;

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ReporteProductoController;
use App\Http\Controllers\PedidoController;
use App\Livewire\SociosNegocio\Proveedores;
use App\Livewire\SociosNegocio\Clientes;
use App\Livewire\Ventas\Pedidos;


Route::get('/', function () {
    return view('auth.login');
    // login modificado con estilos notika auth/login.blade.php
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('home');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('index');
    })->name('home');
});



//// Modulos 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /// Ventas

    /*
    Route::get('/pedidos', function () {
        return view('modulos.ventas.pedidos');
    })->name('pedidos');
*/
    Route::view('/ventas/pedidos', 'modulos.ventas.pedidos')->name('pedidos.index');
    Route::get('/ventas/pedidos/pdf/{id}', [PedidoController::class, 'generarPDF'])->name('pedidos.pdf');


    Route::get('/reporte_ventas', function () {
        return view('modulos.ventas.reporte_ventas');
    })->name('reporte_ventas');
    /// Compras
    Route::get('/compras', function () {
        return view('modulos.compras.compras');
    })->name('compras');
    Route::get('/reporte_compras', function () {
        return view('modulos.compras.reporte_compras');
    })->name('reporte_compras');
    /// Inventario
    Route::get('/productos', function () {
        return view('modulos.inventario.productos');
    })->name('productos');

    Route::get('/reporte-productos', [ReporteProductoController::class, 'index'])->name('reporte.productos');
    Route::get('/reporte-productos/pdf', [ReporteProductoController::class, 'exportarPDF'])->name('reporte.productos.pdf');
    Route::get('/reporte-productos/excel', [ReporteProductoController::class, 'exportarExcel'])->name('reporte.productos.excel');



    //     Route::get('/reporte_productos', function () { return view('modulos.inventario.reporte_productos'); })->name('reporte_productos');

    /// clientes/proveedores
    Route::get('/cliente', function () {
        return view('modulos.socios_negocio.clientes');
    })->name('cliente');
    //    Route::get('/socios-negocio/clientes', Clientes::class)->name('clientes.index');
    Route::get('/proveedor', function () {
        return view('modulos.socios_negocio.proveedores');
    })->name('proveedor');
    //    Route::get('/socios-negocio/proveedores', \App\Livewire\SociosNegocio\Proveedores::class)->name('proveedores.index');


    /// configuracion
    Route::get('/empresa', function () {
        return view('modulos.configuracion.empresa');
    })->name('empresa');
    Route::get('/categorias_productos', function () {
        return view('modulos.configuracion.categorias');
    })->name('categorias_productos');
    Route::get('/almacenes_productos', function () {
        return view('modulos.configuracion.almacenes');
    })->name('almacenes');
});


Route::post('/almacenes', [AlmacenController::class, 'store'])->name('almacenes.store');



///  prueba de ruta 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('home');
});

Route::get('/configuracion/empresa', function () {
    return view('modulos.configuracion.empresa');
})->middleware(['auth']);

Route::get('/listas_precios', function () {
    return view('modulos.configuracion.listas_precios');
})->name('listas_precios')->middleware(['auth']);

Route::get('/empleados', function () { return view('modulos.recursos_humanos.empleados'); })->name('empleados');

Route::view('/configuracion/listas-precios', 'modulos.configuracion.listas_precios')->name('lista_precios.index');
Route::get('/configuracion/lista-precios/ver/{id}', [ListaPrecioController::class, 'ver'])->name('lista_precios.ver');
Route::get('/configuracion/lista-precios/editar/{id}', [ListaPrecioController::class, 'editar'])->name('lista_precios.editar');

