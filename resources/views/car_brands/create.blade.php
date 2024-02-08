@extends('layout')

@section('content')
    <div>
        <div class="my-4">
            <a href="{{ route('brands.index') }}" class="ml-4 bg-blue-500 text-white px-2 py-1 rounded">Back</a>
        </div>

        <div class="flex justify-center items-center h-screen">

            <form action="{{ route('brands.store') }}" class="w-96 p-8 rounded drop-shadow-lg bg-gray-50" method="POST">
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
                <lable for="car_brands">Add Car Brand</lable>
                <input type="text" class="mt-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg"
                       name="car_brands"/>
                <button type="submit" class="bg-green-500 text-white mt-7 py-1 px-3.5 rounded">Add Brand</button>
            </form>
        </div>
    </div>
@endsection
