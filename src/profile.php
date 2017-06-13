<?php
include_once('includes/navbar.php');
include_once('app/profilehandler.php');

if(isset($_SESSION['username'])) {
} else {
    header('Location: index.php');
    exit(0);
}
?>


<?php
if ($fetch_users->rowCount() > 0) {
    $row = $fetch_users->fetch();
    echo '                       
<p class="text-center"><b>Current registered username: </b>'.$row['username'].'</p>                              
<p class="text-center"><b>Current registered email: </b>'.$row['email'].'</p>
';
}
?>
<br>






<div class="container">
    <div class="row">

        <!-- new email -->
        <div class="col-xs-10 col-sm-6 col-md-6">
            <form class="profilepage" method="post" id="profilepage">
                <h3 class="profilepage-header text-center">Change email</h3>
                <div class="form-group">
                    <input type="email" class="form-control" name="new_email" placeholder="Enter New E-Mail">
                </div>
                <?=$empty_email_message ?>
                <?=$new_email_used ?>
                <div class="form-group text-center">
                    <button type="submit" name="update_email" class="btn btn-default">
                        Change Email!
                    </button>
                <?=$email_change_message ?>
                </div>
            </form>
        </div>

        <!-- new password -->
        <div class="col-xs-10 col-sm-6 col-md-6">
            <form class="profilepage" method="post" id="profilepage">
                <h3 class="profilepage-header text-center">Change password</h3>
                <div class="form-group">
                    <input type="password" class="form-control" name="new_password" placeholder="Enter New Password">
                </div>
                <?=$empty_password_message ?>
                <div class="form-group text-center">
                    <button type="submit" name="update_password" class="btn btn-default">
                        Change Password!
                    </button>
                    <?=$password_change_message ?>
                </div>
            </form>
        </div>

    </div>
</div>






<?php
include('includes/footer.php');
?>