<?php
namespace App\Dao\PostList;


use App\Contracts\Dao\PostList\PostListDaoInterface;
use DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class PostListDao implements PostListDaoInterface
{
    /**
     * Get all postlist 
     * 
     * @return Array
     */
    public function getAllPostList($searchname)
    {
        $posts =  Post::select("u.name", "posts.id","posts.description", "posts.created_at","posts.title")
            ->leftjoin("users as u", "u.id", "=","posts.create_user_id")
            ->whereNull('posts.deleted_at')
            ->whereNull('posts.deleted_user_id')
            ->where('posts.status', config("constants.ACTIVE_STATUS"));
            if($searchname) {
                $posts -> where('title', 'LIKE', "%{$searchname}%")
                         -> orWhere('description', 'LIKE', "%{$searchname}%")
                         ->orWhere('u.name', 'LIKE', "%{$searchname}%");

            }
            $posts = $posts->orderBy('posts.id','desc')->paginate(5,array('posts.*', 'u.name as c_name'));
        
        return $posts;
    }

    /**
     * Store register post data
     * @param Post
     * @return int
     */
    public function storePost($post)
    {
        $post->save();
        return $post->id;
    }

    /**
     * Get postt data by id
     * @param int
     * @return Post
     */
    public function getPostDataById($postId)
    {
        return Post::find($postId);
    }

     /**
     * Update post data
     * @param Post
     * @return int
     */
    public function updatePost($post)
    {
        return $post->update();
    }

    /**
     * Delete Post data
     * @param Array $postId
     * @return Boolean
     */
    public function deletePost($postId)
    {
        $post_id = Post::find($postId)->id;
        Post::where('id', $post_id)->update([
            'deleted_user_id' => Auth::user()->id,
            'deleted_at' => now()
        ]);
        return true;
    }

    public function storeListPost($insertData)
    {
        Post::insert($insertData);
    }
    


}
