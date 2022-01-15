@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Courses
            </h1>
        </div>

        @if (Auth::user())
            <div class="pt-10">
                <a href="courses/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new Course &rarr;
                </a>
            </div>
        @else
            <p class="italic text-gray-500">
                Please login as admin to create Course
            </p>
        @endif
    

        <div class="w-5/6 py-10">
            @foreach ($courses as $course)
                <div class="m-auto">
                    <div class="float-right">
                        @if (Auth::user())
                            <a href="courses/{{ $course->id }}/edit"
                                class="border-b-2 pb-1 border-dotted italic text-green-500">
                                Edit &rarr;
                            </a>
                            <form action="/courses/{{ $course->id }}" method="POST" class="pt-3">
                                @csrf
                                @method('delete')
                                <button
                                    type="submit"
                                    class="border-b-2 pb-1 border-dotted italic text-red-500">
                                        Delete &rarr;
                                </button>
                            </form>
                        @endif
                    </div>
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Course ID : {{ $course->id }}
                    </span>
                    <h2 class="text-gray-700 text-2xl  hover:text-gray-500">
                        <a href="/courses/{{ $course->id }}">
                            {{ $course->courseName }}
                        </a>
                    </h2>
                    <hr class="mt-4 mb-8">
                </div>
            @endforeach
        </div>
    </div>
@endsection