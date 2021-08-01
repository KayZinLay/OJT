<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Contracts\Services\PostList\PostListServiceInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostExport;
use App\Exports\PostImport;
use Validator;
use Session;

class PostController extends Controller
{
    private $postService;

     /**
     * Constructor Class
     */
    public function __construct(PostListServiceInterface $postService)
    {
        $this->postService = $postService;
    }
    
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function getAllPostList(Request $request)
    {
        $search = $request->input('searchname');
        $postList_data = $this->postService->getAllPostList($search);

        return view('postlist', compact('postList_data'));
        
    }

    /**
     * Get initial data for user register screen
     * @param -
     * @return view
     */
    public function getPostRegisterInit()
    {
        return view('post.post_register');
    }

    /**
     * Get initial data for user register screen
     * @param -
     * @return view
     */
    public function confrimPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        return view('post.postconfirm' , compact('post'));
    }


    /**
     * Store a newly post data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePostNewData($title,$description)
    {
        $this->postService->storePost($title,$description);
        return redirect()->route('postlist')->with('message', 'Registered Successfully');
    }

    /**
     * Get initial data for post edit screen
     * @param int
     * @return view
     */
    public function getEditPostInit($id)
    {
        // get post data
        $post = $this->postService->getPostDataById($id);
        
        return view('post.update', compact('post'));
    }

    /**
     * Get initial data for post edit screen
     * @param int
     * @return view
     */
    public function updateConfirmPost(Request $request,$id)
    {
        // get post data
        $post = new Post();
        $post->id = $id;
        $post->title = $request->title;
        $post->description = $request->description;
        
        return view('post.updatepostconfirm', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatePost($id,$title,$description)
    {
        $this->postService->updatePost($id, $title,$description);
        return redirect()->route('postlist');
    }

    /**
     * Delete Post data
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function deletePost(Request $request)
    {
        $result = false;
        if (isset($request->id)) {
            $result = $this->postService->deletePost($request->id);
        }
        
        return redirect()->route('postlist');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createForm()
    {
        return view('post.fileUpload');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {

        // $request->validate([
        //     'file' => 'required|mimes:csv|max:2048'
        //     ]);
        $this->validate($request, [
            'file' => 'required|file|mimes:csv|max:2048',
        ]);
        Excel::import(new PostImport, $request->file('file')->store('temp'));
        return redirect()->route('postlist');
    }

    /**
     * Download Post Data
     * @param -
     * 
     */
    public function export(Request $request) 
    {
        return Excel::download(new PostExport, 'postData.xlsx');
    }
    
}
