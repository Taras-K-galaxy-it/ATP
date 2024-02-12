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
                <th class="py-2 px-8 border border-black">Car Brands</th>
                <th class="py-2 px-4 text-center border border-black">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td class="border px-1 py-2 border-black text-center">{{ $brand->id }}</td>
                    <td class="border px-4 py-2 border-black">{{ $brand->car_brands }}</td>
                    <td class="border px-1 py-2 text-center border-black">
                        <a href="{{ route('brands.edit', $brand->id) }}"
                           class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 mt-2 rounded" >Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
