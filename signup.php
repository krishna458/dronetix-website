<?php
$msg="";
    if(isset($_GET['reg']))
    {
     $link= mysqli_connect("localhost","root","REDHAT","employee");

        $qry="insert into emp_info values($_GET[txt_id],'$_GET[txt_name]','$_GET[txt_uname]','$_GET[txt_pwd]','$_GET[txt_email]',$_GET[txt_no])";

        mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)>0)
        {
            $msg="<font color='green' size='4px'><br><br><br> Registeration Successfull !</font>";
           
        }
        else
        {
            $msg="<font color='red' size='5px'>Sign up failed ! </font>";
        }
        mysqli_close($link);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            temp=0;
            temp1=0;
            function CheckEmail()
            {
                temp=0;
                email=document.getElementById('email').value;
                ht=new XMLHttpRequest();
                ht.open("get","registration.php?id="+email,true);
                ht.send();
                ht.onreadystatechange=function() {
                    if(ht.readyState==4 && ht.status==200)
                    {
                        document.getElementById("d1").innerHTML=ht.responseText;
                         if(ht.responseText=="Email-Id Already Exist")
                        temp=1;
                        
                    }
                }
             
            }
            function CheckUsername()
            {
                temp1=0;
                uname=document.getElementById('uname').value;

                ht1=new XMLHttpRequest();
                ht1.open("get","registration.php?id1="+uname,true);
                ht1.send();
                ht1.onreadystatechange=function() {
                    if(ht1.readyState==4 && ht1.status==200)
                    {
                        document.getElementById("d2").innerHTML=ht1.responseText;
                        if(document.getElementById("d2").innerHTML=="Username Already Exist")
                        {temp1=1; }
                        
                    }
                }

            }
            function validate()
            {
                if(temp==1)
               return false;
           if(temp1==1)
               return false;
           else 
               return true;
            }
        </script>
        <style>
            .mystyle{
                border-radius: 10px;
                padding-left: 5px;
                height: 25px;
                width:200px;
                font-size: 15px;
            }
            .style1{
                width:120px;
                height: 30px;
                border-radius: 10px;
                padding-left: 5px;
                font-family: Time In Roman;
                font-size: 20px;
            }
            label{
                font-family: Time In Roman;
                font-size: 20px;
                color: #ffffff;
            }
qq{
         color:#ffffff;
         font-size:20px;
         line-height:40px;
       }
opp{

      color:#ffffff;
      font-size:5px;
      margin-left:16px;
}
            body{
              background-image: url("mavic-pro.jpg");
            background-size:1080px 720px;
            }
        </style>
<link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
       
        <h2 style="font-size: 30px; color:#ffffff; font-family: arial; text-align: center"><br>Create An Account<br></h2>
     
        <div><form method="get" onsubmit="return validate()">
                <table width="50%">
                <tr>
                   <p> <td><label>Trix ID</label></td>
                    <td><input class="mystyle" type="text" name="txt_id" value="" required="" /></td>
                </p></tr>
                <tr>
                   <p> <td><label> Name</label></td>
                    <td><input class="mystyle" type="text" name="txt_name" value="" required="" /></td>
                </p></tr>
                <tr>
                   <p> <td><label>Username</label></td>
                    <td><input class="mystyle" id="uname" type="text" name="txt_uname" value="" onchange="CheckUsername()" required="" /><br><div id="d2" style="color:red"></div></td>
               </p> </tr>
                <tr>
                   <p> <td><label>Password</label></td>
                    <td><input class="mystyle" type="password" name="txt_pwd" value="" required="" /></td>
                </p></tr>
                <tr>
                    <p><td><label>Email ID</label></td>
                    <td><input class="mystyle" id="email" type="email" name="txt_email" onchange="CheckEmail()" value="" required="" /><br><div id="d1" style="color:red"></div></td>
                </p></tr>
                <tr>
                    <p><td><label>Phone Number</label></td>
                    <td><input class="mystyle" type="text" name="txt_no" value="" required="" /></td>
               </p> </tr>
                <tr>
                    <td></td>
                    <td><input class="style1" type="submit"  value="Register" name="reg"/></td>
                </tr>
                  <tr>
                      <td colspan="2"><?php echo $msg; ?></td>
                </tr>
            </table>
            </form></div>

<div>

<br><br><br><br><br><br><a href="index.html" class="button"><op>Homepage</op></a>
    </body>
</html>

