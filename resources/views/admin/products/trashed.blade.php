@extends('layouts.admin')
@section('content')
<header class="mb-4 d-flex">
    <h2 class="mb-4 fs-3">Trashed Products</h2>
    <div class="ml-auto">
    <a href="{{ route('Products.index') }}" class="btn btn-sm btn-primary">Product List</a>
    </div>
</header>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Deleted At</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <a href="{{ $product->image_url }}">
                            <img src="{{ $product->image_url }}" whidth="60" alt="">
                        </a>
                    </td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->deleted_at }}</td>
                    <td>
                            <form action="{{ route('Products.restore', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Add this line to set the method to PUT -->
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-trash-restore"></i> Restore</button>
                            </form>
                    </td>
                    <td>
                        <form action="{{ route('Products.force-delete', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                Force Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}} {{--عشان اقدر اجيب خصائص  البوتسراب لازم اعرف في البروفايدرز سطر الباجنيشن--}}
@endsection
