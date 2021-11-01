<!-- OOPS Impl. Class Employee -->

<?php

class Employee{
    private $conn;
    
    function __construct()      // connection
    {
        $this->conn=mysqli_connect("localhost","root","","oops") or die("Connection Error");
    }

    function add($uname,$email,$name,$age,$city,$temp,$fn)     // add details
    {
        if(preg_match("/^[a-zA-Z0-9\-\_]+$/",$uname)){
            if(preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i",$email)){
                $ext=pathinfo($fn,PATHINFO_EXTENSION);
                $fname="$uname.$ext";
                if(mysqli_query($this->conn,"INSERT INTO employee(uname,email,name,age,city,image) VALUES('$uname','$email','$name',$age,'$city','$fname');")){
                    if(move_uploaded_file($temp,"images/$fname")){
                        header('Refresh:2;URL=details.php');
                        return "Employee Added ...";
                    }
                }
                else{
                    return "User Present";
                }
            }
            else{
                return "Invalid Email Id ..";
            }
        }
        else{
            return "Invalid User Name ..";
        }
    }

    function update($id,$uname,$email,$name,$age,$city,$temp,$fn)     // update details
    {
        if(preg_match("/^[a-zA-Z0-9\-\_]+$/",$uname)){
            if(preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i",$email)){
                $ext=pathinfo($fn,PATHINFO_EXTENSION);
                $fname=rand().".$ext";
                if(mysqli_query($this->conn,"UPDATE employee SET uname='$uname',email='$email',name='$name',age=$age,city='$city',image='$fname' WHERE id=$id;")){
                    if(move_uploaded_file($temp,"images/$fname")){
                        header('Refresh:2;URL=details.php');
                        return "Employee Updated ...";
                    }
                }
                else{
                    return "Fail to update";
                }
            }
            else{
                return "Invalid Email Id ..";
            }
        }
        else{
            return "Invalid User Name ..";
        }
    }

    function show(){    // show all details from table 
        $query=mysqli_query($this->conn,"SELECT * FROM employee;");
        return $query;
    }
    function del($id){  // delete detail
        return mysqli_query($this->conn,"DELETE FROM employee WHERE id=$id;");
    }

    function display($id){  // fetch employee data
        $dis=mysqli_query($this->conn,"SELECT * FROM employee WHERE id=$id;");
        $result=mysqli_fetch_assoc($dis);
        return $result;
    }

    function __destruct()       // close connection
    {
        mysqli_close($this->conn);
    }
}

?>