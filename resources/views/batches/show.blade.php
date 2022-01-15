@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                {{ $batch->batchName }}
            </h1> 
        </div>

        <div class="py-10 text-center">
            <div class="m-auto">
                <span class="uppercase text-blue-500 font-bold text-xl italic">
                    Batch ID : {{ $batch->id }}
                </span>
                <p class="text-lg text-gray-700 py-6">
                    <span class="font-bold">
                        Course Name :
                    </span>
                    @foreach ($courses as $course)
                            {{ $course->id == $batch->course_id ? $course->courseName : '' }}
                    @endforeach 
                </p>
                <hr class="mt-4 mb-8">
            </div>
        </div>
    </div>

@endsection