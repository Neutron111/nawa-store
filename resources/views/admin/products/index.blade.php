
@extends('layouts.admin')
        @section('content')
            <h2 class="mb-4 fs-3"><?= $title ?></h2>
            <a href="{{ route('Products.create') }}" class="btn btn-sm btn-primary mb-3">+ Create Product</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->status }}</td>
                            <td><a href="{{ route('Products.edit',$product->id) }}" class="btn btn-sm btn-outline-dark">Edit <i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endsection
