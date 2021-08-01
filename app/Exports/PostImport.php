<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title'     => $row['title'],
            'description'    => $row['description'],
            'create_user_id' => $row['create_user_id'],
            'updated_user_id' => $row['updated_user_id'],
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}