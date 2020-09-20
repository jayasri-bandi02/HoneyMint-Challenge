<!DOCTYPE html>
<html>
<head>
  <title>Create new account</title>
</head>
<body>
<center>
  <form method="post">
    <table>
      <tr><td colspan="2"><center>SignUp Here</center></td></tr>
     <tr>
      <td>Email:</td>
      <td><input name="uemail" type="email" required placeholder="Enter your emailId"></td>
    </tr>
      <tr>
        <td>Enter first name:</td>
      <td><input name="fn" type="text" required ></td>
    </tr>
    <tr>
        <td>Enter last name:</td>
      <td><input name="ln" type="text" required ></td>
    </tr>
    <tr>
      <td>Create Password:</td>
      <td><input name="pwd" id="pwd" type="password" required placeholder="Set a Password"></td>
    </tr>
    <tr>
      <td>Retype Password:</td>
      <td><input name="rpwd" id="rpwd" type="password" required 
        placeholder="Retype your password"></td>
    </tr>
    <tr>
      <td>Phone number:</td>
      <td><input type="tel" id="phn" name="phn"
       pattern="[6-9]{1}[0-9]{9}"       required>
        </td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="btnsignup" value="SignUp"></center></td>
    </tr>
</table>
<p>Already registered?<a href="signin.php">click here to SignIn</a></p>
  </form>
  <?php
  if($_SERVER['REQUEST_METHOD']=='POST')
if (isset($_POST['btnsignup']))
{
  $email=$_POST['uemail'];
  $fname=$_POST['fn'];
  $lname=$_POST['ln'];
  $pwd=$_POST['pwd'];
  $rpwd=$_POST['rpwd'];
  $phn=$_POST['phn'];
  if(strlen($pwd)>=8)
  {
      if($pwd==$rpwd)
      {
        include("connect.php");
        $ch="select * from tblusers where umail='".$email."' or phn='".$phn."'";
        if($res=mysqli_query($con,$ch))
          if(mysqli_num_rows($res))
            echo "Email/Phone already registered";
          else
          {
            $res=mysqli_query($con,"select * from tblusers");
            $ct=mysqli_num_rows($res);
            if($ct>0)
            {
              $st=strval($ct+1);
      
              $uid=str_pad($st,4,"0",STR_PAD_LEFT);
               $uid='U'.$uid;
              
            }
            else
            {
              $uid='U0001';
            }
            $sql="insert into tblusers values('".$uid."','".$email."','".$fname."','".$lname."','".$pwd."','".$phn."')";
            if(mysqli_query($con,$sql))
            {
              header('Location:success.php');

            }
            else
            {
              echo "Error".mysqli_error($con);
            }
          }
      }
    else
    {
      echo "Retype the same password you wish to set!";
    }
  }
  else
    echo"Password must be atleast 8 characters long!";
}
?>
</center>
</body>
</html>
