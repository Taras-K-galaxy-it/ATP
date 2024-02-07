@extends('car_brands.layout')
@section('content')
    <div class="mt-8">
        @if(session()->get('success'))
            <div class="bg-green-500 text-white p-4 mb-4">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table-auto w-full">
            <thead>
            <tr class="bg-yellow-300">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Car Brands</th>

                <th class="px-4 py-2 text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td class="border px-4 py-2">{{ $brand->id }}</td>
                    <td class="border px-4 py-2">{{ $brand->car_brands }}</td>

                    <td class="border px-4 py-2 text-center">
                        <a href="{{ route('brands.edit', $brand->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
