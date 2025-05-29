<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'checklist', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

