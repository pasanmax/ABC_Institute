@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Students
            </h1>
        </div>

        @if (Auth::user())
            <div class="pt-10">
                <a href="students/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new Student &rarr;
                </a>
            </div>
        @else
            <p class="italic text-gray-500">
                Please login as admin to create Student
            </p>
        @endif
    

        <div class="w-5/6 py-10">
            @foreach ($students as $student)
                <div class="m-auto">
                    <div class="float-right">
                        @if (Auth::user())
                            <a href="students/{{ $student->id }}/edit"
                                class="border-b-2 pb-1 border-dotted italic text-green-500">
                                Edit &rarr;
                            </a>
                            <form action="/students/{{ $student->id }}" method="POST" class="pt-3">
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
                        Student ID : {{ $student->id }}
                    </span>
                    <h2 class="text-gray-700 text-2xl hover:text-gray-500">
                        <a href="/students/{{ $student->id }}">
                            {{ $student->title . ' ' . $student->firstName . ' ' . $student->lastName}}
                        </a>
                    </h2>
                    <hr class="mt-4 mb-8">
                </div>
            @endforeach
        </div>
    </div>
@endsection