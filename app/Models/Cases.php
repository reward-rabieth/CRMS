<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    public function suspect() {
        return $this->belongsTo(Suspects::class);
    }

    public function crime() {
        return $this->belongsToMany(CrimeCategory::class);
    }

    public function officer() {
        return $this->belongsTo(User::class);
    }
}
