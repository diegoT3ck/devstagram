<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];

    public function user() {
        //Un post pertenece a un usuario  $this->belongsTo(User::class) trae toda la tabla de los usuarios
        //Limitamos que campos vamos a seleccionar  ->select(['name', 'username']);
        // si cambiamos el nombre de la funcion tenemos que modificar (User::class, [foreignKey] ) si es que no se usan las convenciones de laravel
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }
    public function comentarios() {
        //Un post tiene multiples comentarios
        return $this->hasMany(Comentario::class);
    }
    public function likes() {
        //Un post tiene multiples Likes
        return $this->hasMany(Like::class);
    }
    public function checkLike(User $user) {        
        //Revisa si en la tabla de likes, contiene el user_id
        return $this->likes->contains('user_id', $user->id);
    }
}
