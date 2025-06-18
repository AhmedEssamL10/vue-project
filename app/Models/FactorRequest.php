<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactorRequest extends Model
{
    protected $fillable = [
        'count',
        'date_from',
        'date_to',
        'client_name',
        'client_email',
        'client_phone',
        'total',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
