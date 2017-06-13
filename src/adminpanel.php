<?php
include_once('includes/navbar.php');
include_once('app/adminpanelhandler.php');
if(isset($_SESSION['username'])) {
} elseif ($_SESSION['admin'] == true) {
    header('Location: index.php');
    exit(0);
}
?>

            <h1 class="text-center">adminpanel</h1>
<?= $delete_user_msg ?>
<?= $admin_user_msg ?>
<?= $remove_admin_user_msg ?>

    <div class="container">
        <div class="row">
            <div class="left col-xs-10 col-sm-6 col-md-4">
                left
            </div>

            <div class="middle col-xs-10 col-sm-6 col-md-4">
                mid
            </div>

            <div class="right col-xs-10 col-sm-6 col-md-4">
                rechts
            </div>
        </div>
    </div>


<?php
if ($fetch_all_users->rowCount() > 0) {
    $rows = $fetch_all_users->fetchAll();
    foreach ($rows as $row) {
        $id = $row['id'];
        $username = $row['username'];
        echo '
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-sm-6 col-md-4 text-center ">
                <p><b>'.$row['username'].'</b> <small>'.$row['email'].' <b>Admin: 
                    ';
        if ($row['admin'] == true) {
            echo 'Yes';
        } else {
            echo 'No';
        }
        echo '</b></small></p>';

        if(isset($_SESSION['username'])) {
                echo '<form method="post">';
                echo "<input value='$id' name='adminpanel_user_id' style='display: none'>";
                echo "<input value='$username' name='adminpanel_user_name' style='display: none'>";
                echo '<button name="delete_user" type="submit" class="md-button-raised-red">DELETE</button>';


            if ($row['admin'] == true) {
                echo '<button name="remove_admin_user" type="submit" class="md-button-raised-dark-blue">REMOVE ADMIN</button>';
            } else {
                echo '<button name="admin_user" type="submit" class="md-button-raised-blue">MAKE ADMIN</button>';
            }
        }
        echo ' </form>
            </div>
        </div>
    </div>
    ';} }
?>


<?php
include('includes/footer.php');
?>