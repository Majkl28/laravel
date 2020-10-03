<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Získej všechny role uživatele.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role')->using(UserRole::class);
    }

    /**
     * Zkontroluj, zdali uživatel má přiřazenou roli s předaným klíčem.
     *
     * @param  string $slug
     * @return bool
     */
    public function hasRole($slug)
    {
        return $this->roles()->where('slug', $slug)->exists();
    }

    /**
     * Přiřaď uživateli role na základě jejich klíčů.
     *
     * Tato metoda se též postará o případné duplicity na základě rozdílu aktuálních a nových rolí.
     *
     * @param  array $slugs
     * @return void
     */
    public function assignRoles($slugs)
    {
        $newRoles = Role::whereIn('slug', $slugs)->pluck('id')->toArray();
        $this->roles()->syncWithoutDetaching($newRoles);
    }
}
