@extends('adminlte::page')

@section('title', 'Receitas')

@section('content_header')
<h1>Receitas</h1>
@stop

@section('content')



   

        
        

    <div class="d-flex ">

        <h5>Total: {{$total_sum}}</h5>

        <h5>Total: {{$totale_sum}}</h5>

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