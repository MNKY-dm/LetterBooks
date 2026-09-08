<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Log extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book(): BelongsTo {
        return $this->belongsTo(Book::class);
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }

    public function progress(): BelongsTo
    {
        return $this->belongsTo(Progress::class);
    }

    public function review() : HasOne {
        return $this->hasOne(Review::class);
    }

    protected $fillable = [
        'edition_id',
        'start_date',
        'finished_date',
        'progress_id',
        'abandon_reason',
        'rating',
    ];
}
