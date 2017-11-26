<?php
session_start();
if (isset($_SESSION)){
    if ($_SESSION['email']!='admin@blood.com'){
        header('Location: ../index.php');
    }
}else{
    header('Location: ../index.php');
}

if (!empty($_GET['id'])) {
    include 'connection.php';
    $id=$_POST['id'];
    $sql = "DELETE FROM users WHERE id='$id';";
    $result=mysqli_query($con,$sql);
    if ($result) {
        header('Location: ../admin/index.php?toast=t&status=Successfully Blocked!');
    }else{
        header('Location: ../admin/index.php?toast=t&status=Error');
//        echo $sql;
    }
}
else{
    header('Location: ../admin/index.php?toast=t&status=Missing Information!');
//    echo $name.$email.$pass.$group.$address.$date;
}
?>