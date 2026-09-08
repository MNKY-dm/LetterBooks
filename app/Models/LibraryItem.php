<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LibraryItem extends Model
{

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }

    public function possession(): BelongsTo
    {
        return $this->belongsTo(Possession::class);
    }

    protected $fillable = [
        'edition_id',
        'possession_id',
    ];
}
