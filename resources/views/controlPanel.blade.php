@extends('adminlte::page')

@section('title', 'Painel de Controle')

@section('content_header')
    <h1>Painel de Controle</h1>
@stop

@section('content')
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Cadastro de Gastos</legend>

<!-- Value input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="value">Valor</label>  
  <div class="col-md-4">
  <input type="number" step="0.01"  id="value" name="value" min="0.01" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Date input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="date">Data</label>  
  <div class="col-md-4">
  <input id="date" name="date" type="date" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Message -->
<div class="form-group">
  <label class="col-md-4 control-label" for="message">Mensagem</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="message" name="message"></textarea>
  </div>
</div>


<!-- Buttom Submit -->
<input class="btn btn-primary" type="submit" value="Submit">



</fieldset>
</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
