<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Post
 * @property string  title
 */
class Post extends Model {

    /**
     *
     * @var type 
     */
    protected $fillable = ['title', 'content'];

    /**
     * 
     * @return type
     */
    public function comments() {
        return $this->hasMany('\App\Model\Comment');
    }

    /**
     * 
     * @return type
     */
    public function user() {

        return $this->belongsTo('\App\Model\User');
    }

}
