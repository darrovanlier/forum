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
<?= $check_theme_title_taken ?>
<?= $empty_field_theme_error ?>


<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="left col-xs-10 col-sm-6 col-md-4">-->
<!--            left-->
<!--        </div>-->
<!---->
<!--        <div class="middle col-xs-10 col-sm-6 col-md-4">-->
<!--            mid-->
<!--        </div>-->
<!---->
<!--        <div class="right col-xs-10 col-sm-6 col-md-4">-->
<!--            rechts-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="container">
    <div class="row">
        <div class="col-xs-10 col-sm-6 col-md-4 text-center">
        <h4><b>User overview</b></h4>
<?php
if ($fetch_all_users->rowCount() > 0) {
    $rows = $fetch_all_users->fetchAll();
    foreach ($rows as $row) {
        $id = $row['id'];
        $username = $row['username'];

        echo '<p><b>'.$row['username'].'</b> <small>'.$row['email'].' - <b>Admin:</b> 
        ';
        if ($row['admin'] == true) {
            echo 'Yes';
        } else {
            echo 'No';
        }
        echo '</small></p>';

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
    ';} }
?>
</div>

<div class="col-xs-10 col-sm-6 col-md-4 text-center">
    <h4><b>Make new theme</b></h4>
<?php
if(isset($_SESSION['username'])) {
    echo '<form method="post">';
    echo '<input name="new_theme_title" class="form-control" placeholder="Title" maxlength="20" style="margin-bottom: 10px">';
    echo '<input name="new_theme_description" class="form-control" placeholder="Description" maxlength="35" style="margin-bottom: 10px">';
    echo '<button name="make_new_theme" type="submit" class="md-button-raised-blue">Make New theme</button>';
    echo '</form>';
}



?>
</div>


<?php
include('includes/footer.php');
?>