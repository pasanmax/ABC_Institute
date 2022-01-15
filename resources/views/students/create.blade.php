@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Create Student
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/students" method="POST">
            @csrf
            <div class="block">
                <label for="title" class="text-gray-400 italic">Select title</label>
                <select name="title" class="block shadow-5xl mb-10 p-2 w-80 italic">
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Miss.</option>
                    <option value="Mrs.">Mrs.</option>
                </select>
            </div>
            <div class="block">
                <input type="text" 
                name="fname" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="First Name">
            </div>
            <div class="block">
                <input type="text" 
                name="lname" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Last Name">
            </div>
            <div class="block">
                <input type="text" 
                name="nic" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="NIC">
            </div>
            <div class="block">
                <label for="dob" class="text-gray-400 italic">Date of Birth</label>

                <input type="date" 
                name="dob" 
                class="block shadow-5xl mb-10 p-2 w-80 italic">
            </div>
            <div class="block">
                <input type="text" 
                name="contactNo" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Contact Number">
            </div>
            <div class="block">
                <label for="gender" class="text-gray-400 italic">Select Gender</label>
                <select name="gender" class="block shadow-5xl mb-10 p-2 w-80 italic">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="block">
                <input type="email" 
                name="email" 
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                placeholder="Email">
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