<?php

namespace App\Services\postList;

use App\Models\Post;
use App\Contracts\Dao\PostList\PostListDaoInterface;
use App\Contracts\Services\PostList\PostListServiceInterface;
use Illuminate\Support\Facades\Auth;


class PostListService implements PostListServiceInterface
{
    private $postListDao;


    /**
     * Constructor class
     */
    public function __construct(PostListDaoInterface $postListDao)
    {
        $this->postListDao = $postListDao;
       
    }

    
    /**
     * Get postList data
     * @param -
     * @return Object
     */
    public function getAllPostList($searchname)
    {
        return $this->postListDao->getAllPostList($searchname);
    }

    /**
     * Store register post data
     * @param Illuminate\Http\Request $request
     * @return
     */
    public function storePost($title,$description)
    {
        // save post information
        $postId = $this->postListDao->storePost($this->setPostData($title,$description));
    }

    /**
     * Set user data to model
     * @param Illuminate\Http\Request $request
     * @return Post
     */
    private function setPostData($title,$description)
    {
        $post = new Post();
        $post->title = $title;
        $post->description = $description;
        $post->status = config("constants.ACTIVE_STATUS");
        $post->create_user_id = Auth::user()->id;
        $post->updated_user_id = Auth::user()->id;
        $post->created_at = now();
        $post->updated_at = now();
        
        return $post;
    }

     /**
      * Get post data by id
      * @param int
      * @return Post
      */
      public function getPostDataById($postId)
      {
          return $this->postListDao->getPostDataById($postId);
      }

    /**
     * Update user data
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param int $id
     */
    public function updatePost($id, $title,$description)
    {
        // update user data
        $post = $this->postListDao->getPostDataById($id);
        if($post){
            $post->title = $title;
            $post->description = $description;
            $post->updated_user_id = Auth::user()->id;
            $post->updated_at = now();

            $this->postListDao->updatePost($post);
        }
    }

    /**
     * Delete Post data
     * @param String $postId
     * @return Boolean
     */
    public function deletePost($postId)
    {
        return $this->postListDao->deletePost($postId);
    }

}