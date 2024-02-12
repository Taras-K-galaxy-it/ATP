@extends('layout')
@section('content')

    <div class="my-4">
        <a href="{{ route('drivers.index') }}" class="ml-4 bg-blue-500 text-white px-2 py-1 rounded">Back</a>
    </div>
    <div class="flex justify-center items-center h-screen">
        <form action="{{ route('drivers.update', $driver->id) }}" class="w-96 p-6 rounded drop-shadow-lg bg-gray-50" method="POST">
            @csrf
            @method('PUT')

            <p class="text-center">Update Driver</p>

            <lable for="firstname">Firstname</lable>
            <input type="text" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                   name="firstname" value="{{ $driver->firstname }}">

            <label for="lastname">Lastname</label>
            <input type="text" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                   name="lastname" value="{{ $driver->lastname }}">

            <label for="birthdate">Birthdate</label>
            <input type="date" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                   name="birthdate" value="{{ $driver->birthdate }}">

            <label for="salary">Salary</label>
            <input type="text" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                   name="salary" value="{{ $driver->salary }}">

            <label for="email">Email</label>
            <input type="text" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                   name="email" value="{{ $driver->email }}">

            <button type="submit" class="bg-green-500 text-white mt-7 py-1 px-3.5 rounded">Update</button>
        </form>
    </div>
@endsection
