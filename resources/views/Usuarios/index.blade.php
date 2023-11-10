@extends ('template.master')
@section ('contenido_central')
<br/>
    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Usuarios!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({
                title: '¡ERROR!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
    <!-- Index usuarios -->
    <section class="page-section" id="paisestabla">
        </br>
        <div class="container-fluid">
            <div class="col-12 table-responsive">
                <h3 class="aside-title">Lista de usuarios</h3>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Nuevo usuarios <i class="bi bi-plus-square"></i>
                </button>

                <!-- Modal Insert -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content text-white modal-border">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mr-2">
                                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                                    </div>
                                    <div class="col ml-2">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div><br/>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form action="/usuarios" class="contact-form" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="nombre" class="custom-input form-control form-control-sm text-white 
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                        <label for="nombre">Nombre del usuarios:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="ap_pat" class="custom-input form-control form-control-sm text-white 
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                        <label for="ap_pat">Apellido Paterno:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="ap_mat" class="custom-input form-control form-control-sm text-white 
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                        <label for="ap_mat">Apellido Materno:</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-12">
                                                    <div class="form-group">
                                                        <select class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" name="tipo_usuario" id="exampleSelect" required>
                                                            <option value="">Selecciona tipo de usuario</option>
                                                            <option value="admin">Administrador</option>
                                                            <option value="cliente">Cliente</option>
                                                            <option value="banda">Banda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="correo" class="custom-input form-control form-control-sm text-white 
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required> 
                                                        <label for="correo">Correo:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="password" name="password" id="password" class="custom-input form-control form-control-sm text-white 
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Insert -->

                <br /><br /><br />

                <!-- Table usuarioss -->
                <table id="example" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre del usuarios</th>
                            <th>Tipo de usuarios</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuarios)
                            <tr>
                                <td>{!! $usuarios->nombre !!} {!! $usuarios->ap_pat !!} {!! $usuarios->ap_mat !!}</td>
                                <td>{!! $usuarios->tipo_usuario !!}</td>
                                <td>{!! $usuarios->correo !!}</td>
                                <td>
                                    <!-- Botones de accion -->
                                    <div class="col text-center">
                                        <div class="btn-group" role="group" >
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#verModal{!! $usuarios->id !!}">
                                                <i class="bi bi-info-circle"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{!! $usuarios->id !!}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group mr-2" role="group">
                                            <form action="{{route('usuarios.destroy', $usuarios)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este registro?')">   
                                            </form>
                                        </div>
                                    </div>
                                                                            
                                    <!-- Botones de accion -->
                                    <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{!! $usuarios->id !!}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content text-white modal-border">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col mr-2">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Registro</h5>
                                                            </div>
                                                            <div class="col ml-2">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <br/><br/>
                                                        <div class="row">
                                                            <div class="col-lg-1 col-sm-1"></div>
                                                                <div class="col-lg-10 col-sm-10 text-center">
                                                                    <form action="{{route('usuarios.update',$usuarios->id)}}" method="POST">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <input type="text" name="nombre" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                                                    value="{{ old('nombre', $usuarios->nombre) }}" required>
                                                                                    <label for="nombre">Nombre del usuarios:</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <input type="text" name="ap_pat" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                                                    value="{{ $usuarios->ap_pat }}" required>
                                                                                    <label for="ap_pat">Apellido Paterno:</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <input type="text" name="ap_mat" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                                                    value="{{ $usuarios->ap_mat }}" required>
                                                                                    <label for="ap_mat">Apellido Materno:</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <select class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" name="tipo_usuario" id="exampleSelect" required>
                                                                                        <option value="{{ old('tipo_usuario', $usuarios->tipo_usuario) }}">{{ old('tipo_usuario', $usuarios->tipo_usuario) }}</option>
                                                                                        <option value="admin">Administrador</option>
                                                                                        <option value="cliente">Cliente</option>
                                                                                        <option value="banda">Banda</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <input type="text" name="correo" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                                                    value="{{ $usuarios->correo }}" required> 
                                                                                    <label for="correo">Correo:</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <input type="password" name="password" id="password" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                                                    value="{{ $usuarios->password }}" required>
                                                                                    <label for="password">Password</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            @csrf @method('PUT')
                                                                            <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Guardar</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <div class="col-lg-1 col-sm-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Modal Edit -->

                                    <!-- Modal Ver -->
                                        <div class="modal fade" id="verModal{!! $usuarios->id !!}" tabindex="-1" role="dialog" aria-labelledby="verModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content text-white modal-border">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col mr-2">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Registro</h5>
                                                            </div>
                                                            <div class="col ml-2">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <br/><br/>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-1"></div>
                                                                <div class="col-lg-8 col-md-12 text-center">
                                                                    <div class="form-row">
                                                                        <div class="col-lg-12 col-md-12">
                                                                            <p class="hover-text">Nombre: {!! $usuarios->nombre !!} {!! $usuarios->ap_pat !!} {!! $usuarios->ap_mat !!}</p>
                                                                            <p class="hover-text">Tipo de usuario: {!! $usuarios->tipo_usuario !!}</p>
                                                                            <p class="hover-text">Correo: {!! $usuarios->correo !!}</p>
                                                                            <div class="text-center">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                    <br/>
                                                                </div>
                                                            <div class="col-lg-2 col-md-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Modal Ver -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Table usuarioss --> 
            </div>
        </div>
    </section>

@endsection()