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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-1 col-sm-1"></div>
                                <div class="col-lg-10 col-sm-10">
                                    <form method="GET" action="{{ route('mediabanda') }}">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <select name="bandaSeleccionada" class="custom-select custom-select-sm" id="bandaSeleccionada">
                                                    <option value="">Seleccione una banda</option>
                                                    @foreach($bandas as $banda)
                                                        <option value="{{ $banda->id }}">{{ $banda->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <button class="btn btn-sm btn-outline-danger" type="submit">Ver contenido</button>
                                            </div>
                                        </div>
                                    </form>

                                    @if(count($archivosBanda) > 0)
                                        <h2>Informacion de la banda seleccionada:</h2>
                                        <div class="row">
                                            @foreach($archivosBanda as $archivo)
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            @if ($archivo->tipo === 'imagen')
                                                                <img src="{{ asset('storage/' . $archivo->archivo) }}" alt="Imagen" class="img-fluid">
                                                            @elseif ($archivo->tipo === 'video')
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <video src="{{ asset('storage/' . $archivo->archivo) }}" controls class="embed-responsive-item"></video>
                                                                </div>
                                                            @endif
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br/><br/>
@endsection()