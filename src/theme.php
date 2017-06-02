<?php
include_once('includes/navbar.php');
include('app/themehandler.php');


?>



            <div class="container">
                        <h2 class="text-center"> Topics for this theme</h2>
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
                        }
                        ?>

                    </tbody>
                </table>
            </div>




<?php
include('includes/footer.php');
?>