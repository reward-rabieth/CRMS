<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'date:hh:mm',
        'updated_at' => 'date:hh:mm',
    ];

    public function police() {
        return $this->belongsTo(User::class);
    }

    public function investigator() {
        return $this->belongsTo(User::class);
    }
}
