<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['user_id', 'name'];


    /**
     * 一个category属于一个user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


    /**
     * 一个category属于多个note
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function notes()
    {
        return $this->hasMany('App\Note');
    }
}
