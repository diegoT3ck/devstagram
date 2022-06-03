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
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }
}
