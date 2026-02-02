@extends('admin.layouts.app')

@section('title', 'Add Product')
@section('header', 'Add Product')
@section('subheader', 'Create a new product in your catalog')

@section('content')
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @include('admin.products._form')
    </form>
@endsection
