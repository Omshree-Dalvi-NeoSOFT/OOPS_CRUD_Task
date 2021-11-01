<!-- Edit Details Page -->

<?php
error_reporting(0);
include("todo_class.php");  // include class files
$obj=new Employee;
$id=$_GET['edit'];
$arr=$obj->display($id);    // fetch user details

include("cap.php"); // captcha file

if(isset($_POST['submit'])){
    $temp=$_FILES['filename']['tmp_name'];//read tmp name
    $fn=$_FILES['filename']['name'];//orginal name
    if(!empty($_POST['uname']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['city']) && !empty($_POST['captcha'])){
        // update function
        $error=$obj->update($id,$_POST['uname'],$_POST['email'],$_POST['name'],$_POST['age'],$_POST['city'],$temp,$fn);
    }
    else{
        $error= " Empty Fileds !! ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- include head links -->
    <?php include("head.php");?>
</head>
<body class="d-flex h-100 text-white bg-dark p-1">
    <header class="mb-auto">
        <div class="text-center">
            <h3>Add Employee's Details</h3>
            <a class="btn btn-lg btn-secondary fw-bold border-white bg-white" href="details.php">View Employee </a>
            <h2 class="mt-3"><?php echo $error;?></h2>
        </div>
    </header>
    <section class="container mr-3">
        <!-- form with values for employee -->
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>User Name :</label>
                <input type="text" class="form-control" name="uname" value="<?= $arr['uname']?>"/>
            </div>  
            <div class="form-group">
                <label>Email :</label>
                <input type="email" class="form-control" name="email" value="<?= $arr['email']?>"/>
            </div> 
            <div class="form-group">
                <label>Name :</label>
                <input type="text" class="form-control" name="name" value="<?= $arr['name']?>"/>
            </div> 
            <div class="form-group">
                <label>Age :</label>
                <input type="text" class="form-control" name="age" value="<?= $arr['age']?>"/>
            </div> 
            <div class="form-group">
                <label>City :</label>
                <input type="text" class="form-control" name="city" value="<?= $arr['city']?>"/>
            </div> 
            <div class="form-group">
                <label>Profile Image :</label>
                <input type="file" class="form-control" name="filename" value="<?= $arr['image']?>"/>
            </div>
            <div class="form-group">
                <label>Captcha : <b><?php echo $val;?></b></label>
                <input type="text" class="form-control" name="captcha" />
                <input type="hidden" class="form-control" name="captchasum"  value="<?php echo $capsum;?>" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="Add Employee"/>
                <input type="reset" class="btn btn-danger" value="Clear Form"/>
            </div>
        </form>
    </section>
    <!-- include script links -->
    <?php include("foot.php");?>
</body>
</html>