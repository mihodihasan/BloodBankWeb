<?php
session_start();
if (isset($_SESSION)){
    if ($_SESSION['email']!='admin@blood.com'){
        header('Location: ../index.php');
    }
}
if (!empty($_POST['name'])) {
    include 'connection.php';
    $name=$_POST['name'];
    $sql = "INSERT INTO `blood_group`(`id`, `group_name`, `availability`, `total_donor`)
 VALUES (NULL,'".$name."','available','0');";
    $result=mysqli_query($con,$sql);
    if ($result) {

        header('Location: ../admin/index.php?toast=t&status=Successfully added!');
    }else{
        header('Location: ../admin/index.php?toast=t&status=Failed!Try Again!');
//        echo $sql;
    }
}
else{
    header('Location: ../admin/index.php?toast=t&status=Missing Information!');
//    echo $name.$email.$pass.$group.$address.$date;
}
?>