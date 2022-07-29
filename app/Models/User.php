<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        //One to Many => Un usuario puede tener multiples posts
        // usamos al modelo que queremos acceder Post::class
        // se agrega , 'user_id' si laravel no lo relaciona directamente, 
        // le marcamos la llave foranea de el modelo que vamos a acceder

        return $this->HasMany(Post::class, 'user_id');
        // el 'user_id' es opcional, porque ya tiene la tabla POST una llave foranea user_id  vinculada a la tabla users
    }
    public function likes() {
        // Aqui no agregamos nada, proque el modelo like, usa las ocnvenciones de laravel, 
        // La tabla like, tiene una llave foreanea user_id que conecta a la tabla users, por eso no se agrega nadamas
        return $this->HasMany(Like::class);
    }
    //Almacena los seguidores de un usuario
    public function followers(){
        // Aqui nos salimos de las convenciones y asignamos manualmente la relacion hacia Users
        // La el metodo 'followes' en la tabla de 'followers' pertenece a muchos usuarios
        //  foreanea 'user_id', 'follower_id'
        // El usuario va a terner el metodo de followers y va a insertar en la tabla 'followers' tanto el 'user_id', 'follower_id'
        // user_id es el usuario que estamos visitando, follower_id es la persona que apreto el boton seguir
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }
    // Almacenar los que seguirmos
    public function followings() {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }
    // Comprobar si un usuario ya sigue a otro | No tiene que ver con las relaciones
    public function siguiendo(User $user) {
        // iterar en toda la coleccion(tabla) de followers 
        return $this->followers->contains($user->id);
    }

    //Almacenar los que te siguen
}
