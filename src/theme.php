<?php
include_once('includes/navbar.php');
include('app/themehandler.php');


?>



            <div class="container">
                        <?php
                        if ($fetch_title->rowCount() > 0) {
                            $rows = $fetch_title->fetchAll();
                            foreach ($rows as $row) {
                                $id = $row['id'];
                                $title = $row['title'];
                                echo "<h2 class=\"text-center\">$title</h2>";
                                echo '<h2 class=\"text-center\">'.$row['title'].'</h2>';
                            }
                        } else
                            echo "an error occured";
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
                        if ($fetch_topics->rowCount() > 0) {
                            $rows = $fetch_topics->fetchAll();
                            foreach ($rows as $row) {
                                $id = $row['id'];
                                echo '<td><a href="replies.php?id='.$id.'">'.$row['title'].'</td>';
                                echo '<td>'.$row['context'].'</td>';
                                echo '<td>'.$row['created_at'].'</td>';
                                echo '<td>'.$row['username'].'</td>';
                                echo '</tr>';
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>




<?php
include('includes/footer.php');
?>