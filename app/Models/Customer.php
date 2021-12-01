<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome', 'email'];

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function requests(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
