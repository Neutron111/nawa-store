@extends('layouts.admin')
@section('content')
    <h2 class="my-4 fs-3">NEW Product</h2>
    <form action="{{ route('Products.store') }}" method="post" enctype="multipart/form-data"> {{--enctype تستخدم دايما لما يكون عندي رفع ملفات بالصفحة--}}
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.products._form')
    </form>
@endsection
