<?php
include 'views/header.php';
include 'includes/login_redirect.php';
?>

<!--        --><?php //echo password_hash('us3RP@ss', PASSWORD_BCRYPT) ?>
        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                <form onsubmit="loginUser(); return false" method="POST" class="signup-form">
                    <h2 class="form-title">What type of user are you ?</h2>

                    <div class="form-textbox">

                        <label for="name">Account Type</label>
                        <select name="user_level" class="user_level" id="user_level">
                            <option value="1">Mentor</option>
                            <option value="2">Mentee</option>
                        </select>
                    </div>

                    <div class="form-textbox">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="password" id="password" />
                        &nbsp;
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Login" />
                    </div>
                </form>

                <p class="loginhere">
                    You have no account yet?<a href="register.php" class="loginhere-link"> Sign Up</a>
                </p>
            </div>
        </div>

<?php
include 'views/footer.php';

