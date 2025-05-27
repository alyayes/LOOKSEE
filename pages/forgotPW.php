<?php include '../views/header.php';?>
<link rel="stylesheet" href="../assets/css/pwloginsignup.css">

<!---------------------account-page------------------------>
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="../assets/images/logoLogin.png" width="70%">
                <h2>Outfit the Day, Own the Mood!</h2>
            </div>
            
            <div class="containerFORGOT">
                <div class="container-forgotpw">
                    <h3 class="tittle">Forgot Password</h3>
                    <p>Enter your email address to  receive a password reset link.</p><br>
                    <form id="resetPasswordForm">
                        <input type="email" id="email" placeholder="Email Address" required>
                        <button type="submit">Send Reset Link</button>
                    </form>
                    <p id="message" class="hidden"></p></br>
                    <p>Remember your password? <a href="login.php">Back to login page</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="popup" class="popup hidden">
    <div class="popup-content">
        <span class="close" onclick="closePopup('loginPopup')">&times;</span>
        <p>Reset password berhasil! </br>Mohon cek email Anda untuk tautan reset.</p>
    </div>
</div>

<script src="../assets/js/forgotPW.js"></script>
<?php include '../views/footer.php';?>
</body>
</html>