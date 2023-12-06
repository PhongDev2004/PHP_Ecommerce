
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $emailMess = "*Please enter your email";
    }
    if (empty($password)) {
        $passlMess = "*Please enter your password";
    }
    // $password = password_hash($password, PASSWORD_DEFAULT);
    //check username and password
    $checkuser = check_user($email,$password);
    
    if(is_array($checkuser)){
        $_SESSION['acount'] = $checkuser;
        header("Location:index.php?act=home");
        
    }
    else {
        $loginMess = "Incorrect email address or password!";
    }
}


?>
<div class="form-wrapper d-flex align-items-center justify-content-center flex-column">
    <h2 class="fw-bold">Login</h2>
    <form class="form" method="post" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
            <p class="text-danger form-message mt-1"><?php echo !empty($emailMess) ? $emailMess : ""  ?></p>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <p class="text-danger form-message mt-1"><?php echo !empty($passlMess) ? $passlMess : ""  ?></p>
        </div>
        <p class="text-danger form-message mt-1"><?php echo !empty($loginMess) ? $loginMess : ""  ?></p>
        <button type="submit" class="btn btn-dark w-100 text-uppercase" name="login">Login</button>
    </form>
    <p class="mt-4">You don't have account? <a href="index.php?act=register">Sign up</a></p>
</div>