<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Progress extends Model
{

    protected $table = 'progresses';

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    protected $fillable = [
        'name'
    ];
}
