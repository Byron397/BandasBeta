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
                <div class="col-lg-6 col-sm-12 align-items-center">
                    <div class="card shadow-lg  bg-white rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-1 col-sm-1"></div>
                                <div class="col-lg-10 col-sm-10">
                                    <h2>Información del Usuario:</h2>
                                    <br/>
                                    <form method="POST" action="{{ route('perfil.editUsuario') }}">
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
                <div class="col-lg-6 col-sm-12 align-items-center">
                    <div class="card shadow-lg  bg-white rounded">
                        <div class="card-body">
                            @if ($banda)
                                <div class="row">
                                    <div class="col-lg-1 col-sm-1"></div>
                                    <div class="col-lg-10 col-sm-10">
                                        <h2>Información de la Banda:</h2>
                                        <form method="POST" action="{{ route('perfil.editBanda') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre de la banda:</label>
                                                        <input type="text" value="{{ $banda->nombre }}" name="nombre" class="custom-input form-control form-control-sm
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="genero">Género:</label>
                                                        <select name="genero" class="form-select form-control form-control-sm border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                            <option value="{{ old('genero', $banda->genero) }}">{{ old('genero', $banda->genero) }}</option>
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
                                                        <textarea name="descripcion" class="custom-input form-control form-control-sm 
                                                        bg-transparent border-top-0 border-left-0 border-right-0">{{ $banda->descripcion }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="redes_sociales">Redes Sociales(links separados por comas):</label>
                                                        <input type="text" value="{{ $banda->redes_sociales }}" id="socialLinksInput" name="redes_sociales" class="custom-input form-control form-control-sm 
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" placeholder="Ingresa los enlaces de redes sociales separados por comas">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="zona">Ubicación de la banda:</label>
                                                        <input type="text" value="{{ $banda->zona }}" name="zona" class="custom-input form-control form-control-sm 
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="contacto">Contacto:</label>
                                                        <input type="text" value="{{ $banda->contacto }}" name="contacto" class="custom-input form-control form-control-sm 
                                                        bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Guardar</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-1 col-sm-1"></div>
                                </div>
                            @else
                                <div class="row">
                                <div class="col-lg-1 col-sm-1"></div>
                                <div class="col-lg-10 col-sm-10">
                                    <h2>Registrar Banda:</h2>
                                    <form method="POST" action="{{ route('perfil.editBanda') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre de la banda:</label>
                                                    <input type="text" name="nombre" class="custom-input form-control form-control-sm
                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="genero">Género:</label>
                                                    <select name="genero" class="form-select form-control form-control-sm border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" required>
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
                                                    <textarea name="descripcion" class="custom-input form-control form-control-sm 
                                                    bg-transparent border-top-0 border-left-0 border-right-0"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="redes_sociales">Redes Sociales:</label>
                                                    <input type="text" id="socialLinksInput" name="redes_sociales" class="custom-input form-control form-control-sm
                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" placeholder="Ingresa los enlaces de redes sociales separados por comas">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="zona">Ubicación de la banda:</label>
                                                    <input type="text" name="zona" class="custom-input form-control form-control-sm 
                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="contacto">Contacto:</label>
                                                    <input type="text" name="contacto" class="custom-input form-control form-control-sm 
                                                    bg-transparent border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Guardar</button>
                                    </form>
                                </div>
                                <div class="col-lg-1 col-sm-1"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br/>
    <section class="page-section" id="archivo_formulario">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-10 col-sm-10">
                    <div class="card shadow-lg  bg-white rounded">
                        <div class="card-body">
                            <h2>Sube tu Contenido:</h2>
                            <br/>
                            <div class="row">
                                <div class="col-lg-1 col-sm-1"></div>
                                <div class="col-lg-10 col-sm-10">
                                    <form action="{{ route('perfil.subirMultimedia') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-1 col-sm-1"></div>
                                            <div class="col-lg-5 col-sm-5">
                                                <div class="form-group">
                                                    <select class="form-select form-control form-control-sm border-top-0 border-left-0 border-right-0" style="border-bottom: 1px solid red; border-radius: 0;" id="tipo" name="tipo" required>
                                                        <option value="">Selecciona el tipo de archivos que vas a subir</option>
                                                        <option value="video">Video</option>
                                                        <option value="imagen">Imagen</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-sm-5">
                                                <div class="form-group">
                                                    <input type="file" name="archivo[]" class="form-control-file form-control form-control-sm" multiple required>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-sm-1"></div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Subir</button>
                                        </div>
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
    <br/><br/>
    <section class="page-section" id="media">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-10 col-sm-10 text-center">
                    <h2 class="hover-text">Contenido Multimedia</h2>
                </div>
                <div class="col-lg-1 col-sm-1"></div>
            </div>
            <br/><br/>
            <div class="row">
                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-10 col-sm-10">
                    <div class="row">
                        <div class="col-lg-1 col-sm-1"></div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="text-center">
                                <button class="btn btn-outline-danger" onclick="filterFiles('imagen')">Filtrar imágenes</button>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="text-center">
                                <button class="btn btn-outline-danger" onclick="filterFiles('video')">Filtrar videos</button>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-1"></div>
                    </div><br/>
                    @if ($banda)
                        <div class="row" id="multimediaContainer">
                            @foreach ($banda->multimedia as $multimedia)
                                <div class="col-md-4 col-sm-12 multimedia-card" data-tipo="{{ $multimedia->tipo }}">
                                    <br/>
                                    <div class="card shadow-lg bg-white rounded border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-1"></div>
                                                <div class="col-lg-10 col-sm-10 text-center">
                                                    @if ($multimedia->tipo === 'imagen')
                                                        <img src="{{ asset('storage/' . $multimedia->archivo) }}" alt="Imagen" class="img-fluid">
                                                    @elseif ($multimedia->tipo === 'video')
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <video src="{{ asset('storage/' . $multimedia->archivo) }}" controls class="embed-responsive-item"></video>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-1 col-sm-1"></div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-1"></div>
                                                <div class="col-lg-10 col-sm-10 text-center">
                                                    <form action="{{route('perfil.destroy', $multimedia)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger">
                                                    </form>
                                                </div>
                                                <div class="col-lg-1 col-sm-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-lg-1 col-sm-1"></div>
            </div>
        </div>
    </section>
    <br/><br/>
    <section class="page-section" id="mis_eventos">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-10 col-sm-10 text-center">
                    <div class="card shadow-lg bg-white rounded border-0">
                        @if ($eventos)
                            <div class="card-body">
                                <div class="row">
                                    <h2>Eventos de la banda</h2>
                                    <br>
                                    <ul>
                                        @foreach ($eventos as $evento)
                                            <hr>
                                            <div class="hover-text">
                                                <h5>{{ $evento->nombre }}</h5>
                                                <p>
                                                    Organizador: {{ $evento->usuarios->nombre }} {{ $evento->usuarios->ap_pat }}
                                                    {{ $evento->usuarios->ap_mat }}
                                                </p>
                                                <p>Fecha: {{ $evento->fecha }}</p>
                                                <p>Ubicación: {{ $evento->ubicacion }}</p>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <p>No hay eventos programados para la banda.</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-1 col-sm-1"></div>
            </div>
        </div>
    </section>
@endsection()