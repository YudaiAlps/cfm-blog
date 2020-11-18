<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

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
        return $this->belongsTo('App\User', 'user_id');
    }
    public function getData(){
        return $this->id. ':'. $this->title. '('. optional($this->user)->name . ')';
    }

    public function getDate(){
        return $this->created_at;
    }

}
