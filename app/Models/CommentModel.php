<?php

namespace App\Models;

use App\Enums\TaskSoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommentModel extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $primaryKey = "comment_id";
    public function getComment($postId): \Illuminate\Support\Collection
    {
        return DB::table('comments')->join('users','users.id', '=', 'comments.user_id')->where('comments.posts_id',$postId)->where('comments.is_deleted',TaskSoftDelete::NotDeleted)->get();
    }

    public function createComment($data): bool
    {
        return DB::table('comments')->insert($data);
    }

    public function softDeleteComment($id): int
    {
        return DB::table('comments')->where('comment_id',$id)->update(['is_deleted' => TaskSoftDelete::Deleted]);
    }
}
