<?php
include_once('includes/navbar.php');
include('app/themehandler.php');


?>

            <div class="container">
                <?php
                if ($query_fetch_themes->rowCount() > 0) {
                    $row = $query_fetch_themes->fetch();
                    echo '
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <article class="md-card">
                                        <div class="md-card-heading">
                                            <h3>'.$row['title'].'</h3>
                                        </div>
                                        <div class="md-card-content">
                                            <p>'.$row['description'].'</p>
                                        </div>';
                    if(isset($_SESSION['username'])) {
                        if ($_SESSION['admin'] == true) {
                            echo '<form method="post">';
                            echo '<button name="delete_theme" type="submit" class="md-button-flat-red" style="align-content: center">Delete</button>';
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
}

?>


                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                        <?php
                        if ($fetch_themes->rowCount() > 0) {
                            echo '
                        <th > Name</th >
                        <th > Description</th >
                        <th > Created at </th >
                        <th > Created by </th >';
                            }
                            ?>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        if ($fetch_themes->rowCount() > 0) {
                            $rows = $fetch_themes->fetchAll();
                            foreach ($rows as $row) {
                                $id = $row['id'];
                                echo '<td><a href="topic.php?id=' . $id . '">' . $row['title'] . '</td>';
                                echo '<td>' . $row['context'] . '</td>';
                                echo '<td class="col-md-2">' . $row['created_at'] . '</td>';
                                echo '<td class="col-md-2">' . $row['author'] . '</td>';
                                echo '</tr>';
                            }
                        } else
                            echo "<div class=\"text-center\"><h4>There is nothing here yet! be the first one to place a topic</h4></div></div>";
                        ?>

                    </tbody>
                </table>
            </div>

<?php
if (isset($_SESSION['username']) AND $query_fetch_themes->rowCount() > 0) {
    $row = $query_fetch_themes->fetch();
    echo '<form method="post">';
    echo '<div class="form-group">';
    echo '<label for="textarea">Create topic</label>';
    echo '<input name="topic_title" class="form-control" placeholder="Title" maxlength="28"> ';
    echo '<textarea name="topic_description" class="form-control" id="textarea" rows="2" maxlength="80" placeholder="Description"></textarea>';
    echo $content_error;
    echo '</div>';
    echo '<button name="create_topic" type="submit" class="md-button-raised-blue">CREATE TOPIC</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    $topic_title_taken_msg;
} else {
    echo '<br>';
}
?>




<?php
include('includes/footer.php');
?>