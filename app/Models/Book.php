<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{

    public function authors() : BelongsToMany {
        return $this->belongsToMany(Author::class);
    }

    public function editions(): HasMany {
        return $this->hasMany(Edition::class);
    }

    public function genres() : BelongsToMany {
        return $this->belongsToMany(Genre::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function logs(): HasMany {
        return $this->hasMany(Log::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function lists(): BelongsToMany
    {
        return $this->belongsToMany(UserList::class);
    }

    public function usersWithBookInPal(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'pals', 'book_id', 'user_id');
    }

    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_likes', 'book_id', 'user_id');
    }

    protected $fillable = [
        'title',
        'story',
        'image',
        'release_date',
        'google_canonical_volume_id',
        'open_library_work_id',
    ];
}
