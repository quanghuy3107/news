<?php
if (!function_exists('getComment')) {
    function getComment($data, $postId)
    {
        echo '<ul>';
        foreach ($data as $comment) {
            echo '<li>';
            echo "<div class='row'>
            <div class='d-flex align-items-center'>
                <p class='name-user'><i class='fa-regular fa-user'></i>". $comment['Name'] .":</p>
                <p class='content-comment'>". $comment['Content'] . "</p>
                <a href='". $comment['Content'] . "'

            </div>
            </div>
            <div>
            <div>

                                <form action='/AddComment' method='POST'>".
                 csrf_field() . "
                                    <textarea name='Content' id='submit' cols='100%' rows='1'></textarea>
                                    <input type='hidden' name='PostsId' value='". $postId ." '>
                                    <input type='hidden' name='ParentId' value='" . $comment['CommentId']."'><button type='submit' class='btn btn-primary'>Gửi</button>
                                </form>
                            </div>
            </div>";

            if (isset($comment['children'])) {
                getComment($comment['children'], $postId);
            }
            echo '</li>';
        }
        echo '</ul>';

    }


}

?>
