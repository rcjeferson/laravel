@extends('admin.layouts.app')

@section('title', 'Editar Produto')

@section('content')
    <h1>Editar Produto {{ $product->id }}</h1>

    <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="post">
        @method('PUT')
        @include('admin.pages.products._partials.form')
    </form>
@endsection