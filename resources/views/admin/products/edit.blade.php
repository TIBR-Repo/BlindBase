@extends('admin.layouts.app')

@section('title', 'Edit Product')
@section('header', 'Edit Product')
@section('subheader', $product->name)

@section('content')
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        @include('admin.products._form')
    </form>
@endsection
