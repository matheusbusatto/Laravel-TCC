@extends('adminlte::page')

@section('title', 'Tabela de Gastos')

@section('content_header')
    <h1>Tabela de Gastos</h1>
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
    </tr>
  @endforeach


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
