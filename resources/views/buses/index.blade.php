@extends('layout')

@section('content')

        <div>
            @if(session()->get('success'))
                <div class="{{ session()->get('success') ? 'bg-green-500' : 'bg-red-500' }} text-white p-1 my-2">
                    {{ session()->get('success') }}
                </div>
            @endif

                <div class="flex justify-center my-2 py-1">
                    <a href="{{ route('drivers.create') }}" class="bg-green-500 text-white mb-1 mr-1 px-3 py-0.5 rounded">Add Driver</a>
                    <a href="{{ route('brands.create') }}" class="bg-green-500 text-white mb-1 mr-1 px-3 py-0.5 rounded">Add Model</a>
                    <a href="{{ route('buses.create') }}" class="bg-green-500 text-white mb-1 mr-1 px-3 py-0.5 rounded">Add Bus</a>
                </div>
            <table class="mx-auto px-4 border border-black">
                <thead>
                <tr>
                    <th class="py-2 px-2 border border-black">ID</th>
                    <th class="py-2 px-2 border border-black">License Plate</th>
                    <th class="py-2 px-2 border border-black">Brand</th>
                    <th class="py-2 px-2 border border-black">Driver</th>
                    <th class="py-2 px-2 border border-black">Driver ID</th>
                    <th class="py-2 px-4 text-center border border-black">Action</th>

                </tr>
                </thead>

                <tbody>
                @foreach($buses as $bus)
                    <tr>
                        <td class="border px-1 py-2 border-black text-center">{{ $bus->id }}</td>
                        <td class="border px-1 py-2 border-black text-center">{{ $bus->license_plate }}</td>
                        <td class="border px-1 py-2 border-black text-center">{{ $bus->brand }}</td>
                        <td class="border px-1 py-2 border-black text-center">
                            @if ($bus->driver)
                                {{ $bus->driver->firstname }} {{ $bus->driver->lastname }}
                            @else
                                No Driver
                            @endif
                        </td>

                        <td class="border px-1 py-2 border-black text-center">
                            @if ($bus->driver)
                                {{ $bus->driver_id }}
                            @else
                                No Driver
                            @endif </td>
                        <td class="border px-1 py-2 border-black text-center">
                            <a href="{{ route('buses.edit', $bus->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('buses.destroy', $bus->id) }}" method="POST">
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

    @endsection
