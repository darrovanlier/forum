<?php
include_once('includes/navbar.php');
include('app/topichandler.php');


?>



<div class="container">


    <div class="container margin-top">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center">
                <?php
                if ($fetch_thread->rowCount() > 0) {
                    $row = $fetch_thread->fetch();
                    echo '<div class="card">';
                    echo '<div class="card-block">';
                    echo '<h4 class="card-title">'.$row['title'].'</h4>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">Created by: '.$row['author'].'</h6>';
                    echo '<p class="card-text">'.$row['context'].'</p>';
                         if(isset($_SESSION['username'])) {
                            if ($row['author'] === $_SESSION['username']) {
                                echo '<form method="post">';
                                echo '<button name="delete_post" type="submit" class="btn btn-danger">Delete thread</button>';
                                echo '</form>';
                            } else {
                                echo '';
                            }
                        }
                    echo '</div>';
                    echo '<div class="card-footer text-muted">Created at '.$row['created_at'].'</div>';
                    echo '</div>';
                    echo $deletepost_msg;
                } else {
                    echo "<div class=\"text-center\"><h4>This post does not exist!</h4><a href=\"index.php\">Return</a></div></div>";
                };
                ?>
                <?php
                if (!$fetch_thread->rowCount() > 0) {
                    echo '';
                } else {
                    echo '<div class="card mt-2 mb-2">';
                    echo '<div class="card-block">';
                    echo '<form method="post">';
                    echo '<div class="form-group">';
                    echo '<label for="textarea">Reply content</label>';
                    echo '<textarea name="reply_content" class="form-control text-center" id="textarea" rows="2" maxlength="1000"></textarea>';
                    echo $content_error;
                    echo '</div>';
                    echo $create_reply_msg;
                    echo '<button name="create_reply" type="submit" class="btn btn-primary">Reply</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                <?php
                if ($fetch_replies->rowCount() > 0) {
                    $rows = $fetch_replies->fetchAll();
                    foreach ($rows as $row) {
                        echo '<div class="card mt-2 mb-2">';
                        echo '<div class="card-block">';
                        echo '<p class="card-text">' . $row['context'] . '</p>';
                        echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['author'] . '</h6>';
                        echo '</div><div class="card-footer text-muted">Created at ' . $row['created_at'] . '</div><hr></div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>









<!--                <h2 class="text-center">Replies</h2>-->
<!--                <table class="table table-striped table-bordered table-hover table-responsive">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>Description</th>-->
<!--                        <th>Created at</th>-->
<!--                        <th>Created by</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        --><?php
//                        if ($fetch_replies->rowCount() > 0) {
//                            $rows = $fetch_replies->fetchAll();
//                            foreach ($rows as $row) {
//                                $id = $row['id'];
//                                echo '<td>'.$row['context'].'</td>';
//                                echo '<td class="col-md-2">'.$row['created_at'].' </td>';
//                                echo '<td class="col-md-2">'.$row['username'].'</td>';
//                                echo '</tr>';
//                            }
//                        }
//                        ?>
<!---->
<!--                    </tbody>-->
<!--                </table>-->
</div>



<?php
include('includes/footer.php');
?>