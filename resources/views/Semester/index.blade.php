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

<a href="{{ route('semester.create') }}" class="btn btn-dark mb-2">+ Semestre</a>

<ul class="list-group">
  @foreach($datas as $data)
  <li class="list-group-item d-flex justify-content-between align-items-end">{{ $data->school_year; }}
    <span class="d-flex">
      <a href="/semester/show/{{ $data->id }}" class="btn btn-info btn-sm mr-2">Editar</a>
      <form method="POST" action="{{ route('semester.destroy',$data->id) }}" onsubmit="return confirm('Tem certeza que deseja excluir o semestre {{ addslashes($data->school_year) }}?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
      </form>
    </span>
  </li>
  @endforeach
</ul>
@endsection
