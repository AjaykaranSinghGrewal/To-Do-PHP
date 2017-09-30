<!DOCTYPE html>

<?php
    include 'db.php';


    $sql = "SELECT * FROM tasks";
    $rows = $db->query($sql);
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
        <center><h1>To Do List</h1></center>
        
        <div class="col-md-10 col-md-offset-1">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Task</button>
            <button type="button" class="btn btn-success pull-right" onclick="print();">Print</button>
            
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Task</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="add.php">
                        <div class="form-group">
                            <label>Task Name</label>
                            <input type="text" name="task" required class="form-control">
                        </div>  
                        <input type="submit" name="send" value="Add" class="btn btn-success">
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
                
            <hr><br/>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Task</th>
                </tr>
              </thead>
              <tbody>
                
                <?php while ($row = $rows->fetch_assoc()) { ?>
                  <tr>
                  <th><?php echo $row['id'] ?></th>
                  <td class="col-md-10"><?php echo $row['name'] ?></td>
                  <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                  <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                <?php } ?>
                
              </tbody>
            </table> 
        </div>
    </div>
</div>

    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap.min.js"></script>
  </body>
</html>