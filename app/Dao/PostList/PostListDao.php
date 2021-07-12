<?php
namespace App\Dao\PostList;


use App\Contracts\Dao\PostList\PostListDaoInterface;
use DB;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;


class PostListDao implements PostListDaoInterface
{
    /**
     * Get all postlist 
     * @param -
     * @return Array
     */
    public function getAllPostList()
    {
        $posts = DB::table('posts')->select('title','description','create_user_id','created_at')->get();
        $posts = Post::orderBy('id','desc')->paginate(1);   
        return $posts;   
    }
}
