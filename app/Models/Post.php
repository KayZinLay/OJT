<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Post extends Authenticatable
{

    // manual column name for soft delete datetime column
    const DELETED_AT = 'delete_datetime';
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'create_user_id',
        'updated_user_id',
        'deleted_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function getAllPosts()
    {

        $posts =  DB::table('posts')
                    ->select("posts.id","posts.title","posts.description", "posts.created_at","u.name")
                    ->leftjoin("users as u", "u.id", "=","posts.create_user_id")
                    ->whereNull('posts.deleted_at')
                    ->whereNull('posts.deleted_user_id')
                    ->where('posts.status', config("constants.ACTIVE_STATUS"))
                    ->get()->toArray();

        return $posts;
    }

}
