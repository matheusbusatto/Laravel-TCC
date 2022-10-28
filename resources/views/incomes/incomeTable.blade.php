@extends('adminlte::page')

@section('title', 'Receitas')

@section('content_header')
<h1>Receitas</h1>
@stop

@section('content')

<div class="container-fluid">
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
                <td>
                <td>
                    <a href="/incomes/edit/{{ $income->id }}" class="btn btn-primary primary-btn fas fa-edit"> Editar</a> 
                    
                </td>
                </td>

                <td>
                    <a href="#"></a>
                    <form action="/incomes/{{ $income->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn fas fa-trash-alt"> Deletar</button>
                    </form>
                </td>

            </tr>
            @endforeach




    </table>

   
    <div class="d-flex ">

        <h5>Total: {{$total_incomes}}</h3>

    </div>
    

</div>
  

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