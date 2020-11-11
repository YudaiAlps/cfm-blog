<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     * 
     */
    protected $fillable = [
        'title','content','category','user_id'
    ];

    //   

    protected $primaryKey = 'user_id';

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function getData(){
        return $this->id. ':'. $this->title. '('. $this->created_at . ')';
    }

}
