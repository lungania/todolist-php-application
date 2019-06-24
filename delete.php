<?php
if (isset($_GET['id']))
{
    $id=$_GET["id"];
    //extract($_GET);
    require 'DB.php';
    $sql="delete from tasks where task_id=$id";
    mysqli_query($conn,$sql) or die (mysqli_error($conn));
}
header("location:tasks.php");//redirect to show.php