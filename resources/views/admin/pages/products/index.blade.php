@extends('admin.layouts.app')

@section('title', 'Produtos')
    
@section('content')
    <h1>Exibindo os produtos</h1>    
    <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>

    <hr>

    <form action="{{ route('products.search') }}" method="post" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Buscar" class=form-control value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-info ml-2">Buscar</button>
    </form>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th width="180">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}" style="max-width: 100px;">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                        <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (isset($filters))
        {!! $products->appends($filters)->links() !!}
    @else
        {!! $products->links() !!}
    @endif

@endsection