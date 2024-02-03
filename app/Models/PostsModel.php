<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostsModel extends Model
{
    use HasFactory;

    private $tableDb = 'posts';
    function addPosts($data = []){
        return DB::table($this->tableDb)->insert($data);
    }

    function getAllPosts(){
        return DB::table($this->tableDb)->join('users', 'users.id', '=', 'posts.author')->where('posts.is_deleted','0')->get();
    }

    function findPostsById($id = 0)
    {
        return DB::table($this->tableDb)
                ->join('users', 'users.id', '=', 'posts.author')
                ->where('posts.posts_id',$id)
                ->first();
    }

    function updatePosts($id = 0, $data = []){
        return DB::table($this->tableDb)->where('posts_id',$id)->update($data);
    }

    function deletePosts($id = 0)
    {
        return DB::table($this->tableDb)->where('posts_id',$id)->update(['is_deleted' => '1']);
    }
}
