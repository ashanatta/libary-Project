<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author_id', 'publication_year', 'is_available'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
