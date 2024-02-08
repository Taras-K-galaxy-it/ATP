@extends('layout')

@section('content')
    <div>
        @if(session()->get('success'))
            <div class="{{ session()->get('success') ? 'bg-green-500' : 'bg-red-500' }} text-white p-1 my-2">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="flex flex-row-reverse mt-1 py-1">
            <a href="{{ route('drivers.create') }}" class="bg-green-500 text-white mb-1 mr-1 px-3 py-0.5 rounded">Add Driver</a>
        </div>
        <table class="mx-auto px-4 border border-black">
            <thead>
            <tr>
                <th class="py-2 px-2 border border-black">Photo</th>
                <th class="py-2 px-2 border border-black">ID</th>
                <th class="py-2 px-2 border border-black">Firstname</th>
                <th class="py-2 px-2 border border-black">Lastname</th>
                <th class="py-2 px-2 border border-black">Birthdate</th>
                <th class="py-2 px-4 text-center border border-black">Action</th>

            </tr>
            </thead>

            <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <td class="border px-1 py-2 border-black text-center">{{ $driver->photo }}</td>
                    <td class="border px-1 py-2 border-black text-center">{{ $driver->id }}</td>
                    <td class="border px-1 py-2 border-black text-center">{{ $driver->firstname }}</td>
                    <td class="border px-1 py-2 border-black text-center">{{ $driver->lastname }}</td>
                    <td class="border px-1 py-2 border-black text-center">{{ $driver->birthdate }}</td>
                    <td class="border px-1 py-2 border-black text-center">
                        <a href="{{ route('drivers.edit', $driver->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 mt-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
