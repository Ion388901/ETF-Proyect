@extends('admin.layouts.unregistered')

@section('content')
<form class="form-signin" method="POST" action="{{ route('admin.user.login') }}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
    <label for="inputEmail" class="sr-only">Correo Electrónico</label>
    <input type="email" name="user[email]" id="inputEmail" class="form-control" placeholder="ejemplo@mail.com" required>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" name="user[password]" id="inputPassword" class="form-control" placeholder="Palabra Contraseña" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
</form>
@endsection