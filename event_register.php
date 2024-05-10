<?php      
   $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sign up";
    $f=$_POST["name"];
    $r=$_POST["rollno"];
    $b=$_POST["branch"];
    $y=$_POST["year"];
    $p=$_POST["phone"];
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
      die("Failed to connect with MySQL: ". mysqli_connect_error());  
          }  
         else
           {
            $sql = "INSERT INTO `register`(`rollno`, `name`, `branch`, `year`, `phone`) VALUES ('$r','$f','$b','$y','$p')";
            if(mysqli_query($con,$sql)){
               echo "<h1>successfully registered<h1>";
            }
            else{
               echo "error".mysqli_error($con);
            }
           }
?>