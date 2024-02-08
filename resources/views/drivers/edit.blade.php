@extends('layout')
@section('content')

    <div class="my-4">
        <a href="{{ route('drivers.index') }}" class="ml-4 bg-blue-500 text-white px-2 py-1 rounded">Back</a>
    </div>
    <div class="flex justify-center items-center h-screen">
        <form action="{{ route('drivers.update', $driver->id) }}" class="w-96 p-6 rounded drop-shadow-lg bg-gray-50" method="POST">
            @csrf
            @method('PUT')

            <p>Update Driver</p>
            <input type="text" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                   name="drivers" value="{{ $driver->firstname }}">
            <input type="text" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                   name="lastname" value="{{ $driver->lastname }}">
            <input type="date" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                   name="lastname" value="{{ $driver->birthdate }}">
            <button type="submit" class="bg-green-500 text-white mt-7 py-1 px-3.5 rounded">Update</button>
        </form>
    </div>
@endsection
