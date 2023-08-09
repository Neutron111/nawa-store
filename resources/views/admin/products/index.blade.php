@extends('layouts.admin')
@section('content')
<header class="mb-4 d-flex">
    <h2 class="mb-4 fs-3">{{$title}}</h2>
    <div class="ml-auto">
    <a href="{{ route('Products.create') }}" class="btn btn-sm btn-primary">+ Create Product</a>
    <a href="{{ route('Products.trashed') }}" class="btn btn-sm btn-danger">View trashed<i class="fas fa-trash"></i></a>
    </div>
</header>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{URL::CURRENT()}}"method="get" class="form-inline">
        <input type="text"name="search" value="{{request('search')}}" class="form-control mb-2 mr-2" placeholder ="Search...">
        <select name="status" class="form-control mb-2 mr-2">
            <option value="">Status</option>
            <option value="active" @selected(request('status')=='active')>Active</option>
            <option value="draft"@selected(request('status')=='draft')>Draft</option>
            <option value="archived"@selected(request('status')=='archived')>Archived</option>
        </select>
        <input type="number"name="price-min" value="{{request('price_min')}}" class="form-control mb-2 mr-2" placeholder ="price-min...">
        <input type="number"name="price-max" value="{{request('price_max')}}" class="form-control mb-2 mr-2" placeholder ="price-max...">

        <button type='submit' class="btn btn-dark">Filter</button>
    </form>



    <table class="table">
        <thead>
            <tr>
                <th>images</th>
                <th>ID</th>
                <th>Name</th>
                <th>Category </th>
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
    {{$products->links()}} {{--عشان اقدر اجيب خصائص  البوتسراب لازم اعرف في البروفايدرز سطر الباجنيشن--}}
@endsection
