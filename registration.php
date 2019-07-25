<?php
if(isset($_GET['id']))
{
       $link= mysqli_connect("localhost","root","REDHAT","employee");
        mysqli_query($link,"select * from emp_info where emp_email='$_GET[id]'");
        if(mysqli_affected_rows($link)>0)
        {
            echo "Email-Id Already Exist";
        }
        mysqli_close($link);
}
if(isset($_GET['id1']))
{
        $link= mysqli_connect("localhost","root","REDHAT","employee");
        mysqli_query($link,"select * from emp_info where emp_username='$_GET[id1]'");
        if(mysqli_affected_rows($link)>0)
        {
            echo "Username Already Exist";
        }
        mysqli_close($link);
}
?>

