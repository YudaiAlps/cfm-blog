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
    // 必須入力項目を指定
    protected $fillable = [
        'content','category','user_id'
    ];

    //プライマリキーを指定
    protected $primaryKey = 'id';

    // リレーションの設定（従テーブルから主テーブルへ）
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    // 投稿のタイトル、投稿者を取得。もしユーザーがいなかった場合でもエラーが出ない
    public function getData(){
        return $this->title. '('. optional($this->user)->name . ')';
    }

    // 投稿日時を取得
    public function getDate(){
        return $this->created_at;
    }

    public function getReply(){
        return $this->content.'('.optional($this->user)->name .')';
    }
}
