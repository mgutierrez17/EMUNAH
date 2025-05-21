<div>

    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="{{ route('home') }}">Principal</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Ventas</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('pedidos.index') }}">Pedidos de Cliente</a></li>
                                        <li><a href="{{ route('reporte_ventas') }}">Reporte de Ventas</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Compras</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('compras') }}">Compras Proveedor</a></li>
                                        <li><a href="{{ route('reporte_compras') }}">Reporte de Compras</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Inventario</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('productos') }}">Productos</a></li>
                                        <li><a href="{{ route('reporte.productos') }}">Reporte de Productos</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Clientes/Proveedores</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('cliente') }}">Clientes</a></li>
                                        <li><a href="{{ route('proveedor') }}">Proveedores</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Configuracion</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('empresa') }}">Empresa</a></li>
                                        <li><a href="{{ route('categorias_productos') }}">Categorias de Productos</a></li>
                                        <li><a href="{{ route('almacenes') }}">Almacenes</a></li>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a href="{{ route('home') }}"><i
                                    class="notika-icon notika-house"></i>Principal</a>
                        </li>
                        <li><a data-toggle="tab" href="#ventas"><i class="notika-icon notika-promos"></i> Ventas</a>
                        </li>
                        <li><a data-toggle="tab" href="#compras"><i class="notika-icon notika-edit"></i> Compras</a>
                        </li>
                        <li><a data-toggle="tab" href="#inventario"><i
                                    class="notika-icon notika-support"></i>Inventario</a>
                        </li>
                        <li><a data-toggle="tab" href="#cliente_proveedor"><i
                                    class="notika-icon notika-finance"></i>Clientes/Proveedores</a>
                        </li>
                        <li><a data-toggle="tab" href="#configuracion"><i
                                    class="notika-icon notika-config"></i>Configuracion</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                        </div>
                        <div id="ventas" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('pedidos.index') }}">{{ __('Pedidos de Clientes') }}</a>
                                </li>
                                <li><a href="{{ route('reporte_ventas') }}">{{ __('Reporte de Ventas') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div id="compras" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('compras') }}">{{ __('Compras Proveedor') }}</a>
                                </li>
                                <li><a href="{{ route('reporte_compras') }}">{{ __('Reporte de Compras') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div id="inventario" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('productos') }}">{{ __('Productos') }}</a>
                                </li>
                                <li><a href="{{ route('reporte.productos') }}">{{ __('Reporte de Productos') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div id="cliente_proveedor" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('cliente') }}">{{ __('Clientes') }}</a>
                                </li>
                                <li><a href="{{ route('proveedor') }}">{{ __('Proveedores') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div id="configuracion" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('empresa') }}">{{ __('Empresa') }}</a>
                                </li>
                                <li><a
                                        href="{{ route('categorias_productos') }}">{{ __('Categorias de Productos') }}</a>
                                </li>
                                <li><a href="{{ route('almacenes') }}">{{ __('Almacenes') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->


</div>