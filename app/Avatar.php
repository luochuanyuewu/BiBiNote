<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    //


    protected $uploads = '/images/';

    protected $table = 'avatars';

    protected $fillable = ['path'];

    /**
     * 返回文件的上传路径,这个耦合比较严重,具体请查看accessor访问器
     * @param $avatar
     * @return string
     */
    public function  getPathAttribute($avatar)
    {
        return $this->uploads . $avatar;
    }


}
