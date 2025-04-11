@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<!-- Gumb za povratak -->
<a href="{{ url('/products') }}" class="btn btn-secondary mb-3">Nazad na proizvode</a>

<div class="card uper">
  <div class="card-header">
    Add Products Data
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

    <form method="post" action="{{ route('products.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
        </div>

        <div class="form-group">
            <label for="description">Product Description:</label>
            <input type="text" class="form-control" name="description" value="{{ old('description') }}"/>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" name="price" value="{{ old('price') }}"/>
        </div>

        <!-- Dropdown za kategoriju -->
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown za boje -->
        <div class="form-group">
            <label for="colors">Odaberi boje:</label>
            <select name="colors[]" class="form-control" multiple>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}" {{ in_array($color->id, old('colors', [])) ? 'selected' : '' }}>
                        {{ $color->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
             <label for="quantity">Količina</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
  </div>
</div>
@endsection
