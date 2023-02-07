<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Restaurant;
use App\Models\Order;
use Illuminate\Support\Str;

class Plate extends Model
{
    use HasFactory;
    protected $fillable=['name', 'description', 'price', 'best_seller', 'visible', 'cover_image', 'slug'];

    public static function createSlug($input)
    {
        return Str::slug($input);
    }

    public function restaurants(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
