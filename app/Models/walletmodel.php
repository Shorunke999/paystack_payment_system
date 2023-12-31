<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class walletmodel extends Model
{
    use HasFactory;
    protected $table = 'wallet';
    protected $fillable = [
        'balance',
        'AccountNumber'
    ];
    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}

