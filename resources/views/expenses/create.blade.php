@extends('adminlte::page')

@section('title', 'Cadastro de Gastos')

@section('content_header')
<h1>Painel de Controle</h1>
@stop

@section('content')
<form action="/expenses" method="POST" class="form-horizontal ">
     <!-- sem @csrf o form não é enviado  -->
    @csrf
    
    <fieldset>

        <!-- Form Name -->
        <legend>Cadastro de Gastos</legend>

        <!-- Value input-->
        <div class="form-group">
            <label class="col-md-6 control-label" for="value" id="value">Valor</label>
            <div class="col-md-4">
                <input type="number" step="0.01" id="value" name="value" min="0.01" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Date input-->
        <div class="form-group">
            <label class="col-md-6 control-label" for="date" id="date">Data</label>
            <div class="col-md-4">
                <input id="date" name="date" type="date"  class="form-control input-md">

            </div>
        </div>

         <!-- Seletor de categoria-->
        <div class="form-group ">
        <label class="row control-label col-md-6 control-label">Categoria</label>
            <select class="form-select col-md-4" id="types" name="types" form="typeform">
                <option selected>Selecione a Categoria</option>
                <option value="Alimentação">Alimentação</option>
                <option value="Transporte">Transporte</option>
                <option value="Diversão">Diversão</option>
                <option value="Casa">Casa</option>
                <option value="Outro">Outro</option>
            </select>
        </div>


        <!-- Message -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="message" id="message">Mensagem</label>
            <div class="col-md-4">
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
        </div>


        <!-- Buttom Submit -->
        <input class="btn btn-primary" type="submit" value="Salvar">



    </fieldset>
</form> 

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop