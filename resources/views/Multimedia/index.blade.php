@extends ('template.master')
@section ('contenido_central')
    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Archivo!',
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
    <!-- Index Documentos -->
    <section class="page-section" id="paisestabla">
        <div class="container-fluid">
            <div class="col-12 table-responsive">
                <h3 class="aside-title">Contenido Multimedia de Bandas </h3>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Agregar archivo <i class="bi bi-plus-square"></i>
                </button>

                <!-- Modal Insert -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content text-white modal-border">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Registro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="color: white">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-1"></div>
                                        <div class="col-10 text-center">
                                            <form action="{{ route('multimedia.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <select name="id_banda" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                        <option value="">Selecciona la banda</option>
                                                        @foreach($bandas as $bandas)
                                                            <option value="{{ $bandas->id }}">{{ $bandas->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo">Tipo:</label>
                                                    <select class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" id="tipo" name="tipo" required>
                                                        <option value="">Selecciona el tipo de archivos que vas a subir</option>
                                                        <option value="video">Video</option>
                                                        <option value="imagen">Imagen</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="url">Archivo:</label>
                                                    <input type="file" name="archivo[]" class="form-control-file" multiple required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </form>
                                        </div>
                                    <div class="col-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Insert -->
                <br /><br /><br />

                <!-- Table Ajustadores -->
                <table id="example" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Banda</th>
                            <th>Tipo de archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($multimedia as $media)
                            <tr>
                                <td class="text-uppercase">{!! $media->bandas->nombre !!}</td>
                                <td>{!! $media->tipo !!}</td>
                                <td>
                                    <!-- Botones de accion -->
                                    <div class="col text-center">
                                        <div class="btn-group" role="group" >
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#verModal{!! $media->id !!}">
                                                <i class="bi bi-info-circle"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{!! $media->id !!}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group mr-2" role="group">
                                            <form action="{{route('multimedia.destroy', $media)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este documento?')">  
                                            </form>
                                        </div>
                                    </div>
                                                                            
                                    <!-- Botones de accion -->

                                    <!-- Modal Ver -->
                                        <div class="modal fade" id="verModal{!! $media->id !!}" tabindex="-1" role="dialog" aria-labelledby="verModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
                                                <div class="modal-content text-white modal-border">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Detalle Registro</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-sm-1"></div>
                                                            <div class="col-lg-10 col-sm-10">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-sm-12">
                                                                        <div class="form-group">
                                                                            <p>
                                                                                Banda: {{ $media->bandas->nombre }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-sm-12">
                                                                        <div class="form-group">
                                                                            <p>Tipo de Archivo: {{ $media->tipo }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-sm-1"></div>
                                                                    <div class="col-lg-8 col-sm-10">
                                                                        @if ($media->tipo === 'imagen')
                                                                            <div class="card border-0">
                                                                                <img src="{{ asset('storage/'.$media->archivo) }}" alt="Imagen" class="card-img-top img-thumbnail img-fluid">
                                                                            </div>
                                                                        @elseif ($media->tipo === 'video')
                                                                            <div class="card border-0">
                                                                                <video class="embed-responsive-item" controls>
                                                                                    <source src="{{ asset('storage/'.$media->archivo) }}" type="video/mp4">
                                                                                    <source src="{{ asset('storage/'.$media->archivo) }}" type="video/webm">
                                                                                    <source src="{{ asset('storage/'.$media->archivo) }}" type="video/ogg">
                                                                                    Your browser does not support the video tag.
                                                                                </video>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-lg-2 col-sm-1"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1 col-sm-1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Modal Ver -->

                                    <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{!! $media->id !!}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
                                                <div class="modal-content text-white modal-border">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Editar Registro</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-1"></div>
                                                            <div class="col-10 text-center">
                                                                <form action="{{route('multimedia.update',$media->id)}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group">
                                                                        <select name="id_banda" class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                                            <option value="">Selecciona la banda</option>
                                                                            <option value="{{ $media->id_banda }}" selected>
                                                                                {{ $media->bandas->nombre }}
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="tipo">Tipo:</label>
                                                                        <select class="form-select form-control form-control-sm my-custom-select border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" id="tipo" name="tipo" required>
                                                                            <option value="{{ $media->tipo }}" selected>{{ $media->tipo }}</option>
                                                                            <option value="video">Video</option>
                                                                            <option value="imagen">Imagen</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="archivo">Archivo:</label>
                                                                        <input type="file" name="archivo[]" class="form-control-file" multiple required>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                                </form>
                                                            </div>
                                                            <div class="col-1"></div>
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
                <!-- Table Ajustadores --> 
            </div>
        </div>
    </section>

@endsection()