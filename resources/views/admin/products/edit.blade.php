@extends('layouts.admin')
@section('content')
    <h2 class="my-4 fs-3">Edit Product</h2>
    <form action="{{ route('Products.update', $product->id) }}" method="post">
        {{-- {{ csrf_field() }}
        {{ method_field('PUT') }} --}}
        @csrf
        @method('put')
        @include('admin.products._form')
    </form>
@endsection
