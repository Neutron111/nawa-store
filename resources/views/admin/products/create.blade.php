@extends('layouts.admin')
@section('content')

    <h2 class="my-4 fs-3">NEW Product</h2>
    <form action="{{ route('Products.store') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="Product name">
            <label for="name"> Product Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="slug" name="slug" placeholder="URL Slug">
            <label for="name"> URL Slug</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="description" name="description" placeholder="description"></textarea>
            <label for="description"> description</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="short_description" name="short_description" placeholder="Short description"></textarea>
            <label for="short_description"> short description</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="price" name="price" placeholder="Price">
            <label for="price"> Product Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="compare_price" name="compare_price" placeholder="Compare_Price">
            <label for="compare_price"> Compare Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" id="image" name="image" placeholder="Product Image">
            <label for="image"> Product image</label>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
