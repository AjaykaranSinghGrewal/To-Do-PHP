<!DOCTYPE html>

<?php
    include 'db.php';

    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = '$id'";
    $rows = $db->query($sql);

    $row  = $rows->fetch_assoc();

    if(isset($_POST['send'])) {
        $task = htmlspecialchars($_POST['task']);
        $sql2 = "UPDATE tasks SET name = '$task' WHERE id = '$id'";
        $db->query($sql2);
        header('location:index.php');
    }
    
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>To-Do</title>

    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
<div id="container">
    <div id="row" style="margin-top:70px;">
        <center><h1>Update List</h1></center>
        
        <div class="col-md-10 col-md-offset-1">            
            
                <form method="post">
                    <div class="form-group">
                        <label>Task Name</label>
                        <input type="text" name="task" required class="form-control" value="<?php echo $row['name']; ?>">
                    </div>  
                    <input type="submit" name="send" value="Update" class="btn btn-success">&nbsp;
                    <a href="index.php" class="btn btn-warning">Back</a>
                </form> 
                
        </div>
    </div>
</div>

    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap.min.js"></script>
  </body>
</html>