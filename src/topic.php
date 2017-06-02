<?php
include_once('includes/navbar.php');
include('app/topichandler.php');


?>



<div class="container">




<br> <br>
                <h2 class="text-center">Replies</h2>
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Created by</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        if ($fetch_replies->rowCount() > 0) {
                            $rows = $fetch_replies->fetchAll();
                            foreach ($rows as $row) {
                                $id = $row['id'];
                                echo '<td>'.$row['context'].'</td>';
                                echo '<td class="col-md-2">'.$row['created_at'].' </td>';
                                echo '<td class="col-md-2">'.$row['username'].'</td>';
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