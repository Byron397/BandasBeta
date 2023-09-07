@extends ('template.master')
@section ('contenido_central')  
    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Usuario!',
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
        </div>
    </section>
    <br/>
@endsection()     
