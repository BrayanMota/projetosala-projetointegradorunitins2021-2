@extends('layout')

@section('cabecalho')
Semestres
@endsection

@section('conteudo')

@if(!empty($message))
<div class="alert alert-success">
  {{ $message }}
</div>
@endif

<a href="/semester/create" class="btn btn-dark mb-2">+ Semestre</a>

<ul class="list-group">
  @foreach($datas as $data)
  <li class="list-group-item d-flex justify-content-between align-items-end">{{ $data->school_year; }}
    <form method="POST" action="/semester/destroy/{{ $data->id }}" onsubmit="return confirm('Tem certeza que deseja excluir o semestre {{ addslashes($data->school_year) }}?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
    </form>
  </li>
  @endforeach
</ul>
@endsection
