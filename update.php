<?php
//get the id
//retrieve the movie
//display details
//update the movie



if (isset($_GET["id"]))
{
    $id=$_GET["id"];
    require 'DB.php';
    $sql="select * from tasks where task_id= $id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    extract($row);
}
if (isset($_POST["task_name"]))
{
    $task_name=$_REQUEST["task_name"];
    $date_todo=$_REQUEST["date_todo"];
    $status=$_REQUEST["status"];
    $id=$_REQUEST["id"];
    require 'DB.php';
    $sql= "UPDATE tasks SET task_name='$task_name',date_todo='$date_todo',status='$status'  WHERE task_id= $id";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    header("location:tasks.php");

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update task</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
require_once 'navbar.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Updating task <?php echo $task_id; ?>
                </div>

                    <form action="update.php" method="post">

                        <input type="hidden" name="id" value="<?=$task_id?>">
                        <div class="form-group">
                            <label for="task_name">task_name</label>
                            <input  value="<?=$task_name?>" type="text"  class="form-control" name="task_name" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input  value="<?=$date_todo?>" type="datetime-local" class="form-control" name="date_todo" required>
                        </div>
                        <div class="form-group">
                        <label for="date">status</label>
                        <select name="status" class="form-control" required>
                            <option>incomplete</option>
                            <option>complete</option>
                        </select>
                        </div>
                        <button class="btn btn-info btn-block">update task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>