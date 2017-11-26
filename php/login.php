<?php
session_start();

        if(!empty($_POST['email'])){
            if(!empty($_POST['pass'])){
                $user_email=$_POST['email'];
                $user_pass=$_POST['pass'];
//                echo "<script>
//            openToast('Welcome');
//            </script>";
                include 'connection.php';
                $sql = "SELECT * FROM users WHERE email='" . $user_email ."' and password = '".sha1($user_pass). "'";
                $result=mysqli_query($con,$sql);

                if ($row= $result->fetch_assoc()) {
                    $_SESSION['is_login'] = true;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['user_id']=$row['id'];
                    $_SESSION['email']=$row['email'];
                    header('Location: ../index.php?toast=t&status=Welcome!You Are Logged In');
                }else{
                    header('Location: ../index.php?toast=t&status=Login Failed!');
                }
            }
        }
        //    header('Location: index.php');
        ?>
