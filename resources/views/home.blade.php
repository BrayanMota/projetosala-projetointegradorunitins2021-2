@extends('layout')

@section('cabecalho')
Login

@section('conteudo')
<h1>Usuario Logado</h1>
<a href="{{ route('google.login') }}" class="btn btn-google btn-user btn-block">
    <i class="fab fa-google fa-fw"></i> Login with Google
</a>

@endsection
