
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Soporte</title>
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Bootstrap Stylesheet [ REQUIRED ] {{asset('../resources/vendor/fontawesome-free/css/all.min.css')}}-->
    <link href="{{asset('../resources/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--Morris.js [ OPTIONAL ]-->
    <link href="{{asset('../resources/css/themes/type-d/theme-navy.min.css')}}" rel="stylesheet">
    <!--Morris.js [ OPTIONAL ]-->
    <link href="{{asset('../resources/plugins/morris-js/morris.min.css')}}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{asset('../resources/css/nifty.min.css')}}" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{asset('../resources/css/demo/nifty-demo-icons.min.css')}}" rel="stylesheet">


    <!--====================Mapas=============================-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
    <link href=" https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{asset('../resources/plugins/pace/pace.min.css')}}" rel="stylesheet">
    <style>
        .invalid-feedback {
            color: red;
            font-weight: bold;
        }
    </style>
    

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{asset('../resources/css/demo/nifty-demo.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

    
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
              
                <!--================================-->
                <!--End brand logo & name-->
                
                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->
                        <!--Search-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="mega-dropdown">
                            <a href="#" class="mega-dropdown-toggle">
                                <i class="demo-pli-layout-grid"></i>
                            </a>
                            <div class="dropdown-menu mega-dropdown-menu">
                                <div class="row">
                                    <div class="col-sm-4 col-md-3">

                                        <!--Mega menu list-->
                                        <ul class="list-unstyled">
									        <li class="dropdown-header"><i class="demo-pli-file icon-lg icon-fw"></i> Creación de Cajas</li>
									        <li><a href="#">Crear Nueva Caja</a></li>
									                                                </ul>
   
                                    </div>
                                    
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Search-->

                    </ul>
                    <ul class="nav navbar-top-links">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <i class="demo-pli-bell"></i>
                                <span class="badge badge-header badge-danger"></span>
                            </a>
                            <!--Notification dropdown menu-->
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <div class="nano scrollable">
                                    <div class="nano-content">
                                        <ul class="head-list">
                                            <li>
                                                <a class="media" data-toggle="modal" data-target=".bd-usernew-modal-lg" data-dismiss="modal" onclick="NuevosUser() " href="">
                                                    <div class="media-left">
                                                        <i class="demo-pli-add-user-star icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Nuevos usuarios sin Catastro</p>
                                                        <small>4 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
						<!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <i class="demo-pli-male"></i>
                                </span>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--You can also display a user name in the navbar.-->
                                <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            </a>
							<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    
                                    <li>
                                        <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"> <i class="demo-pli-unlock icon-lg icon-fw"></i>
                                         </a>
                                        
                                    </form>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->
            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->
            <div class="boxed">
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
					<!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					</ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            @yield('content')
                           
                            <!--===================================================-->
                            <!--End Buttons Addon-->
                        </div>
                        </div>
					</div>			
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">
                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                              
                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================-->
                                <!--End shortcut buttons-->
                                <ul id="mainnav-menu" class="list-group">
	<!--Category name-->
                                <li class="list-header">Navegacion</li>
                                    <li>
                                    <a href="{{ url('/home') }}">
                                        <i class="demo-pli-home"></i>
                                        <span class="menu-title">
                                            Inicio
                                        </span>
                                    </a>
                                </li>
                                    <li class="list-divider"></li>	
                                    
                                
                               
                            </li>
                            <!--Menu list item-->
                            
                
                            <!--Menu list item-->
                            
                          
                                    
                            
                            <!--Menu list item-->
                            <li>
                                    <a href="#">
                                        <i class="demo-pli-data-storage"></i>
                                        <span class="menu-title">Almacén / Inventario</span>
                                        <i class="arrow"></i>
                                    </a>
                   
                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="{{url('movimientos/index')}}">Movimientos</a></li>
                                        <li><a href="{{route('productos.index')}}">Productos /Servicio</a></li>
                                        <li class="list-divider"></li>
                                        <li>
                                            @php
                                                $Operaciones = App\Models\Movimientosbasico::orderBy('id','desc')->get();
                                            @endphp
                                            <a href="#">Operaciones  Almacen<i class="arrow"></i></a>
                                                
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                @foreach ($Operaciones as $movimiento)
                                                    <li><a href="">{{$movimiento->Descripcion}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li><li class="list-divider"></li>
                                        <li>
                                            <a href="#">Parametrizar Basicos<i class="arrow"></i></a>

                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="{{route('bodegas.index')}}">Bodegas</a></li>
                                                <li><a href="{{route('movimientosbasicos.index')}}">Movimientos Basicos</a></li>
                                                <li><a href="#">Unidad Medidas</a></li>
                                                <li><a href="#">Familias 1</a></li>
                                                <li><a href="#">Familia 2</a></li>
                                                <li><a href="#">Familia 3</a></li>
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                            <li class="list-divider"></li>
                          
                            
                        <!--Category name-->
                        <li>
                                <a href="#">
                                <i class="demo-pli-tag "></i>
                                    <span class="menu-title">Venta/POS

                                    </span>
                                    <i class="arrow"></i>
                                </a>
                                <!--Submenu-->
                                <ul class="collapse">
                                    <li><a href="{{route('empresas.index')}}">Empresas</a></li>   
                                </ul>
                            </li>
                            <li class="list-divider"></li>
                             <!--Category name-->
                        <li>
                            <a href="#">
                            <i class="demo-pli-cart-coin"></i>
                                <span class="menu-title">Compras

                                </span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('empresas.index')}}">Empresas</a></li>   
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                         <!--Category name-->
                         <li>
                            <a href="#">
                            <i class="demo-pli-male-female"></i>
                                <span class="menu-title">Recursos Humanos

                                </span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('empresas.index')}}">Empresas</a></li>   
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                         <!--Category name-->
                         <li>
                            <a href="#">
                            <i class="demo-pli-file"></i>
                                <span class="menu-title">Contabilidad /Finanzas
                                    
                                </span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('impuestos.index')}}">Impuestos</a></li>   
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                         <!--Category name-->
                         <li>
                            <a href="#">
                            <i class="demo-pli-basket-coins"></i>
                                <span class="menu-title">Producto

                                </span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('empresas.index')}}">Empresas</a></li>   
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li>
                            <a href="#">
                            <i class="demo-pli-gear"></i>
                                <span class="menu-title">Parametrizar Basica

                                </span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('usuariobasicos.index')}}">Usuario</a></li>  
                                <li><a href="{{route('cajas.index')}}">Parametizar Cajas</a></li>    
                                <li><a href="{{route('bancos.index')}}">Bancos</a></li>   
                                <li><a href="{{route('cuentas.index')}}">Cuentas</a></li>   
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                         <!--Category name-->
                         <li>
                            <a href="#">
                            <i class="demo-pli-support"></i>
                                <span class="menu-title">Sistemas/Tecnico

                                </span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="{{route('empresas.index')}}">Empresas</a></li>   
                            </ul>
                        </li>
                        
                         <!--Category name-->
                      
                        
                        
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!--================================-->
                <!--End menu-->

            </div>
        </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>
        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            
            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">
                HelpDesk 1.0
            </div>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <p class="pad-lft">&#0169; 2022 @InputSystem</p>
        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->
        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <script>var CSRF = '{{ csrf_token() }}';</script>
    <!-- Scripts principales -->
    <script src="{{asset('../resources/js/jquery.min.js')}}"></script>
    <script src="{{asset('../resources/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('../resources/js/nifty.min.js')}}"></script>
    
    <!-- Scripts de demostración y plugins -->
    <script src="{{asset('../resources/js/demo/nifty-demo.min.js')}}"></script>
    <script src="{{asset('../resources/plugins/fooTable/dist/footable.all.min.js')}}"></script>
    <script src="{{asset('../resources/plugins/morris-js/morris.min.js')}}"></script>
    <script src="{{asset('../resources/plugins/morris-js/raphael-js/raphael.min.js')}}"></script>
    
    <!-- DataTables y sus extensiones -->
    <script src="{{asset('../resources/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('../resources/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('../resources/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
    
    <!-- Configuración de DataTables -->
    <script>
    $(document).ready(function() {
        $('table').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
            }
        });
    });
    </script>
    
    <!-- Token CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>var CSRF = '{{ csrf_token() }}';</script>
    
    <!-- Scripts adicionales -->
    <script src="{{asset('../resources/js/demo/dashboard.js')}}"></script>
    <script src="{{asset('../resources/js/input.js')}}"></script>
    <script src="{{asset('../resources/plugins/pace/pace.min.js')}}"></script>
    
    <!-- Scripts de Flot Charts -->
    <script src="{{asset('../resources/plugins/flot-charts/jquery.flot.min.js')}}"></script>
    <script src="{{asset('../resources/plugins/flot-charts/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('../resources/plugins/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('../resources/plugins/flot-charts/jquery.flot.categories.min.js')}}"></script>
    <script src="{{asset('../resources/plugins/flot-charts/jquery.flot.orderBars.min.js')}}"></script>

</body>


</html>

<script> 

</script>

