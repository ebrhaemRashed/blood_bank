<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'category_id', 'content', 'image');

    public function getIsFavouriteAttribute()
    {
        $post = $this->whereHas('clients',function ($query){
            $query->where('client_post.client_id',request()->user()->id);
            $query->where('client_post.post_id',$this->id);
        })->first();


        // $post = $this->whereHas('clients',function ($query){
        //     $query->where('clients.client_id',request()->user()->id);
        // })->first();



        // client
        // null
        if ($post)
        {
            return true;
        }
        return false;
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
