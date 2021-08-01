<?php

namespace App\Exports;

use App\Models\Post;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PostExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */  
    // use Exportable;

    public function headings(): array
    {
        return [
            'Id',
            'Post Title',
            'Post Description',
            'Postd Date',
            'Posted User',
        ];
    }
    public function collection()
    {
        // return Post::all()
        //     ->whereNull('deleted_at')
        //     ->whereNull('deleted_user_id')
        //     ->where('status',config("constants.ACTIVE_STATUS"));

        return collect(Post::getAllPosts());

    }
    // public function map($post): array
    // {
    //     return [
    //         $post->id,
    //         $post->title,
    //         $post->description,
    //         $post->name,
    //         $post->created_at,
    //     ];
    // }
}