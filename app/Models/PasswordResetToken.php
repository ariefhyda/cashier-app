<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;
    protected $table = 'password_reset_tokens';

    // If your primary key is not 'id', specify it
    // protected $primaryKey = 'your_primary_key';

    // If you want to disable the incrementing feature of the primary key
    // public $incrementing = false;

    // If your primary key is non-numeric
    // protected $keyType = 'string';

    public $timestamps = false;  // Since `created_at` is handled manually

    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
}
