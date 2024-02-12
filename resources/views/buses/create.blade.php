@extends('layout')
@section('content')
    <div>
        <div class="my-4">
            <a href="{{ route('drivers.index') }}" class="ml-4 bg-blue-500 text-white px-2 py-1 rounded">Back</a>
        </div>
        <div class="flex justify-center items-center h-screen">
            <form action="{{ route('buses.store') }}" method="POST" class="w-96 px-8 pb-8 rounded drop-shadow-lg bg-gray-50" >
                @csrf
                @if ($errors->any())
                    <div class="my-1 bg-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="text-xl text-center">Add Bus</p>

                <label for="">License Plate</label>
                <input type="text" name="license_plate" class="mt-1 mb-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg" required>

                <label for="brand">Brand</label>
                <select name="brand" required>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->car_brands }}">{{ $brand->car_brands }}</option>
                    @endforeach
                </select>

                <label for="driver_id">Driver</label>
                <select name="driver_id">
                    <option value="">No Driver</option>
                    @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->firstname }} {{ $driver->lastname }}</option>
                    @endforeach
                </select>

                <button type="submit" class="bg-green-500 text-white mt-7 py-1 px-3.5 rounded">Add</button>
            </form>
@endsection
