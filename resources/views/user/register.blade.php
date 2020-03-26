@extends('layouts.unregistered')

@section('content')
<form class="form-signin" method="POST" action="{{ route('user.create') }}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Registra tu cuenta</h1>
    <label for="inputName" class="sr-only">Nombre</label>
    <input type="text" name="user[name]" id="inputName" class="form-control" placeholder="Nombre" autofocus>
    <label for="inputEmail" class="sr-only">Correo Electrónico</label>
    <input type="email" name="user[email]" id="inputEmail" class="form-control" placeholder="ejemplo@mail.com" required>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" name="user[password]" id="inputPassword" class="form-control" placeholder="Contraseña" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
</form>
@endsection