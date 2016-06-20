<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //所关联的表名
    protected $table = 'notes';
    //可以被赋值的字段
    protected $fillable = ['user_id', 'title', 'content'];


    /**
     * 一个note属于一个user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }



    /**
     * 一个note属于多个tag
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }




}
