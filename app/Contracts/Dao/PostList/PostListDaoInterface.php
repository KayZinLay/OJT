<?php


namespace App\Contracts\Dao\PostList;

interface PostListDaoInterface
{
    /**
     * Get postlist data
     * @param -
     * @return Object
     */
    public function getAllPostList($searchname);

    /**
     * create PostData
     * @param -
     * @return Object
     */
    public function storePost($post);

    /**
      * Get post data by id
      * @param int
      * @return Post
      */
    public function getPostDataById($postId);

    /**
     * Delete Post data
     * @param Integer $postId
     * @return Boolean
     */
    public function deletePost($postId);


    /**
     * Update post data
     * @param Post
     * @return int 
     */
    public function updatePost($post);
}