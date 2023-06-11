<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;
    protected $table = 'log_activity';

    protected $fillable = [
        'id',
        'subject',
        'url',
        'method',
        'ip',
        'agent',
        'user_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the user that owns the vehicle reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['id', 'name']);
    }
}
