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


<div>

    <!-- Date input-->
    <div class="form-group">


        <form action="/incomes/teste" method="POST">
            <!-- sem @csrf o form não é enviado  -->
            @csrf

            <label class="col-md-6 control-label" for="date" id="date">Data</label>
            <div class="col-md-4">
                <input id="date" name="date" type="date" class="form-control input-md">

            </div>

            <!-- Buttom Submit -->
            <input class="btn btn-primary" type="submit" value="Pesquisar">
        </form>
    </div>

</div>


</div>

<span>

    <p>teste: {{$date}} </p>

</span>







@stop




@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>


@stop