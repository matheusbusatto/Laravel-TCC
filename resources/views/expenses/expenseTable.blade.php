@extends('adminlte::page')

@section('title', 'Gastos')

@section('content_header')
<h1>Gastos</h1>
@stop

@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tipo</th>
      <th scope="col">Valor</th>
      <th scope="col">Data</th>
      <th scope="col">Descrição</th>

    </tr>
  </thead>



  @foreach($expenses as $expense)
  <tbody>
    <tr>
      <th scope="row">{{$expense->id}}</th>
      <td>-</td>
      <td>{{$expense->value}}</td>
      <td>{{ date('d/m/Y' , strtotime($expense->date)) }}</td>
      <td>{{$expense->description}}</td>
      <td>
        <a href="/expenses/edit/{{$expense->id}}" class="btn btn-primary primary-btn fas fa-edit"> Editar</a>

      </td>
      <td>
        <a href="#"></a>
        <form action="/expenses/{{ $expense->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger delete-btn fas fa-trash-alt"> Deletar</button>
        </form>
      </td>

    </tr>
    @endforeach

    @include('sweetalert::alert')
    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script>
      console.log('Hi!');
    </script>
    @stop