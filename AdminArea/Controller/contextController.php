<?php
require "../../DB/Connection.php";

$conn=$GLOBALS['connection'];

    
if (isset($_POST['submit'])){
    $textTitle=mysqli_real_escape_string($conn,$_POST['titleText']);
    $content=mysqli_real_escape_string($conn,$_POST['Content']);
   
    $text= $conn->prepare("INSERT INTO `news`(`textName`,`content`) VALUES (?,?)");
    $text->bind_param('ss',$textTitle,$content);
    $text->execute();
    $newsText=$text->get_result();
   
   
    echo "Your text is added";
 header("refresh:2; url=../Views/addContext.php"); } 

if(isset($_POST['edit'])){
     $textTitle=mysqli_real_escape_string($conn,$_POST['titleText']);
    $content=mysqli_real_escape_string($conn,$_POST['Content']);
    
    $texedit=$conn->prepare("UPDATE `news` SET `textName`=?,`content`=? WHERE `textID`='".$_POST['TextID']."' ");
     $texedit->bind_param('ss',$textTitle,$content);
    $texedit->execute();
    $edittext=$texedit->get_result();

    echo "your text is edited";
     header("refresh:2; url=../Views/addContext.php");
}

if(isset($_POST['delete'])){
    $texdel=$conn->prepare("DELETE  FROM `news` WHERE `textID`='".$_POST['TextID']."' ");
    $texdel->execute();
    $deletetext=$texdel->get_result();

    echo "your text is deleted";
     header("refresh:2; url=../Views/addContext.php");
}
 



