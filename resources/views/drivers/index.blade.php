@extends('layout')

@section('content')
    <div>
        @if(session()->get('success'))
            <div class="{{ session()->get('success') ? 'bg-green-500' : 'bg-red-500' }} text-white p-1 my-2">
                {{ session()->get('success') }}
            </div>
        @endif

        <div>
            <a href="{{ route('drivers.create') }}" class="">Add Driver</a>
        </div>
        <table>
            <thead>
            <tr>
                <th>Photo</th>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Birthdate</th>
            </tr>
            </thead>

            <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->photo }}</td>
                    <td>{{ $driver->id }}</td>
                    <td>{{ $driver->firstname }}</td>
                    <td>{{ $driver->lastname }}</td>
                    <td>{{ $driver->birthdate }}</td>
                    <td>
                        <a href="{{ route('drivers.edit', $driver->id) }}">Edit</a>
                        <form action="{{ route('$drivers.destroy', $driver->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
