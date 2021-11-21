@extends('layout')

@section('cabecalho')
Cadastrar Semestre
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

<form method="POST" action="/semester/store">
  @csrf
  <div class="form-group">
    <label for="school_year" class="">Periodo Letivo</label>
    <input type="text" class="form-control" name="school_year" id="school_year">

    <label for="campus_id" class="">Campus</label>
    <input type="text" class="form-control" name="campus_id" id="campus_id">

    <label for="course_id" class="">Curso</label>
    <input type="text" class="form-control" name="course_id" id="course_id">

    <label for="matrix_curricular_id" class="">Matriz Curritcular</label>
    <input type="text" class="form-control" name="matrix_curricular_id" id="matrix_curricular_id">
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@endsection
