@include('admin.includes.alerts')

@csrf

<input type="text" class="form-control mt-4" name="name" placeholder="Nome" value="{{ $product->name ?? old('name') }}">
<input type="text" class="form-control mt-4" name="description" placeholder="Descrição" value="{{ $product->description ?? old('description') }}">
<input type="text" class="form-control mt-4" name="price" placeholder="Preço" value="{{ $product->price ?? old('price') }}">
<input type="file" class="form-control-file mt-4" name="image">

<button type="submit" class="btn btn-success mt-4">Enviar</button>