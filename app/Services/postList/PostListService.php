<?php

namespace App\Services\postList;
use App\Contracts\Dao\PostList\PostListDaoInterface;
use App\Contracts\Services\PostList\PostListServiceInterface;


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
    public function getAllPostList()
    {
        return $this->postListDao->getAllPostList();
    }

}