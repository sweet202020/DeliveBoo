<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Plate;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable=['name'];

    public function plates(): HasMany
    {
        return $this->hasMany(Plate::class);
    }
}
