@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                {{ $course->courseName }}
            </h1> 
        </div>

        <div class="py-10 text-center">
            <div class="m-auto">
                <span class="uppercase text-blue-500 font-bold text-xl italic">
                    Course ID : {{ $course->id }}
                </span>
                <hr class="mt-4 mb-8">
            </div>
        </div>
    </div>

@endsection