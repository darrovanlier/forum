<?php
include_once('includes/navbar.php');

if(isset($_SESSION['username'])) {
} else {
    header('Location: index.php');
    exit(0);
}
?>


        <h2 class="text-center"> Profile page / Profile information</h2>
        <hr />
        <h4 class=""> Current registered username: <?= $_SESSION['username'] ?></h4>
        <h4 class=""> Current registered username: <?= $_SESSION['username'] ?></h4>





<?php
include('includes/footer.php');
?>