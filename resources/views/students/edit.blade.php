@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Update Student
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/students/{{ $student->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">
                <label for="title" class="text-gray-400 italic">Select title</label>
                <select name="title" class="block shadow-5xl mb-10 p-2 w-80 italic">
                    <option value="Mr." {{ $student->title == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                    <option value="Miss." {{ $student->title == 'Miss.' ? 'selected' : '' }}>Miss.</option>
                    <option value="Mrs." {{ $student->title == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                </select>
            </div>
            <div class="block">
                <input type="text" 
                name="fname" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="First Name"
                value="{{ $student->firstName }}">
            </div>
            <div class="block">
                <input type="text" 
                name="lname" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Last Name"
                value="{{ $student->lastName }}">
            </div>
            <div class="block">
                <input type="text" 
                name="nic" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="NIC"
                value="{{ $student->nic }}">
            </div>
            <div class="block">
                <label for="dob" class="text-gray-400 italic">Date of Birth</label>

                <input type="date" 
                name="dob" 
                class="block shadow-5xl mb-10 p-2 w-80 italic"
                value="{{ $student->dob }}">
            </div>
            <div class="block">
                <input type="text" 
                name="contactNo" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Contact Number"
                value="{{ $student->contactNo }}">
            </div>
            <div class="block">
                <label for="gender" class="text-gray-400 italic">Select Gender</label>
                <select name="gender" class="block shadow-5xl mb-10 p-2 w-80 italic">
                    <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="block">
                <input type="email" 
                name="email" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Email"
                value="{{ $student->email }}">
            </div>
            <div class="block">
                <label for="batch_id" class="text-gray-400 italic">Select Batch</label>
                <select name="batch_id" class="block shadow-5xl mb-10 p-2 w-80 italic">
                    <option value="0">Select a Batch</option>
                @foreach ($coursesWithBatches as $courseWithBatch)
                    <option value="{{ $courseWithBatch->id }}">{{ $courseWithBatch->courseName . ' - ' . $courseWithBatch->batchName }}</option>
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