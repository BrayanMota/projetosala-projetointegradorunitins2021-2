@extends('layout')

@section('cabecalho')
Cadastrar Sala
@endsection

@section('conteudo')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error}} </li>
    @endforeach
  </ul>
</div>
@endif

<a href="{{ route('classroom.index') }}" class="btn btn-dark mb-2">Voltar</a>

<form method="POST" action="{{ route('classroom.store') }}">
  @csrf
  <div class="form-group">
    <label for="name" class="">Nome</label>
    <input type="text" class="form-control" name="name" id="name">

    <label for="campus_id" class="">Campus</label>
    <input type="text" class="form-control" name="campus_id" id="campus_id">

    <label for="building_id" class="">Bloco</label>
    <input type="text" class="form-control" name="building_id" id="building_id">

    <label for="max_students" class="">Máximo de Alunos</label>
    <input type="int" class="form-control" name="max_students" id="max_students">

    <label for="classroom_type_id" class="">Tipo de Sala</label>
    <input type="text" class="form-control" name="classroom_type_id" id="classroom_type_id">

    <label for="description" class="">Descrição</label>
    <input type="text" class="form-control" name="description" id="description">
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@endsection
