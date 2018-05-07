<?php
// get CompanyName Adress and set into the footer
$companyInfo= mysqli_query($GLOBALS['connection'],"SELECT * FROM companyinformation");
$row=mysqli_fetch_array($companyInfo);

?>

<div class="row">
    <div class="col s12">
        <div class="col s4">
            <h5 class="white-text">
                <?php echo $row["CompanyName"] ; ?>
            </h5>

            <p ><i class="material-icons" style="color:white; font-size:20px; margin: 5px">place</i><?php echo  $row["CompanyAdress"]; ?>  </p>
            <p ><i class="material-icons" style="color:white; font-size:20px; margin: 5px">email</i><?php echo  $row["CompanyEmail"]; ?>  </p>
            <p ><i class="material-icons" style="color:white; font-size:20px; margin: 5px">phone</i><?php echo  $row["CompanyTel"]; ?>  </p>

        </div>

        <div class="col s4 center" style="height:50px; margin-top: 100px">
            <a href="#"> <i class="fa fa-facebook" style="color:white; font-size:20px; margin: 25px"> </i></a>
            <a href="#"> <i class="fa fa-instagram" style="color:white; font-size:20px; margin: 25px"></i></a>
            <a href="#"> <i class="fa fa-google-plus" style="color:white; font-size:20px; margin: 25px"></i></a>
        </div>

        <div class="col s4">
            <p > <?php echo  $row["CompanyDescription"]; ?>  </p>
            <p style="font-size: 8px">  © 2018 Copyright</p>
        </div>



    </div>
</div>

