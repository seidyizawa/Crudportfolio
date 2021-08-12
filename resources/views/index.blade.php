@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('completed'))
    <div class="alert alert-success lert-warning alert-dismissible fade show role="alert"">  
      {{ session()->get('completed')  }}
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Nome</td>
          <td>CPF</td>
          <td>Email</td>
          <td>Password</td>
          <td>Address</td>
          <td>Status</td>
          <td class="text-center">Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuario as $usuarios)
        <tr>
            <td>{{$usuarios->id}}</td>
            <td>{{$usuarios->name}}</td>
            <td>{{$usuarios->cpf}}</td>
            <td>{{$usuarios->email}}</td>
            <td>{{$usuarios->password}}</td>
            <td>{{$usuarios->address}}</td>
            <td>{{$usuarios->status}}</td>
            <td class="text-center">
                <a href="{{ route('usuarios.edit', $usuarios->id)}}" class="btn btn-primary btn-sm"">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuarios->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Deletar</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <a type="button" class="btn btn-primary btn-lg btn-block" href="/usuarios/create">Cadastrar Usuario</a>
<div>
@endsection