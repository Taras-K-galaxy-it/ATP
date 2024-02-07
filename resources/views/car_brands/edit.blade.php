@extends('car_brands.layout')
@section('content')
    <div class="card mt-8">
        <div class="card-header bg-blue-500 text-white">
            Edit Brand
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('brands.update', $brand->id) }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" class="form-input mt-1 block w-full" name="name" value="{{ $brand->name }}"/>
                </div>

                <button type="submit" class="btn bg-red-500 text-white py-2 px-4 rounded-full">Update Brand</button>
            </form>
        </div>
    </div>
@endsection
