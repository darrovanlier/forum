<?php
include_once('includes/navbar.php');
include('app/themehandler.php');


?>

            <div class="container">
                <h2 class="text-center">Topics</h2>
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created by</th>
                        <th>Replies</th>
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
                                echo '<td>'.$row['user_id'].' '.$row['created_at'].' </td>';
                                echo '<td>Replies count</td>';
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