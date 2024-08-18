@extends('layouts.app')

@section('title')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">Username</label>
                    <input id="username" name="username" type="text" placeholder="Your username here"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="image">profile image</label>
                    <input id="image" name="image" type="file"
                        accept=".jpg, .jpeg, .png, .svg, .webp"
                        class="border p-3 w-full rounded-lg @error('image') border-red-500 @enderror"
                        value="{{ old('image') }}">
                </div>
                <input type="submit" value="Save changes" class="bg-sky-600 hover:bg-sky-700 transition-colors cursos-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                
            </form>
        </div>
    </div>
@endsection
