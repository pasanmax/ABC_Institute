@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Update Course
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/courses/{{ $course->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">
                <input type="text" 
                name="courseName" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Course Name"
                value="{{ $course->courseName }}">
            </div>

            <button type="submit" class="bg-blue-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                Update
            </button>
        </form>
    </div>
    @if ($errors->any())
        <div class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class="text-red-500 list-none">
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif
@endsection