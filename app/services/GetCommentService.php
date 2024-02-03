<?php

namespace App\services;

use App\DTO\CommentDTO;

class GetCommentService
{
    private $dataComment;

    public function setCommentData($commentDTO) : void
    {
        $this->dataComment = $commentDTO;
    }

    public function getComment()
    {
        return $this->dataComment;
    }

    public function getAllComment() :array
    {
        $allComments = array();
        $this->getComments($this->getComment(), 0, 0, $allComments);
        return $allComments;
    }

    public function getComments($comments, $parentId = 0, $level = 0, &$result = array())
    {
        $children = array();
        foreach ($comments as $comment) {
            if ($comment->parent_comment_id == $parentId) {
                // Tạo một mảng mới chứa thông tin của comment
                $commentInfo = array(
                    'comment_id' => $comment->comment_id,
                    'content' => $comment->content,
                    'user_id' => $comment->user_id,
                    'created_at' => $comment->created_at,
                    'parent_comment_id' => $comment->parent_comment_id,
                    'posts_id' => $comment->posts_id,
                    'name' => $comment->name,
                    'level' => $level
                );

                // Gọi đệ quy để lấy thông tin của các comment con
                $this->getComments($comments, $comment->comment_id, $level + 1, $children);

                // Nếu có comment con, thêm chúng vào mảng 'children'
                if (!empty($children)) {
                    $commentInfo['children'] = $children;
                }

                // Thêm mảng thông tin của comment vào mảng kết quả
                $result[] = $commentInfo;

                // Đặt lại mảng 'children' để sử dụng cho comment tiếp theo
                $children = array();
            }
        }
    }

}
