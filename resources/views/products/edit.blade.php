@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<a href="{{ url('/products') }}" class="btn btn-secondary mb-3">Nazad na proizvode</a>

<div class="card uper">
  <div class="card-header">
    Edit Product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
        </div>

        <div class="form-group">
            <label for="description">Product Description:</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}"/>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" name="price" value="{{ $product->price }}"/>
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
             <label for="quantity">Količina</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
  </div>
</div>
@endsection
