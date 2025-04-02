<!-- edit.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Product Data
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
      <form method="post" action="{{ route('products.update', $Product->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Product Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $Product->name }}"/>
          </div>
		            <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Product Description:</label>
              <input type="text" class="form-control" name="description" value="{{ $Product->description }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Product Price :</label>
              <input type="text" class="form-control" name="price" value="{{ $Product->price }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection

