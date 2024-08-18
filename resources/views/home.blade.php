@extends('layouts.app')

@section('title')
    Home page
@endsection

@section('content')
        {{-- Le estamos pasando al componente la variable de posts --}}
    <x-listar-post :posts="$posts"/>
@endsection
