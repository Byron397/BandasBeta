@extends ('template.master')
@section ('contenido_central')  
    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Error!',
                text: '{{ session('success') }}',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif 
    <form  role="form" class="contactForm" method="POST" action="login">
        {{ csrf_field() }}
        <div class="form-group d-flex align-items-center">
            <i class="bi bi-person-badge form-control-feedback" style="color: red;"></i>&nbsp;
            <input type="email" name="correo" class="custom-input form-control form-control-sm text-white bg-transparent border-top-0 border-left-0 border-right-0" 
            placeholder="Ingresa tu correo" style="border-bottom: 1px solid red; border-radius: 0;" required>
        </div></br>
        <div class="form-group d-flex align-items-center">
            <i class="bi bi-file-lock2-fill form-control-feedback" style="color: red;"></i>&nbsp;
            <input type="password" name="password" class="custom-input form-control form-control-sm text-white bg-transparent border-top-0 border-left-0 border-right-0" 
            placeholder="Password" data-msg="Capturar password" style="border-bottom: 1px solid red; border-radius: 0;" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-outline-danger btn-sm hover-login">Ingresar</button>
        </div>
    </form>
@endsection() 