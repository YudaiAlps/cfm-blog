<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function getData(){
        return $this->id. ':'. $this->content;
    }
}
