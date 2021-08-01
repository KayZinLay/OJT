<?php

namespace App\Contracts\Services\PostList;

interface PostListServiceInterface
{
    /**
     * Get postlist data
     * @param -
     * @return Object
     */
    public function getAllPostList($searchname);

    /**
     * Store register post data
     * @param Illuminate\Http\Request $request
     * @return
    */
    public function storePost($title,$description);

    /**
      * Get post data by id
      * @param int
      * @return Post
      */
    public function getPostDataById($postId);

    /**
     * Delete post data
     * @param Integer $postId
     * @return Boolean
     */
    public function deletePost($postId);

    /**
     * Update post data
     * @param \App\Http\Requests\PostUpdateRequest $request
     * @param int $id
     */
    public function updatePost($id, $title, $description);
}