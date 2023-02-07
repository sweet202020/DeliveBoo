<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Type;
use App\Models\Plate;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable =['restaurant_name', 'address', 'opening_time', 'delivery_price', 'cover_image', 'partita_iva','slug','user_id'];



    public static function createSlug($input)
    {
        return Str::slug($input);
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function plates(): HasMany
    {
        return $this->hasMany(Plate::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
