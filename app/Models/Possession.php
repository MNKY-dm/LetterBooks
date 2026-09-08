<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Possession extends Model
{
    public function libraryItems(): HasMany {
        return $this->hasMany(LibraryItem::class);
    }

    protected $fillable = [
        'name',
    ];
}
