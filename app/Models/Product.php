<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    // Dodaj $fillable za masovno dodeljivanje
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'quantity',
    ];
     // Relacija: Proizvod pripada kategoriji
     public function category():BelongsTo
     {
         return $this->belongsTo(Category::class);  // Jedan proizvod pripada jednoj kategoriji
     }
     public function colors(): BelongsToMany
     {
         return $this->belongsToMany(Color::class);
     }
}

