@extends ('template.master')
@section ('contenido_central')
<br/><br/>
    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Bandas!',
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
    <!-- Index Bandas -->
    <section class="page-section" id="paisestabla">
        <div class="container-fluid">
            <div class="col-12 table-responsive">
                <h3 class="aside-title">Lista de Bandas</h3>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Nueva Banda <i class="bi bi-plus-square"></i>
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
                                            <form action="/bandas" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="id_usuario">Lider/Representante:</label>
                                                            <select name="id_usuario" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                <option value="">Selecciona al Lider/Representante de tu banda</option>
                                                                @foreach($usuarios as $usuarios)
                                                                    <option value="{{ $usuarios->id }}">{{ $usuarios->nombre }} {{ $usuarios->ap_pat }} {{ $usuarios->ap_mat }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="nombre">Nombre de la banda:</label>
                                                            <input type="text" name="nombre" class="custom-input form-control form-control-sm text-white 
                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="genero">Género:</label>
                                                            <select name="genero" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                                <option value="">Selecciona...</option>
                                                                <option value="Jazz">Jazz</option>
                                                                <option value="Blues">Blues</option>
                                                                <option value="Pop">Pop</option>
                                                                <option value="Rock and Roll">Rock and Roll</option>
                                                                <option value="Techno">Techno</option>
                                                                <option value="Reggae">Reggae</option>
                                                                <option value="Salsa">Salsa</option>
                                                                <option value="Regional Mexicana">Regional Mexicana</option>
                                                                <option value="Hip hop/Rap">Hip hop/Rap</option>
                                                                <option value="Reggaetón">Reggaetón</option>
                                                                <option value="Metal">Metal</option>
                                                                <option value="Corridos Tumbados">Corridos Tumbados</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="descripcion">Descripción de la banda:</label>
                                                            <textarea name="descripcion" class="custom-input form-control form-control-sm text-white 
                                                            bg-transparent border-top-0 border-left-0 border-right-0"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="redes_sociales">Redes Sociales:</label>
                                                            <input type="text" id="socialLinksInput" name="redes_sociales" class="custom-input form-control form-control-sm text-white 
                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" placeholder="Ingresa los enlaces de redes sociales separados por comas">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="zona">Ubicación de la banda:</label>
                                                            <input type="text" name="zona" class="custom-input form-control form-control-sm text-white 
                                                            bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="contacto">Contacto:</label>
                                                            <input type="text" name="contacto" class="custom-input form-control form-control-sm text-white 
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
                            <th>Banda</th>
                            <th>Genero</th>
                            <th>Descripcion</th>
                            <th>Lider/Representante</th>
                            <th>Ubicacion</th>
                            <th>Contacto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bandas as $bandas)
                            <tr>
                                <td class="text-uppercase">{!! $bandas->nombre !!}</td>
                                <td>{!! $bandas->genero !!}</td>
                                <td>{!! $bandas->descripcion !!}</td>
                                <td>{!! $bandas->usuarios->nombre !!} {!! $bandas->usuarios->ap_pat !!} {!! $bandas->usuarios->ap_mat !!}</td>
                                <td>{!! $bandas->zona !!}</td>
                                <td>{!! $bandas->contacto !!}</td>
                                <td>
                                    <!-- Botones de accion -->
                                    <div class="col text-center">
                                        <div class="btn-group" role="group" >
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#verModal{!! $bandas->id !!}">
                                                <i class="bi bi-info-circle"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{!! $bandas->id !!}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group mr-2" role="group">
                                            <form action="{{route('bandas.destroy', $bandas)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este registro?')">   
                                            </form>
                                        </div>
                                    </div>
                                                                            
                                    <!-- Botones de accion -->

                                    <!-- Modal Ver -->
                                        <div class="modal fade" id="verModal{!! $bandas->id !!}" tabindex="-1" role="dialog" aria-labelledby="verModalTitle" aria-hidden="true">
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
                                                                            <p class="hover-text">Nombre de Banda: {!! $bandas->nombre !!}</p>
                                                                            <p class="hover-text">Género: {!! $bandas->genero !!}</p>
                                                                            <p class="hover-text">Descripción: {!! $bandas->descripcion !!}</p>
                                                                            <p class="hover-text">Links de redes sociales:</p>
                                                                            @foreach(explode(',', $bandas->redes_sociales) as $link)
                                                                                <a href="{{ $link }}" class="hover-text">{{ $link }}</a>
                                                                            @endforeach
                                                                            <br/><br/>
                                                                            <p class="hover-text">Usuario: {!! $bandas->usuarios->nombre !!}</p>
                                                                            <p class="hover-text">Ubicación: {!! $bandas->zona !!}</p>
                                                                            <p class="hover-text">Contacto: {!! $bandas->contacto !!}</p>
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
                                        <div class="modal fade" id="editModal{!! $bandas->id !!}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
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
                                                                    <form action="{{route('bandas.update',$bandas->id)}}" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="id_usuario">Lider/Representante:</label>
                                                                                    <select name="id_usuario" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                                                        <option value="">Seleccionar...</option>
                                                                                        <option value="{{ $bandas->id_usuario }}" selected>
                                                                                            {{ $bandas->usuarios->nombre }} {{ $bandas->usuarios->ap_pat }} {{ $bandas->usuarios->ap_mat }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="nombre">Nombre de la banda:</label>
                                                                                    <input type="text" value="{{ $bandas->nombre }}" name="nombre" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="genero">Género:</label>
                                                                                    <select name="genero" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                                                        <option value="{{ old('genero', $bandas->genero) }}">{{ old('genero', $bandas->genero) }}</option>
                                                                                        <option value="Jazz">Jazz</option>
                                                                                        <option value="Blues">Blues</option>
                                                                                        <option value="Pop">Pop</option>
                                                                                        <option value="Rock and Roll">Rock and Roll</option>
                                                                                        <option value="Techno">Techno</option>
                                                                                        <option value="Reggae">Reggae</option>
                                                                                        <option value="Salsa">Salsa</option>
                                                                                        <option value="Regional Mexicana">Regional Mexicana</option>
                                                                                        <option value="Hip hop/Rap">Hip hop/Rap</option>
                                                                                        <option value="Reggaetón">Reggaetón</option>
                                                                                        <option value="Metal">Metal</option>
                                                                                        <option value="Corridos Tumbados">Corridos Tumbados</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="descripcion">Descripción de la banda:</label>
                                                                                    <textarea name="descripcion" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0">{{ $bandas->descripcion }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="redes_sociales">Redes Sociales:</label>
                                                                                    <input type="text" value="{{ $bandas->redes_sociales }}" id="socialLinksInput" name="redes_sociales" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" placeholder="Ingresa los enlaces de redes sociales separados por comas">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="zona">Ubicación de la banda:</label>
                                                                                    <input type="text" value="{{ $bandas->zona }}" name="zona" class="custom-input form-control form-control-sm text-white 
                                                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label for="contacto">Contacto:</label>
                                                                                    <input type="text" value="{{ $bandas->contacto }}" name="contacto" class="custom-input form-control form-control-sm text-white 
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