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
<p><b>yo hashed password boi: </b>'.$row['password'].'</p>
';
}
?>
<br>






<div class="container">
    <div class="row">

        <!-- new username -->
        <div class="left col-xs-10 col-sm-6 col-md-4">
            <form class="profilepage" method="post" id="profilepage">
                <h2 class="profilepage-header"></h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="new_username" placeholder="Enter New Username" required>
                </div>
                <? $empty_username_message ?>
                <? $new_username_used ?>
                <div class="form-group text-center">
                    <button type="submit" name="update_username" class="btn btn-default">
                        Update Username!
                    </button>
                <? $username_change_message ?>
                </div>
            </form>
        </div>

        <!-- new email -->
        <div class="middle col-xs-10 col-sm-6 col-md-4">
            <form class="profilepage" method="post" id="profilepage">
                <h2 class="profilepage-header"></h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Enter New E-Mail" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="update_email" class="btn btn-default">
                        Update Email!
                    </button>
                </div>
            </form>
        </div>

        <!-- new password -->
        <div class="right col-xs-10 col-sm-6 col-md-4">
            <form class="profilepage" method="post" id="profilepage">
                <h2 class="profilepage-header"></h2>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Enter New Password" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="update_password" class="btn btn-default">
                        Update Password!
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>




<?php
include('includes/footer.php');
?>