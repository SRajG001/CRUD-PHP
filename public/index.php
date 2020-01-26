<?php 
    require 'connection.php';
    $fetchData = new DB_conn();
    $result = $fetchData->fetchdata();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form id="formSubmit" action="service.php   " method="POST">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="task" placeholder="Add text here...">
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="alert alert-success" role="alert" style="display: none;">
                    This is a success alert with <a href="#" class="alert-link">an example link</a>. Give it a click
                    if
                    you like.
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Activities</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=mysqli_fetch_array($result)) {?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['task']; ?></td>
                            <td><button type="button" id="edit" class="btn btn-warning mr-3">Edit</button><button type="button" id="delete" class="btn btn-danger" data-id="<?php echo $row['id']?>">Delete</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
</body>

</html>