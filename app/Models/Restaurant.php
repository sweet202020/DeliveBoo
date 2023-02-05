<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Type;
use App\Models\Plate;
use App\Models\User;

class Restaurant extends Model
{
    use HasFactory;

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function plates(): HasMany
    {
        return $this->hasMany(Plate::class);
    }

    public function users(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
