@extends('car_brands.layout')
@section('content')
    <div class="card mt-8">
        <div class="card-header bg-blue-500 text-white">
            Add Car Brand
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
            <form method="post" action="{{ route('brands.store') }}">
                <div class="mb-4">
                    @csrf
                    <label for="name" class="block text-gray-700">Car Brand</label>
                    <input type="text" class="form-input mt-1 block w-full" name="name"/>
                </div>

                <button type="submit" class="btn bg-red-500 text-white py-2 px-4 rounded-full">Add Brand</button>
            </form>
        </div>
    </div>

@endsection
