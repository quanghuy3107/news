<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{
    /**
     * Create a new component instance.
     */
//    public $dataComment;
    public function __construct(public $data)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment');
    }

    public function getComment($data, $postId)
    {
        echo '<ul>';
        foreach ($data as $comment) {
            echo '<li>';
            $content =  "<div class='row'>
            <div class='d-flex align-items-center' onclick=reply()>
                <p class='name-user'><i class='fa-regular fa-user'></i>". $comment['Name'] .":</p>
                <p class='content-comment'>". $comment['Content'] . "</p>
            </div>
            </div>
            <div>
            <div>
                                <form action='?controller=comment&act=addComment' method='POST'>
                                    <textarea name='comment' id='submit' cols='100%' rows='1'></textarea>
                                    <input type='hidden' name='PostsId' value='". $postId ." '>
                                    <input type='hidden' name='ParentId' value='" . $comment['CommentId']."'><button type='submit' class='btn btn-primary'>Gửi</button>
                                </form>
                            </div>
            </div>";
            echo $content;
            if (isset($comment['children'])) {
                $this->getComment($comment['children'], $postId);
            }
            echo '</li>';
        }
        echo '</ul>';
    }
}
