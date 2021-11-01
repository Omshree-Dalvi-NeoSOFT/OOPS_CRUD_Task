<!-- Display Employee details -->

<?php 
include("todo_class.php");  // include OOPS class file
$sn=1;  // Iterating veriable
$obj=new Employee;
$array=$obj->show();    // display details function
if(!empty($_GET['del'])){
    $id=$_GET['del'];
    $obj->del($id);
    header("location:details.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php");?>
    <style>
        
    </style>
</head>
<body class=" h-100 text-white bg-dark p-1">
    <h3 class="mt-4" align="center">Employee Details</h3>
    <center><a class="btn btn-lg btn-secondary fw-bold border-white bg-white mt-4" href="addemp.php">Add Employee </a>&nbsp;<a class="btn btn-lg btn-secondary fw-bold border-white bg-white mt-4" href="index.php">Home</a></center>
    <section class="container mt-4">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">City</th>
                <th scope="col">Profile</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <?php 
            // display all records.
            foreach($array as $arr){
            ?>
            <tbody>
                <tr>
                <th scope="row"><?php echo $sn;?></th>
                <td><?php echo $arr['uname'];?></td>
                <td><?php echo $arr['email'];?></td>
                <td><?php echo $arr['name'];?></td>
                <td><?php echo $arr['age'];?></td>
                <td><?php echo $arr['city'];?></td>
                <td><img src="images/<?php echo $arr['image'];?>" height="100px" width="80px" class="card-img-top" alt="Profile Photo"></td>
                <td><a href="edit.php?edit=<?php echo $arr['id'];?>" role="button" class="btn btn-primary">Edit</a> | <a href="?del=<?php echo $arr['id'];?>" role="button" class="btn btn-danger">Delete</a>
				</td>
                </tr>
            </tbody>
            <?php
            $sn+=1;
            }
            ?>
        </table>
    </section>
    <!-- include script links -->
    <?php include("foot.php");?>
</body>
</html>