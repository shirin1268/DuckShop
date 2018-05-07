<?php require_once "../Controller/infoupload.php";?>
<?php require_once "../Controller/CompanyInfoDAO.php";?>

<html>

<body class="container">
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "adminNav.php"; ?>
    <!-- END mynav.php INCLUDE -->

</header>
<div class="row" >
    <div class="card horizontal col s12">
        <h4 class="col s7 "> Upload the new Category information</h4>

        <form class="col s5 " name="infoUp" method="post" action="../Controller/infoupload.php" >
            <div >

                <div class="input-field ">
                    <b class="active" for="Cat">Category Name</b>
                    <input placeholder="Category Name" type="text" name="categoryname" class="validate">
                </div>
                <br>
                <div class="input-field ">
                    <b class="active" for="descrip">Description</b>
                    <input placeholder="Category description" type="text" name="descrip" class="validate">
                </div>

                <br>
                <button class="btn waves-effect waves-light " type="submit" name="submit" value="Submit">Submit
                    <i class="material-icons right">send</i>
                </button>
                <br>
        </form>
    </div>
</div>
