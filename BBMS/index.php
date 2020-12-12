<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->authLogin();

$message=NULL;
if(isset($_POST['loginBtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $flag = $db->login($username, $password);
    if($flag){
        header("Location: http://localhost/BBMS/home.php");
    } else {
        $message = "Username of password was incorrect!";
    }
}
$title="Login";
include 'layout/_header.php'; 
?>

<div class="container">
<div class="row">
    <div class="col-md-6">
        <?php if(isset($message)): ?>
        <div class="alert-danger"><?= $message; ?></div>
        <?php endif; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
             
                <h5> User Login </h5>
            </div>
            <div class="panel-body">
                <form class="form-vertical" role="form" method="post" action="index.php">
                    <div class="form-group">
                        <input type="text" class="form-control" required="true" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" required="true" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group loginBtn">
                        <button type="submit" name="loginBtn" class="btn btn-primary btn-sm">Login</button>
                        <a href="users/" class="btn btn-sm btn-warning">I do not have username or password</a>
                    </div>
                </form>
            </div>
			</div>
        </div>
    </div>

</div>

<?php include 'layout/_footer.php'; ?>

