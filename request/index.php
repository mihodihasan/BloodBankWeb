<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blood Donation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script></head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Donate Blood</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../index.php">Home</a></li>
                <li><a href="#">Who We Are</a></li>
                <li><a href="#">Certifications</a></li>
                <li><a href="#">Contact</a></li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li><a href="../signup/index.html"><span class="glyphicon glyphicon-log-in"></span>Sign up</a></li>
            </ul>
            <div id="myloginbtn" class="navbar-right">
                <form method="post" action="../php/login.php" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="E-mail">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <ul class="list-group" id="side_ul">
                <li class="list-group-item"><a href="../index.php">Home</a></li>
                <li class="list-group-item"><a href="../request/index.php">Request Blood</a></li>
                <li class="list-group-item"><a href="../view/index.php">Blood Requests</a></li>
                <li class="list-group-item"><a href="../members/index.php">Community Members</a></li>

            </ul>
        </div>
        <div class="col-sm-9 text-left">
            <!--actual content-->

            <form action="../php/request.php" method="post">
                <div class="form-group form-row col-md-12">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Your Name">
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="group">Select list:</label>
                        <select name="blood_group" class="form-control" id="group">
                            <?php
                            include '../php/connection.php';
                            $result=mysqli_query($con,"SELECT * FROM blood_group;");
                            while($row=mysqli_fetch_assoc($result)){ ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['group_name'];?></option>
                            <?php }
                            ?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contact">Contact</label>
                        <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number">
                    </div>
                </div>

                <!--<div class="form-group">-->
                <!--<div class="form-check">-->
                <!--<label class="form-check-label">-->
                <!--<input class="form-check-input" type="checkbox"> Keep Me Logged In-->
                <!--</label>-->
                <!--</div>-->
                <!--</div>-->
                <button type="submit" class="btn btn-primary right" style="float: right;">Request</button>
            </form>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br>
<footer class="navbar-fixed-bottom container-fluid text-center">
    <p>All rights Reserved To Company</p>
    <p>Copyrights &copy;2017</p>
</footer>


<!--login btn chng-->
<?php
if(!empty($_SESSION)){ ?>
    <script type='text/javascript'>
        document.getElementById('myloginbtn').innerHTML="<a href=\"../php/logout.php\" class=\"navbar-brand\">Logout,<?php echo $_SESSION['name'];?></a>";
    </script>
<?php }
?>
<!--        calling a toast -->
<?php
if(isset($_GET['toast'])){ ?>
    <script type="text/javascript">
        Materialize.toast('<?php echo $_GET['status']?>', 3000, 'rounded');

    </script>

<?php }
?>


<!--Add extra menu for admin-->
<?php
if (!empty($_SESSION)){
    if($_SESSION['is_login']){
        if($_SESSION['email']=='admin@blood.com'){ ?>
            <script>
                var li=document.createElement('li');
                li.classList.add('list-group-item');
                var anchor=document.createElement('a');
                anchor.href='./admin/index.php';
                anchor.innerHTML='Admin Panel';
                li.appendChild(anchor);
                document.getElementById('side_ul').appendChild(li);
                //                <li class="list-group-item"><a href="../ad">Home</a></li>
            </script>
        <?php }
    }
}
?>
</body>
</html>
