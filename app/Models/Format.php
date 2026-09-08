<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Format extends Model
{

    public function editions(): HasMany {
        return $this->hasMany(Edition::class);
    }

    protected $fillable = [
        'name',
    ];
}
