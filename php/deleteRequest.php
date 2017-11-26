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
    $id=$_GET['id'];
    $sql = "DELETE FROM request WHERE id='".$id."';";
    $result=mysqli_query($con,$sql);
    if ($result) {
        header('Location: ../admin/index.php?toast=t&status=Successfully Deleted!');
//        echo $sql;
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