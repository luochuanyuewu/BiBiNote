<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //所关联的表名
    protected $table = 'notes';
    //可以被赋值的字段
    protected $fillable = ['user_id', 'pic_id', 'category_id','title', 'content'];


    /**
     * 一个note属于一个user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


    /**
     * 一个note属于一个category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }


}
