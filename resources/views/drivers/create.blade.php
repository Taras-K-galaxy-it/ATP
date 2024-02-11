@extends('layout')

@section('content')
    <div>
        <div class="my-4">
            <a href="{{ route('drivers.index') }}" class="ml-4 bg-blue-500 text-white px-2 py-1 rounded">Back</a>
        </div>

        <div class="flex justify-center items-center h-screen">
            <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data" class="w-96 px-8 pb-8 rounded drop-shadow-lg bg-gray-50" >
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
                <p class="text-xl text-center">Add Driver</p>
                <label for="firstname">Firstname</label>

                <input type="text" class="mt-1 mb-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg" name="firstname"/>
                <label for="lastname">Lastname</label>
                <input type="text" class="mt-1 mb-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg" name="lastname"/>

                <label for="birthdate">Birthdate</label>
                <input type="date" class="mt-1 mb-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg" name="birthdate"/>

                <label for="photo">Photo</label>
                <input type="file" class="mt-1 mb-1 p-0.5 block w-full rounded-md border border-black drop-shadow-lg" name="photo"/>

                <button type="submit" class="bg-green-500 text-white mt-7 py-1 px-3.5 rounded">Add</button>
            </form>
        </div>
    </div>
@endsection
