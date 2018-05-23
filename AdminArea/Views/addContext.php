<?php require_once "../Controller/contextController.php";?>


<html>

<body >
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "adminNav.php"; ?>
    <!-- END mynav.php INCLUDE -->

</header>

<main class="section">
<div class="row" style="margin:75px; height=auto">
    <div class="card horizontal col s12">
        <h4 class="col s7 "> Upload the new Category information</h4>
 <form class="col s5 " name="infoUp" method="post" action="../Controller/contextController.php" >
            
                <div class="input-field ">
                    <b class="active">Text Title</b><br>
                    <input type="text" name="titleText" class="validate">
                </div>
                <br>
                <div class="input-field ">
                    <b for="inputMessage" >Content</b><br> 
                    <textarea class="form-control materialize-textarea" id="inputMessage" row="50" name="Content"></textarea>
                </div>
<br>
                <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Add
                    <i class="material-icons right">send</i>
                </button>
                <br>
 </form>
  </div>
</div>
        
 <?php 
 $read="SELECT * FROM `news`";
     $result=mysqli_query($GLOBALS['connection'],$read);
     $readtext=mysqli_fetch_array($result);
     foreach ($result as $readtext){
 ?>
 <div class="row" >
    <div class="card" style="margin-left: 75px" >
 <form class="col s5 " name="infoUp" method="post" action="../Controller/contextController.php" >
             <div class="input-field ">
                  <input type="hidden" name="TextID" class="validate" value="<?php echo $readtext['textID']; ?>">
                </div>
                <br>
                <div class="input-field ">
                    <b class="active" for="Cat">Text Title</b><br>
                    <input type="text" name="titleText" class="validate" value="<?php echo $readtext['textName']; ?>">
                </div>
                <br>
                   <div class="input-field  row="50">
                              <b for="inputMessage" >Content</b><br> 
                              <textarea class="form-control materialize-textarea" id="inputMessage" name="Content"><?php echo $readtext['content']; ?></textarea>
                           </div>
                <br>
          

                <br>
                <button class="btn waves-effect waves-light " type="edit" name="edit" value="Submit">Edit
                    <i class="material-icons right">send</i>
                </button>
                
                 <button class="btn waves-effect waves-light " type="delete" name="delete" value="delete">Delete
                    <i class="material-icons right">delete</i>
                </button>
                <br>
               
        </form>
    </div>
</div>
<?php }  ?>
</main>