<!-- layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel Product CRUD Tutorial</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
  <div class="container mt-4">
    
    {{-- Navigacija --}}
    <div class="mb-3">
      <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Početna</a>
      <a href="{{ route('categories.index') }}" class="btn btn-secondary">Pogledaj kategorije</a>
    </div>

    {{-- Glavni sadržaj stranice --}}
    @yield('content')
    
  </div>
</body>
</html>

