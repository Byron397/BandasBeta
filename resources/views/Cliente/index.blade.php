@extends ('template.master')
@section ('contenido_central')
    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Perfil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
    <br/>
    <section id="cliente" class="page-section">
        <div class="container-fluid">
            <br/>
            <div class="row">
                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-10 col-sm-10 align-items-center">
                    <div class="card shadow-lg  bg-white rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-1 col-sm-1"></div>
                                <div class="col-lg-10 col-sm-10">
                                    <h2 class="hover-text">Mi Información</h2>
                                    <br/>
                                    <form method="POST" action="{{ route('cliente.editUsuario') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" name="nombre" class="custom-input form-control form-control-sm
                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                    value="{{ $usuario->nombre }}" required>
                                                    <label for="nombre">Usuario:</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" name="ap_pat" class="custom-input form-control form-control-sm 
                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                    value="{{ $usuario->ap_pat }}" required>
                                                    <label for="ap_pat">Apellido Paterno:</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" name="ap_mat" class="custom-input form-control form-control-sm
                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                    value="{{ $usuario->ap_mat }}" required>
                                                    <label for="ap_mat">Apellido Materno:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" name="correo" class="custom-input form-control form-control-sm 
                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;"
                                                    value="{{ $usuario->correo }}" required> 
                                                    <label for="correo">Correo:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Guardar</button>
                                    </form>
                                </div>
                                <div class="col-lg-1 col-sm-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-sm-1"></div>
            </div>
        </div>
    </section>
    <br/>
    <section class="page-section">
        <div class="container-fluid">
            <br/>
            <div class="row">
                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-10 col-sm-10 align-items-center">
                    <div class="card shadow-lg  bg-white rounded">
                        <div class="card-body">
                            <h2 class="hover-text">Crear evento</h2>
                            <br/>
                            <form method="POST" action="/cliente">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Evento:</label>
                                            <input type="text" name="nombre" class="form-control form-control-sm border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Banda Contratada</label>
                                            <select name="id_banda" class="form-select form-control form-control-sm border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                <option value="">Selecciona la banda</option>
                                                @foreach($banda as $bandas)
                                                    <option value="{{ $bandas->id }}">{{ $bandas->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <label for="fecha">Fecha:</label>
                                        <input type="date" name="fecha" class="form-control form-control-sm border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="ubicacion">Ubicación:</label>
                                            <input type="text" name="ubicacion" class="form-control form-control-sm border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-sm-1"></div>
            </div>
        </div>
    </section>
    <br/>
    <section class="page-section">
        <div class="container-fluid">
            <br/>
            <div class="row">
                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-10 col-sm-10 align-items-center">
                    <div class="card shadow-lg  bg-white rounded">
                        <div class="card-body">
                            <h2 class="hover-text">Mis Eventos</h2>
                            <br/>
                            @if ($evento)
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Banda</th>
                                            <th>Fecha</th>
                                            <th>Ubicación</th>
                                            <th>Editar/Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($evento as $evento)
                                            <tr>
                                                <td>{{ $evento->nombre }}</td>
                                                <td>{{ $evento->bandas->nombre }}</td>
                                                <td>{{ $evento->fecha }}</td>
                                                <td>{{ $evento->ubicacion }}</td>
                                                <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{!! $evento->id !!}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <div class="btn-group" role="group">
                                                    <form action="{{route('cliente.destroy', $evento)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este evento?')">   
                                                    </form>
                                                </div>
                                                </td>
                                            </tr>
                                            <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{!! $evento->id !!}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content text-white modal-border">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mr-2">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Editar Registro</h5>
                                                                    </div>
                                                                    <div class="col ml-2">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <br/><br/>
                                                                <div class="row">
                                                                    <div class="col-lg-1 col-sm-1"></div>
                                                                        <div class="col-lg-10 col-sm-10 text-center">
                                                                            <form method="POST" action="{{route('cliente.update',$evento->id)}}">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="row">
                                                                                    <div class="col-lg-6 col-sm-12">
                                                                                        <div class="form-group">
                                                                                            <label for="nombre">Nombre del evento:</label>
                                                                                            <input type="text" name="nombre" value="{{ $evento->nombre }}" class="custom-input form-control form-control-sm text-white 
                                                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-sm-12">
                                                                                        <div class="form-group">
                                                                                            <label for="">Banda Contratada</label>
                                                                                            <select name="id_banda" class="bg-transparent form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                                                <option value="">Selecciona la banda</option>
                                                                                                <option value="{{ $evento->id_banda }}" selected>
                                                                                                    {{ $evento->bandas->nombre }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6 col-sm-12">
                                                                                        <div class="form-group">
                                                                                            <label for="fecha">Fecha:</label>
                                                                                            <input type="date" name="fecha" value="{{ $evento->fecha }}" class="custom-input form-control form-control-sm text-white 
                                                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-sm-12">
                                                                                        <div class="form-group">
                                                                                            <label for="ubicacion">Ubicación:</label>
                                                                                            <input type="text" name="ubicacion" value="{{ $evento->ubicacion }}" class="custom-input form-control form-control-sm text-white 
                                                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <br/>
                                                                                <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Guardar</button>
                                                                            </form>
                                                                        </div>
                                                                    <div class="col-lg-1 col-sm-1"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- Modal Edit -->
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No hay eventos disponibles.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-sm-1"></div>
            </div>
        </div>
    </section>
    <br/>
@endsection()