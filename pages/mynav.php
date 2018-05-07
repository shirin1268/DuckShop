
<?php
require("../DB/Connection.php");
require("../DB/session.php");

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../materialize/css/materialize.css" >
    <link rel="stylesheet" href="../materialize/css/materialize.min.css" >
</head>
        <?php if (logged_in()== true){ echo " Wellcome ". $_SESSION['FullName']; }
        ?>
    <nav class="row teal darken-4">

            <div class="btn right">
                <a href="Order.php" >Shopping_cart
                    <?php
                    if (!empty($_SESSION["cart_item"])){
                          echo  count($_SESSION["cart_item"]);

                    }else{
                        echo "  No item!";
                    } ?>
                </a>
            </div>

        <ul id="nav-mobile" class=" hide-on-med-and-down">


            <li><a href="#"><i class="material-icons">person </i></a>
                <ul >
                    <?php if (logged_in()== true){
                        echo '<li><a href="ProfileView.php">My account</li>';
                    }else '<li><a href="CreatNewUser.php">Create account</li>';
                        ?>
                    <li><a href="#">My orders</a></li>
                    <li><?php if (logged_in()== true){ ?>
                            <a href="../Login/logout.php" >logout</a>
                        <?php }else{ ?>
                            <a href="../pages/loginView.php" >login</a>
                        <?php } ?>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="material-icons">favorite </i></a></li>
            <li><a href="../pages/home.php">Home</a></li>
            <li><a href="../pages/about.php">About us</a></li>
            <li><a href="../pages/catalogue.php">Catalogue</a></li>
            <li><a href="../pages/contact.php">Contact</a></li>
            <li><a href="../"><i class="material-icons left">search</i></a></li>

        </ul>
    </nav>
</div>

<!--
<div class="input-field">
    <input id="search" type="search" required>
    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
    <i class="material-icons">clear</i>
</div>
-->