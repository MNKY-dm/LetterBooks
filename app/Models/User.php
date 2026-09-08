<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Fortify\Contracts\PasskeyUser;
use Laravel\Fortify\PasskeyAuthenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, PasskeyAuthenticatable, TwoFactorAuthenticatable;

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        $initials = Str::initials($this->name, true);

        return Str::length($initials) > 1
            ? Str::substr($initials, 0, 1).Str::substr($initials, -1)
            : $initials;
    }

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function lists() : HasMany
    {
        return $this->hasMany("UserList");
    }

    public function libraryItems() : HasMany
    {
        return $this->hasMany("LibraryItem");
    }

    public function pronoun() : BelongsTo {
        return $this->belongsTo("Pronoun");
    }

    public function palBooks(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }

    public function wishlistEditions(): BelongsToMany
    {
        return $this->belongsToMany(Edition::class);
    }

    public function likedBooks(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_likes', 'user_id', 'book_id');
    }

    public function likedReviews(): BelongsToMany
    {
        return $this->belongsToMany(Review::class, 'review_likes', 'user_id', 'review_id');
    }

    protected $fillable = [
        'username',
        'surname',
        'name',
        'email',
        'password',
        'avatar',
        'biography',
        'pronoun_id',
        'custom_pronouns',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
