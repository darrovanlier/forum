<?php
include_once('includes/navbar.php');
include('app/topichandler.php');


?>
<?php
if ($fetch_thread->rowCount() > 0) {
    $row = $fetch_thread->fetch();
    echo '
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <article class="md-card">
                <div class="md-card-heading">
                    <h3>'.$row['title'].'</h3>
                    <p><b>'.$row['author'].'</b> <small>'.$row['created_at'].'</small></p>
                </div>
                <div class="md-card-content">
                    <p>'.$row['context'].'</p>
                </div>';
                    if(isset($_SESSION['username'])) {
                            if ($row['author'] === $_SESSION['username'] OR $_SESSION['admin'] == true) {
                                echo '<form method="post">';
                                echo '<button name="delete_post" type="submit" class="md-button-flat-red" style="align-content: center">Delete</button>';
                                echo '</form>';
                            } else {
                                echo '';
                            }
    }
    echo '
            </article>
        </div>
    </div>
</div>';
    echo $deletepost_msg;
} else {
    echo "<div class=\"text-center\"><h4>This post does not exist!</h4><a href=\"index.php\">Return</a></div></div>";
};
?>

                <?php
                if ($fetch_thread->rowCount() > 0 AND isset($_SESSION['username'])) {
                    echo '<form method="post">';
                    echo '<div class="form-group">';
                    echo '<label for="textarea">Reply content</label>';
                    echo '<textarea name="reply_content" class="form-control" id="textarea" rows="3" maxlength="1000"></textarea>';
                    echo $content_error;
                    echo '</div>';
                    echo $create_reply_msg;
                    echo '<button name="create_reply" type="submit" class="md-button-raised-blue">Reply</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<br> <hr> <br>';
                }
                ?>

<?php
if ($fetch_replies->rowCount() > 0) {
    $rows = $fetch_replies->fetchAll();
    foreach ($rows as $row) {
        $id = $row['id'];
echo '
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <article class="md-card">
                    <div class="md-card-heading">
                        <p><b>'.$row['author'].'</b> <small>'.$row['created_at'].'</small></p>
                    </div>
                    <div class="md-card-content">
                        <p>'.$row['context'].'</p>
                    </div>';
                    if(isset($_SESSION['username'])) {
            if ($row['author'] === $_SESSION['username'] OR $_SESSION['admin'] == true) {
                echo '<form method="post">';
                echo "<input value='$id' name='delete_id' style='display: none'>";
                echo '<button name="delete_reply" type="submit" class="md-button-flat-red">DELETE</button>';
                echo '</form>';
            } else {
                echo '';
            }
        };
               echo ' </article>
            </div>
        </div>
    </div>
    ';} }
?>











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