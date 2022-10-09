@extends('adminlte::page')

@section('title', 'Tabela de Receitas')

@section('content_header')
    <h1>Tabela de Receitas</h1>
@stop

@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Valor</th>
      <th scope="col">Data</th>
      <th scope="col">Descrição</th>  

    </tr>
 </thead>

    

 @foreach($incomes as $income)
  <tbody>
    <tr>
      <th scope="row">{{$income->id}}</th>
      <td>{{$income->value}}</td>
      <td>{{ date('d/m/Y' , strtotime($income->date)) }}</td>
      <td>{{$income->description}}</td>
      <td><i class="fas fa-edit"></i></td>
      <td><i class="fas fa-trash-alt"></i></td>
      <td>{{$income->user->id}}</td>
      
      
    </tr>
  @endforeach


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
