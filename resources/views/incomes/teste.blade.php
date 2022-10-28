@extends('adminlte::page')

@section('title', 'Receitas')

@section('content_header')
<h1>Receitas</h1>
@stop

@section('content')



   

        
        

    <div class="d-flex ">

        <h5>Total: {{$total_values}}</h3>

    </div>
    

</div>
  
   


@stop




@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop