<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Plate;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'delivery_address', 'customer_name', 'phone_number'];

    public function plates(): BelongsToMany
    {
        return $this->belongsToMany(Plate::class);
    }
}
