<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Date;

class Request extends Model
{
    public $timestamps = false;
    protected $fillable = ['descricao', 'data_registro'];

    public function customers(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

}
