@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Create Batch
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/batches" method="POST">
            @csrf
            <div class="block">
                <input type="text" 
                name="batchName" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Batch Name">
            </div>
            <div class="block">
                <label for="course_id" class="text-gray-400 italic">Select Course</label>
                <select name="course_id" class="block shadow-5xl mb-10 p-2 w-80 italic">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                Submit
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