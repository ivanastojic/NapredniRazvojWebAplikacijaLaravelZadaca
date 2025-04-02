<!-- resources/views/products/store.blade.php -->

@extends('layout')

@section('content')
    <h2>Dodaj proizvod</h2>

    <!-- Prikazivanje grešaka ako postoje -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    <!-- Forma za unos novog proizvoda -->
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Naziv proizvoda:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Opis proizvoda:</label>
            <input type="text" name="description" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Cijena proizvoda:</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj proizvod</button>
    </form>
@endsection
