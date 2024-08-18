@extends('layouts.app')

@section('title')
    Register an account on Devstagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                {{-- NAME --}}
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">Name</label>
                    <input  id="name" name="name" type="text" placeholder="Your name here"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{old('name')}}"
                    >
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                {{-- USER NAME --}}

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">Username</label>
                    <input  id="username" name="username" type="text" placeholder="Your username here"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{old('username')}}"
                    >
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                {{-- EMAIL --}}

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">Email</label>
                    <input  id="email" name="email" type="email" placeholder="Your email here"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{old('email')}}"
                    >
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">Password</label>
                    <input  id="password" name="password" type="password" placeholder="Your password here"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                {{-- PASSWORD CONFIRM --}}
                
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation">Password_confirmation</label>
                    <input  id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password here"
                    class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror"
                    >
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <input type="submit" value="Create account" class="bg-sky-600 hover:bg-sky-700 transition-colors cursos-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                
                
            </form>
        </div>
    </div>
@endsection