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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Formulario de Contacto') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contacto.banda.enviar') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $usuario->nombre }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico:</label>
                                <input class="form-control" type="email" name="email" id="email" value="{{ $usuario->correo }}" required>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Mensaje:</label>
                                <textarea class="form-control" name="mensaje" id="mensaje" rows="4" required></textarea>
                            </div>
                            <input type="hidden" name="banda_id" value="{{ $banda ? $banda->id : '' }}">
                            <div class="form-group">
                                <p class="form-control">Correo de contacto de la banda: {{ $correoContacto }}</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar correo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()