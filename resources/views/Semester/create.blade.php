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

<a href="{{ route('semester.index') }}" class="btn btn-dark mb-2">Voltar</a>

<form method="POST" action="{{ route('semester.store') }}">
  @csrf
  <div class="form-group">
    <label for="school_year" class="">Periodo Letivo</label>
    <input type="text" class="form-control" name="school_year" id="school_year">

    <label for="campus_id" class="">Campus</label>
    <select onchange="courseOnChange()" class="form-control" name="campus_id" id="campus_id">
      <option>Selecione...</option>
      @foreach($campus_select as $campus)
      <option value="{{ $campus->id }}">{{ $campus->name }}</option>
      @endforeach
    </select>

    <label for="course_id" class="">Curso</label>
    <select type="text" class="form-control" name="course_id" id="course_id"></select>

    <label for="matrix_curricular_id" class="">Matriz Curritcular</label>
    <select type="text" class="form-control" name="matrix_curricular_id" id="matrix_curricular_id"></select>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@endsection
@push('js')
<script>
  function courseOnChange() {
    const x = document.getElementById("campus_id").value;

    axios.get("{{ route('public.campus.courses', 'args') }}".replace('args', x))
      .then(value => {
        const courseSelect = document.getElementById('course_id')
        for (let course of value.data) {
          console.log(course)
          const option = document.createElement('option')
          option.value = course.id
          option.innerHTML = course.name
          courseSelect.appendChild(option)
        }
      })
  }
</script>
@endpush
