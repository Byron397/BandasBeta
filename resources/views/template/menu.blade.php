<!-- navbar -->
<section class="page-section" id="navbar">
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-inline-block" href="/">
                <p class="hover-text"><img src="imagenes/logo.jpg" width="35" height="35" class="d-inline-block align-top rounded-circle" alt=".." /> BandasBeta</p>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                
                @if(isset($usuario))
                    <li class="nav-item"><a class="nav-link" href="#"><p class="hover-text">Usuario: {{ $usuario->nombre }} {{ $usuario->ap_pat }}</p></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/#nosotros"><p class="hover-text">Nosotros</p></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/#bandas"><p class="hover-text">Bandas</p></a></li>
                    @if($usuario->tipo_usuario === 'banda')
                        <li class="nav-item"><a class="nav-link text-white" href="/perfil"><p class="hover-text">Mi Perfil</p></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/perfil#mis_eventos"><p class="hover-text">Mis Eventos</p></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/perfil#archivo_formulario"><p class="hover-text">Fotos/Videos</p></a></li>
                    @elseif($usuario->tipo_usuario === 'cliente')
                        <li class="nav-item"><a class="nav-link text-white" href="/cliente"><p class="hover-text">Mi Perfil</p></a></li>
                    @elseif($usuario->tipo_usuario == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle custom-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="usuarios" data-toggle="tooltip" data-placement="bottom">Administrar Usuarios</a>
                                <a class="dropdown-item" href="bandas" data-toggle="tooltip" data-placement="bottom">Administrar Bandas</a>
                                <a class="dropdown-item" href="eventos" data-toggle="tooltip" data-placement="bottom">Administrar Eventos</a>
                                <a class="dropdown-item" href="multimedia" data-toggle="tooltip" data-placement="bottom">Administrar Multimedia</a>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="cerrarsesion"><i class="bi bi-box-arrow-right hover-text"></i></a></li>
                @else
                    <li class="nav-item"><a class="nav-link text-white" href="/#nosotros"><p class="hover-text">Nosotros</p></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/#bandas"><p class="hover-text">Bandas</p></a></li>
                    <li class="nav-item">
                        <!-- Button trigger modal Login -->
                        <a class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">
                            <p class="hover-text">Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- Button trigger modal Registro -->
                        <a class="nav-link text-white" data-toggle="modal" data-target="#exampleModal2">
                            <p class="hover-text">Registro</p>
                        </a>
                    </li>
                    <!-- Modal Login-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content text-white modal-border">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mr-2">
                                            <h5>Login</h5>
                                        </div>
                                        <div class="col ml-2">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                                            <span aria-hidden="true">&times;</span>
                                        </div>
                                    </div><br/>
                                    <form  role="form" class="contactForm" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group d-flex align-items-center">
                                            <i class="bi bi-person-badge form-control-feedback" style="color: red;"></i>&nbsp;
                                            <input type="email" name="correo" class="custom-input form-control form-control-sm text-white bg-transparent border-top-0 border-left-0 border-right-0" 
                                            placeholder="Ingresa tu correo" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                        </div></br>
                                        <div class="form-group d-flex align-items-center">
                                            <i class="bi bi-file-lock2-fill form-control-feedback" style="color: red;"></i>&nbsp;
                                            <input type="password" name="password" class="custom-input form-control form-control-sm text-white bg-transparent border-top-0 border-left-0 border-right-0" 
                                            placeholder="Password" data-msg="Capturar password" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Registro-->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content text-white modal-border">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mr-2">
                                            <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                                        </div>
                                        <div class="col ml-2">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div><br/>
                                    <form method="POST" role="form" class="contactForm" action="register">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm text-capitalize text-white bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" name="nombre" id="nombre" required>
                                                    <label for="">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm text-capitalize text-white bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" name="ap_pat" id="ap_pat" required>
                                                    <label for="">Apellido Paterno</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">                                                    
                                                    <input type="text" name="ap_mat" class="form-control form-control-sm text-capitalize text-white bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" id="ap_mat" required/>
                                                    <label for="">Apellido Materno</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" name="tipo_usuario" id="exampleSelect" required>
                                                        <option value="">Selecciona</option>
                                                        <option value="cliente">Cliente</option>
                                                        <option value="banda">Banda</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-sm text-white bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" name="correo" id="correo" required>
                                                    <label for="">Correo electronico</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-sm text-white bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" name="password" required data-msg="Capturar password"/>
                                                    <label for="">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-danger btn-sm hover-login">
                                                Registrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </ul>
            </div>
        </div>
    </nav>
</section>