
<?php
session_start();
if (!empty($_POST['name'])  &&
    !empty($_POST['blood_group'])&& !empty($_POST['contact'])) {
    include 'connection.php';
    $name=$_POST['name'];
    $group=$_POST['blood_group'];
    $contact=$_POST['contact'];
    $sql = "INSERT INTO `request` (`id`, `name`, `blood`,
 `contact`) VALUES (NULL, '$name',
  '$group', '$contact');";
    $result=mysqli_query($con,$sql);
    if ($result) {
        header('Location: ../index.php?toast=t&status=Successfully Requested!');
    }else{
        header('Location: ../index.php?toast=t&status=Error');
//        echo $sql;
    }
}
else{
    header('Location: ../index.php?toast=t&status=Missing Information!');
//    echo $name.$email.$pass.$group.$address.$date;
}
?>