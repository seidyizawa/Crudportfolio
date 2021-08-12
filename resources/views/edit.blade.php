@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Editar Usuario
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('usuarios.update', $usuario->id) }}">
          <div class="form-group">
            @csrf
            @method('PATCH')
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="numeric" class="form-control" name="cpf"/>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email"/>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password"/>
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirmar Senha</label>
      <input type="password" class="form-control" name="password_confirmation"/>
  </div>
        <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" class="form-control" name="address"/>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status"/>
        </div>
          <button type="submit" class="btn btn-block btn-danger">Editar Usuario</button>
      </form>
  </div>
</div>
@endsection