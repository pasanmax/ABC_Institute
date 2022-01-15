@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                {{ $student->title . ' ' . $student->firstName . ' ' . $student->lastName }}
            </h1> 
        </div>

        <div class="py-10 text-center">
            <div class="m-auto">
                <span class="uppercase text-blue-500 font-bold text-xl italic">
                    Student ID : {{ $student->id }}
                </span>
                <p class="text-lg text-gray-700 py-6">
                    <span class="font-bold">NIC No : </span>{{ $student->nic }} <br>
                    <span class="font-bold">Date of Birth : </span>{{ $student->dob }} <br>
                    <span class="font-bold">Contact No : </span>{{ $student->contactNo }} <br>
                    <span class="font-bold">Gender : </span>{{ $student->gender }} <br>
                    <span class="font-bold">Email : </span>{{ $student->email }} <br>
                </p>

                <ul>
                    <p class="text-lg text-gray-700 py-3 font-bold">
                        Courses:
                    </p>

                    @forelse ($studentCoursesWithBatches as $studentCourseWithBatch)
                        <li class="inline italic text-gray-600 px-1 py-6">
                            {{ $studentCourseWithBatch->courseName . ' - ' . $studentCourseWithBatch->batchName}}
                        </li>
                    @empty
                        <p>
                            No course assigned
                        </p>
                    @endforelse


                </ul>
                <div class="float-right">
                    @if (Auth::user())
                        <a href="{{ $student->id }}/pdf"
                            class="border-b-2 pb-1 border-dotted italic text-green-500">
                            Export to PDF &rarr;
                        </a>
                    @endif
                </div>
                <hr class="mt-8 mb-8">
            </div>
        </div>
    </div>

@endsection