<?php
include_once('includes/navbar.php');
include('app/indexhandler.php');

?>


<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="left col-xs-10 col-sm-6 col-md-4">-->
<!--            left-->
<!--        </div>-->




<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3>Welcome to my forum!</h3></div>
        <div class="panel-body">
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
                    <div class="container">
                        <div class="row">
                            <?php
                            if ($fetch_themes->rowCount() > 0) {
                                $rows = $fetch_themes->fetchAll();
                                foreach ($rows as $row) {
                                    $id = $row['id'];
                                    echo '<td class="col-xs-4 col-sm-6 col-md-2"><a href="theme.php?id='.$id.'">'.$row['title'].'</td>';
                                    echo '<td class="col-xs-8 col-sm-6 col-md-6">'.$row['description'].'</td>';
                                    echo '<td class="col-xs-6 col-sm-6 col-md-2">'.$row['created_at'].'</td>';
                                    echo '<td class="col-xs-6 col-sm-6 col-md-2">'.$row['author'].'</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php
include('includes/footer.php');
?>

