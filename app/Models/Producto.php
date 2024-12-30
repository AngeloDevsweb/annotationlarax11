<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //si queremos ser mas explicitos aunque hayamos seguido la convencion 
    //podemos hacer esto
    protected $table = 'productos';

    // Si deseas permitir la asignación masiva de campos específicos:
    protected $fillable = ['nombre', 'descripcion', 'precio', 'cantidad' , 'user_id'];

    //cada producto pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
