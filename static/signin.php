<!DOCTYPE html>
<html>
<head>
  <title>SignIn</title>
</head>
<body>
<center>
  <form method="post">
    <table>
      <th><td colspan="2">SignIn Here</td></th>
     <tr><td>Email:</td>
      <td><input name="umail" type="email" required placeholder="Enter your emailId"></td></tr>
    <tr>
      <td>Password:</td>
      <td><input name="upwd" type="Password" required  placeholder="Enter your Password"></td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="btnsignin" value="SignIn"></center></td>
    </tr>
</table>
  </form>
  <p>Haven't registered?<a href="signup.php">click here to SignUp</a></p>
</center>
<?php
if (isset($_POST['btnsignin']))
{
  $uname=$_POST['umail'];
  $upwd=$_POST['upwd'];
  include("connect.php");
  $sql="select * from tblusers where umail='".$uname."' and upass='".$upwd."'";
  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0)
  {
    $row=mysqli_fetch_array($res);
    $uid=$row['uid'];
       session_start();
    $_SESSION['uid']=$uid;
    $_SESSION['uname']=$row['ufname'];
    header("Location:contest.php");
  }
  else
  {
    echo "Invalid id/password";
  }
}
?>
</body>
</html>
