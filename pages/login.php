<?php include '../views/header.php'; ?>
<link rel="stylesheet" href="../assets/css/pwloginsignup.css">

<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="../assets/images/logoLogin.png" width="70%">
                <h2>Outfit the Day, Own the Mood!</h2>
            </div>
            <div class="col-2">
                <div class="form-container">
                    <h2>Login</h2>
                    <form method="POST" action="../logic/create/loginCreate.php">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" class="btn">Login</button>
                        <a href="forgotPW.php">Forgot password</a>

                        <div class="register-link">
                        Belum punya akun? <a href="register.php">Daftar di sini</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  

<script src="../assets/js/login.js"></script>
<?php include '../views/footer.php'; ?>
</body>
</html>
