@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Update Batch
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/batches/{{ $batch->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">
                <input type="text" 
                name="batchName" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Batch Name"
                value="{{ $batch->batchName }}">
            </div>
            <div class="block">
                <label for="course_id" class="text-gray-400 italic">Select Course</label>
                <select name="course_id" class="block shadow-5xl mb-10 p-2 w-80 italic">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $batch->course_id ? 'selected' : '' }}>{{ $course->courseName }}</option>
                @endforeach
                </select>
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