<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model 
{
    //
    //use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = ['titulo', 'detalle','archivo', 'user_id', 'visto', 'descargado'];

    public function user()
	{
		return $this->belongsTo('App\User');
    }
/*    
    public function comentarios()
	{
		return $this->hasMany('App\Comentario');
    }
*/
}    