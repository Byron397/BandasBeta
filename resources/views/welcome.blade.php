@extends ('template.master')
@section ('contenido_central')  
    @if(session('success'))
        <script>
            Swal.fire({
                title: '',
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
    @if(session('exito'))
        <script>
            Swal.fire({
                title: '¡Inicio de Sesión Éxitoso!',
                text: '{{ session('exito') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
    <!-- Bienvenida -->
    <section class="page-section" id="inicio">
        <div class="container-fluid">
            <div class="row shadow-lg p-3 mb-5 bg-white rounded">
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-start" 
                        style="background-image: url('imagenes/bienvenida.jpg'); 
                                background-size: cover; background-position: center center; 
                                background-repeat: no-repeat; width: 100%; height: 500px;;">
                        <div class="d-flex align-items-center">
                            <div class="container text-center mt-3">
                                <h1 class="card-title display-lg-4 display-md-1 display-sm-2" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0); color: white;">
                                    ¡Bienvenidos!
                                </h1>
                                <p class="card-text display-lg-6 display-md-4 display-sm-6" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0); color: white;">
                                    Conoce las bandas y contratalas para tu evento.
                                </p>
                                <a href="#nosotros" class="btn btn-dark btn-lg hover-text">Empezar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br/>
    <!-- Nosotros -->
    <section class="page-section" id="nosotros">
        <div class="container-fluid">
            <div class="row shadow-lg p-3 mb-5 bg-white rounded">
                <div class="col-lg-6 order-1 order-lg-2 pl-5">
                    <img src="imagenes/about.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 pl-5 order-2 order-lg-1">
                    <h3 class="display-4">Sobre Nosotros</h3>
                    <p style="font-family: fantasy;" >
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Quas nisi similique eaque optio doloribus dolorum 
                        ipsam ipsa quaerat dolorem ex perspiciatis qui in, ut harum nemo! Molestias ad autem numquam!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <br/>
    <!-- Bandas -->
    <section id="bandas" class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="text-center" style="font-style: italic;">
                        Bandas
                    </h1>
                </div>
            </div>
            <div class="row shadow-lg p-3 mb-5 bg-white rounded">
                <a href="verbandas" class="btn btn-dark hover-btn">Ver lista y contenidos de las Bandas</a>
                <div class="col-lg-12 col-sm-12">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                @foreach($bandas as $bandas)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded">
                                            <img src="imagenes/bienvenida.jpg" class="card-img-top  img-thumbnail img-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title hover-text">{!! $bandas->nombre !!} <br/></h5>
                                                <p class="hover-text">
                                                    Género: {!! $bandas->genero !!} <br/>
                                                    Representante: {!! $bandas->usuarios->nombre !!} {!! $bandas->usuarios->ap_pat !!} {!! $bandas->usuarios->ap_mat !!} <br/>
                                                    Ubicación: {!! $bandas->zona !!}<br/>
                                                    Contacto: {!! $bandas->contacto !!}
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()     
