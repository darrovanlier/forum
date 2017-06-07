<?php
include_once('includes/navbar.php');
include('app/themehandler.php');


?>



            <div class="container">
                <?php
                    if ($query_fetch_themes->rowCount() > 0) {
                        $row = $query_fetch_themes->fetch();
                        echo '<h2 class="text-center">'.$row['title'].'</h2>';
                        echo '<h6 class="text-center text-muted">'.$row['description'].'</h6>';
                        }
                ?>
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Created by</th>
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
                            echo "<div class=\"text-center\"><h4>This theme does not exist!</h4><a href=\"index.php\">Return</a></div></div>";
                        ?>

                    </tbody>
                </table>
            </div>




<?php
include('includes/footer.php');
?>