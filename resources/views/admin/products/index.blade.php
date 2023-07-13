@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3"><?= $title ?></h2>
    <a href="{{ route('Products.create') }}" class="btn btn-sm btn-primary mb-3">+ Create Product</a>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>images</th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
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
                    <td>{{ $product->category_name }}</td>
                    <td>{{ $product->price_formatted }}</td>
                    <td>{{ $product->status }}</td>
                    <td><a href="{{ route('Products.edit', $product->id) }}" class="btn btn-sm btn-outline-dark">Edit <i
                                class="far fa-edit"></i></a></td>
                    <td>
                        <form action="{{ route('Products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
