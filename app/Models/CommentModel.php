<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommentModel extends Model
{
    use HasFactory;
    protected $table = "comment";
    protected $primaryKey = "CommentId";
    public function getComment($postId = 0){
        return DB::table('comment')->join('users','users.id', '=', 'comment.UserId')->where('comment.PostsId',$postId)->where('comment.is_deleted',0)->get();
    }

    public function createComment($data = [])
    {
        return DB::table('comment')->insert($data);
    }
}
