<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RPG Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="http://localhost/webRPG/CSS/index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<header>
    <!-- Navbar -->
    <div class="navbar fixed-top navbar-expand-lg navbar-dark" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="http://localhost/webRPG/index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link"
            <?php
            if (isset($_SESSION['userId'])) {
                echo ' href="http://localhost/webRPG/Account/index.php"';}
                else {echo ' href="#"';}
                ?>
            >Account</a></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/webRPG/Settings/index.php">Settings</a></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/webRPG/About/index.php">About</a></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/webRPG/Help/index.php">Help</a></li>
        </ul>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn my-2 my-sm-0 btn-dark" type="submit">Search</button>
        </form>
        <?php
            if (isset($_SESSION['userId'])) {
                echo '<form action="includes/logout.php" method="GET"><button type="submit" name="logoutBtn" class="btn btn-outline-warning m-3">Log Out</button></form>';
            ;}
    
            if (isset($_GET['signup'])) {
                if ($_GET['signup'] == "success") {
            echo '<div class="alert alert-success p-4 fixed-top" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                You have signed up sucessfully!
            </div>';}}
        ?>
    </div>
</header>