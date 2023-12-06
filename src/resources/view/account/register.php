 <?php
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $rePassword = $_POST['re-password'];
        $address = $_POST['address'];
        
        // check username
        if (!empty($username)) {
            $strRegex = '/^[a-zA-Z ]+$/';
            if (preg_match($strRegex, $username)) {
                $usernameMess = "";
            } else {
                $usernameMess = "*Only letters and spaces are allowed.";
            }
        } else {
            $usernameMess = "*Please enter your Username";
        }
    
        // check email
        if (!empty($email)) {
            $mailRegex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            $checkmail = check_email($email);
            if(is_array($checkmail)){
                $emailMess = "*Email is already in use, please use another address";
            }
            
            elseif (!preg_match($mailRegex, $email)) {
                $emailMess = "*Please enter correct email address format!";
            } else {
                $emailMess = "";
            }
        } else {
            $emailMess = "*Please enter your email";
        }
    
        // Check Address
    
        if(!empty($address)){
            $addressMess = '';
    
        }
        else{
            $addressMess = '*Please enter your address';
        }
    
    
        // check phonenumber
        if (!empty($phone)) {
            $phoneRegex = '/^(0|\+84)(3[2-9]|5[2689]|7[06789]|8[1-689]|9[0-9])[0-9]{7}$/';
            if (preg_match($phoneRegex, $phone)) {
                $phoneMess = "";
            } else {
                $phoneMess = "*Please enter correct phone number format.";
            }
        } else {
            $phoneMess = "*Please enter your phone number";
        }
    
        // check password
        if (!empty($password)) {
            $passRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{6,}$/';
            if (preg_match($passRegex, $password)) {
                $passMess = "";
            } else {
                $passMess = "*Password must contain uppercase, lowercase, special character and at least 6 characters";
            }
        } else {
            $passMess = "*Please enter your pass";
        }
    
        //check re-pasword
        if (!empty($rePassword)) {
            if ($rePassword === $password) {
                $rePassMess = "";
            } else {
                $rePassMess = "*Re-entered password is incorrect";
            }
        } else {
            $rePassMess = "*Please enter your re-password!";
        }
    
        if (empty($rePassMess) && empty($emailMess) && empty($usernameMess) && empty($passMess) && empty($phoneMess) && empty($addressMess)) {
            // $password = password_hash($password, PASSWORD_DEFAULT);
            addkh($password,$username,$email,$phone,$address);
            
                
                
                    
                    
                        

                $sql = " select * from khachhang where kh_id = (select max(kh_id) from khachhang)";
                $khachhang = pdo_query_one($sql);
                addcart_kh($khachhang['kh_id'],0);
                header("Location:index.php?act=login");

                    
                
                
                
        }
    }
    
?> 

<div class="form-wrapper d-flex align-items-center justify-content-center flex-column">
    <h2 class="fw-bold">Sign Up</h2>
    <form class="form" action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
            <p class="text-danger form-message mt-1"><?php echo !empty($usernameMess) ? $usernameMess : ""  ?></p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
            <p class="text-danger form-message mt-1"><?php echo !empty($emailMess) ? $emailMess : ""  ?></p>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone">
            <p class="text-danger form-message mt-1"><?php echo !empty($phoneMess) ? $phoneMess : ""  ?></p>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Home Address</label>
            <input type="text" class="form-control" id="phone" name="address">
            <p class="text-danger form-message mt-1"><?php echo !empty($addressMess) ? $addressMess : ""  ?></p>
        </div>
       
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <p class="text-danger form-message mt-1"><?php echo !empty($passMess) ? $passMess : ""  ?></p>
        </div>
        <div class="mb-3">
            <label for="re-password" class="form-label">Password Confirm</label>
            <input type="password" class="form-control" id="re-password" name="re-password">
            <p class="text-danger form-message mt-1"><?php echo !empty($rePassMess) ? $rePassMess : ""  ?></p>
        </div>
        <a href=""><button type="submit" class="btn btn-dark w-100 text-uppercase" name="register">Sign Up</button></a>
    </form>
    <p class="mt-4">You have a account? <a href="index.php?act=login" class="text-dark">Login</a></p>
</div>

 <!-- <script>
    const form = document.querySelector(".form")

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const data = new FormData(form)
        fetch("/da1/src/app/controller/register.php",{
            method:"post",
            body:data,
        })
        .then(res => {
            
            console.log(res);
            return res.json()
        })
        .then(res => {
            console.log(res);
        })
    })
</script>  -->