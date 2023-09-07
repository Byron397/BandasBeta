@extends ('template.master')
@section ('contenido_central')
<br/>
    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Evento!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({
                title: '¡Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
    <!-- Index Eventos -->
    <section class="page-section" id="paisestabla">
        <div class="container-fluid">
            <div class="col-12 table-responsive">
                <h3 class="aside-title">Lista de Eventos</h3>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Nuevo Evento <i class="bi bi-plus-square"></i>
                </button>

                <!-- Modal Insert -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
                        <div class="modal-content text-white modal-border">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mr-2">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Registro</h5>
                                    </div>
                                    <div class="col ml-2">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <br/><br/>
                                <div class="row">
                                    <div class="col-lg-2 col-sm-1"></div>
                                        <div class="col-lg-8 col-sm-10 text-center">
                                            <form action="/eventos" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Organizador del Evento</label>
                                                            <select name="id_cliente" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                <option value="">Selecciona tu nombre</option>
                                                                @foreach($usuarios as $usuarios)
                                                                    <option value="{{ $usuarios->id }}">{{ $usuarios->nombre }} {{ $usuarios->ap_pat }} {{ $usuarios->ap_mat }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Banda Contratada</label>
                                                            <select name="id_banda" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                <option value="">Selecciona la banda</option>
                                                                @foreach($bandas as $bandas)
                                                                    <option value="{{ $bandas->id }}">{{ $bandas->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="genero">Nombre del Evento:</label>
                                                            <input type="text" id="nombre" name="nombre" class="custom-input form-control form-control-sm text-white 
                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="zona">Fecha del Evento:</label>
                                                            <input type="date" name="fecha" class="custom-input form-control form-control-sm text-white 
                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="zona">Direccion del evento:</label>
                                                            <input type="text" name="ubicacion" class="custom-input form-control form-control-sm text-white 
                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="text-center">
                                                    <input type="submit" value="Guardar" class="btn btn-success">
                                                </div>
                                                @csrf
                                            </form>
                                        </div>
                                    <div class="col-lg-2 col-sm-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Insert -->
                <br/><br/>
                <!-- Table bandas -->
                <table id="example" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Organizador</th>
                            <th>Banda</th>
                            <th>Evento</th>
                            <th>Fecha</th>
                            <th>Ubicacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventos as $eventos)
                            <tr>
                                <td>{!! $eventos->usuarios->nombre !!} {!! $eventos->usuarios->ap_pat !!} {!! $eventos->usuarios->ap_mat !!}</td>
                                <td>{!! $eventos->bandas->nombre !!}</td>
                                <td class="text-uppercase">{!! $eventos->nombre !!}</td>
                                <td>{!! $eventos->fecha !!}</td>
                                <td>{!! $eventos->ubicacion !!}</td>
                                <td>
                                    <!-- Botones de accion -->
                                    <div class="col text-center">
                                        <div class="btn-group" role="group" >
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#verModal{!! $eventos->id !!}">
                                                <i class="bi bi-info-circle"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{!! $eventos->id !!}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group mr-2" role="group">
                                            <form action="{{route('eventos.destroy', $eventos)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este registro?')">   
                                            </form>
                                        </div>
                                    </div>
                                                                            
                                    <!-- Botones de accion -->

                                    <!-- Modal Ver -->
                                        <div class="modal fade" id="verModal{!! $eventos->id !!}" tabindex="-1" role="dialog" aria-labelledby="verModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content text-white modal-border">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col mr-2">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Detalle Registro</h5>
                                                            </div>
                                                            <div class="col ml-2">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </div><br/><br/>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-1"></div>
                                                                <div class="col-lg-8 col-md-12 text-center">
                                                                    <div class="form-row">
                                                                        <div class="col-lg-12 col-md-12">
                                                                            <p class="hover-text">Organizador: {!! $eventos->usuarios->nombre !!}</p>
                                                                            <p class="hover-text">Banda: {!! $eventos->bandas->nombre !!}</p>
                                                                            <p class="hover-text">Evento: {!! $eventos->nombre !!}</p>
                                                                            <p class="hover-text">Fecha: {!! $eventos->fecha !!}</p>
                                                                            <p class="hover-text">Ubicación: {!! $eventos->ubicacion !!}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="col-lg-2 col-md-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Modal Ver -->

                                    <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{!! $eventos->id !!}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
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
                                                                    <form action="{{route('eventos.update',$eventos->id)}}" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Organizador del Evento</label>
                                                                                    <select name="id_cliente" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                                                        <option value="">Seleccionar...</option>
                                                                                        <option value="{{ $eventos->id_cliente }}" selected>
                                                                                            {{ $eventos->usuarios->nombre }} {{ $eventos->usuarios->ap_pat }} {{ $eventos->usuarios->ap_mat }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Banda Contratada</label>
                                                                                    <select name="id_banda" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                                        <option value="">Selecciona la banda</option>
                                                                                        <option value="{{ $eventos->id_banda }}" selected>
                                                                                            {{ $eventos->bandas->nombre }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="genero">Nombre del Evento:</label>
                                                                                    <input type="text" id="nombre" name="nombre" value="{{ $eventos->nombre }}" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <div class="form-group">
                                                                                <div class="form-group">
                                                                                    <label for="zona">Fecha del Evento:</label>
                                                                                    <input type="date" name="fecha" value="{{ $eventos->fecha }}" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="zona">Direccion del evento:</label>
                                                                                    <input type="text" name="ubicacion" value="{{ $eventos->ubicacion }}" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br/><br/>
                                                                        <div class="text-center">
                                                                            @csrf @method('PUT')
                                                                            <button type="submit" class="btn btn-success">Actualizar</button>
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Table bandas --> 
            </div>
        </div>
    </section>
@endsection()