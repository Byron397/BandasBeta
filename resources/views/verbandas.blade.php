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
    <section id="perfil" class="page-section">
        <div class="container-fluid">
            <br/>
            <div class="row">
                <div class="col-lg-12 col-sm-12 align-items-center">
                    <div class="card shadow-lg  bg-white rounded">
                        <div class="card-header">
                            <h2>Lista de Bandas</h2>
                            <p>Para contratar una banda debes registrarte e iniciar sesion</p>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-lg-1 col-sm-1"></div>
                                <div class="col-lg-10 col-sm-10">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Banda</th>
                                                <th>Genero</th>
                                                <th>Descripcion</th>
                                                <th>Lider/Representante</th>
                                                <th>Ubicacion</th>
                                                <th>Contacto</th>
                                                <th>Info-Multimedia</th>
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
                                                                <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#verModal{!! $bandas->id !!}">
                                                                    <i class="bi bi-info-circle" style="color: blue;"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-dark hover-btn btn-sm" data-toggle="modal" data-target="#mediaModal{!! $bandas->id !!}">
                                                                    <i class="bi bi-collection-fill" style="color: red;"></i>
                                                                </button>
                                                                <a href="{{ route('contacto.banda') }}" class="btn btn-outline-dark hover-btn btn-sm">Contactar</a>
                                                            </div>
                                                        </div>
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
                                                        <!-- Modal Multimedia -->
                                                            <div class="modal fade" id="mediaModal{!! $bandas->id !!}" tabindex="-1" aria-labelledby="mediaModalLabel{!! $bandas->id !!}" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                                                                    <div class="modal-content text-white modal-border">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="mediaModalLabel{!! $bandas->id !!}">Contenido de {{ $bandas->nombre }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            @foreach($multimedia as $media)
                                                                                @if($media->id_banda == $bandas->id)
                                                                                    <div class="col-lg-4 col-sm-12 media-element" data-tipo="{{ $media->tipo }}">
                                                                                        <br/>
                                                                                        <div class="card bg-transparent border-0">
                                                                                            <div class="card-body">
                                                                                                @if ($media->tipo === 'imagen')
                                                                                                    <img src="{{ asset('storage/' . $media->archivo) }}" alt="Imagen" class="img-fluid">
                                                                                                @elseif ($media->tipo === 'video')
                                                                                                    <div class="embed-responsive embed-responsive-16by9">
                                                                                                        <video src="{{ asset('storage/' . $media->archivo) }}" controls class="embed-responsive-item"></video>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!-- Modal Multimedia -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-1 col-sm-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br/><br/>
@endsection()