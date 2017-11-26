<?php
session_start();
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pass']) &&
    !empty($_POST['blood_group'])&& !empty($_POST['contact'])&&!empty($_POST['address'])
    &&!empty($_POST['date'])) {
    include 'connection.php';
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=sha1($_POST['pass']);
    $group=$_POST['blood_group'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $date=$_POST['date'];
    $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `blood_group`,
 `contact`, `address`, `last_donate_date`) VALUES (NULL, '$name', '$email', '$pass',
  '$group', '$contact', '$address', '$date');";
    $result=mysqli_query($con,$sql);
    if ($result) {
        $result=mysqli_query($con,"SELECT * FROM blood_group WHERE id='".$group."';");
        $row=mysqli_fetch_assoc($result);
        $num=$row['total_donor']+1;
        mysqli_query($con,"UPDATE `blood_group` SET `total_donor`='".$num."' WHERE id='".$group."';");
        header('Location: ../index.php?toast=t&status=Successfully Registered!');
    }else{
        header('Location: ../index.php?toast=t&status=Registration Failed!Try Again!');
    }
}
else{
    header('Location: ../index.php?toast=t&status=Missing Information!');
//    echo $name.$email.$pass.$group.$address.$date;
}
?>