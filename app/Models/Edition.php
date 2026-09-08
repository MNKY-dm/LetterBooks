<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Edition extends Model
{
    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    public function format() : BelongsTo {
        return $this->belongsTo(Format::class);
    }

    public function libraryItems(): HasMany
    {
        return $this->hasMany(LibraryItem::class);
    }

    public function language() : BelongsTo {
        return $this->belongsTo(Language::class);
    }

    public function usersWantingEdition(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists', 'edition_id', 'user_id');
    }

    protected $fillable = [
        'isbn_10',
        'isbn_13',
        'google_volume_id',
        'open_library_edition_id',
        'book_id',
        'language_id',
        'cover',
        'release_date',
        'summary',
        'page_count',
        'publisher',
        'format_id',
    ];
}
