<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'cep',
        'rua',
        'cidade',
        'bairro',
        'numero',
        'complemento'
    ];

    public function Customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
