
<?php
include 'controllers/UserController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Login</title>
</head>
<body>
<div id="container" class="container <?php echo $active_form === 'signin' ? 'sign-in' : 'sign-up'; ?>">
    <div class="row">
        <div class="col align-items-center flex-col sign-up">
            <div class="form-wrapper align-items-center">
                <div class="form sign-up">
                    <form method="POST" action="" onsubmit="return validatePassword()">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" name="signup-username" placeholder="Username" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input type="email" name="signup-email" placeholder="Email" required>
                        </div>
                        <div class="password-container">
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" name="signup-password" id="password" placeholder="Password" required>
                            </div>
                            <div class="strength-meter"></div>
                            <ul class="requirements">
                                <li class="requirement" data-requirement="length">8+ chars</li>
                                <li class="requirement" data-requirement="uppercase">Uppercase</li>
                                <li class="requirement" data-requirement="lowercase">Lowercase</li>
                                <li class="requirement" data-requirement="number">Number</li>
                                <li class="requirement" data-requirement="special">Special</li>
                            </ul>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" name="signup-confirm-password" placeholder="Confirm password" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bx-home'></i>
                            <input type="text" name="signup-address1" placeholder="Address Line 1" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bx-home'></i>
                            <input type="text" name="signup-address2" placeholder="Address Line 2">
                        </div>
                        <div class="input-group">
                            <i class='bx bx-phone'></i>
                            <input type="number" name="signup-phone" placeholder="Phone Number" required>
                        </div>
                        <button type="submit" name="signup">Sign up</button>
                        <p>
                            <span>Already have an account?</span>
                            <b onclick="toggle()" class="pointer">Sign in here</b>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col align-items-center flex-col sign-in">
            <div class="form-wrapper align-items-center">
                <div class="form sign-in">
                    <form method="POST" action="">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" name="signin-username" placeholder="Email" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" name="signin-password" placeholder="Password" required>
                        </div>
                        <button type="submit" name="signin">Sign in</button>
                        <p><b>Forgot password?</b></p>
                        <p>
                            <span>Don't have an account?</span>
                            <b onclick="toggle()" class="pointer">Sign up here</b>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row content-row">
        <div class="col align-items-center flex-col">
            <div class="text sign-in">
                <h2>
                    <img src="" alt="" class="image">
                    <br>
                    Welcome
                </h2>
            </div>
        </div>
        <div class="col align-items-center flex-col">
            <div class="text sign-up">
                <h2>
                    <img src="" alt="" class="image">
                    <br>
                    Join with us
                </h2>
            </div>
        </div>
    </div>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php elseif (!empty($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <script src="public/js/login.js"></script>
</body>
</html>
