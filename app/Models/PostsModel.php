<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostsModel extends Model
{
    use HasFactory;

    private $tableDb = 'Posts';
    function addPosts($data = []){
        return DB::table($this->tableDb)->insert($data);
    }

    function getAllPosts(){
        return DB::table($this->tableDb)->join('users', 'users.id', '=', 'posts.Author')->where('posts.is_deleted','0')->get();
    }

    function findPostsById($id = 0)
    {
        return DB::table($this->tableDb)
                ->join('users', 'users.id', '=', 'posts.Author')
                ->where('posts.PostsId',$id)
                ->first();
    }

    function updatePosts($id = 0, $data = []){
        return DB::table($this->tableDb)->where('PostsId',$id)->update($data);
    }

    function deletePosts($id = 0)
    {
        return DB::table($this->tableDb)->where('PostsId',$id)->update(['is_deleted' => '1']);
    }
}
