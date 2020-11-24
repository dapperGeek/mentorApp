<?php
include 'views/header.php';
?>

        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">
                    <h2 class="form-title">What type of user are you ?</h2>
                    <div class="form-radio">
                        
                        <input type="radio" name="user_level" value="mentee" id="average" />
                        <label for="average">Mentee</label>

                        <input type="radio" name="user_level" value="mentor" id="master" />
                        <label for="master">Mentor</label>
                    </div>

                    <div class="form-textbox">
                        <label for="name">Full name</label>
                        <input type="text" name="name" id="name" />
                    </div>

                    <div class="form-textbox">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="password" id="password" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                    </div>
                </form>

                <p class="loginhere">
                    Already have an account ?<a href="index.php" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

<?php
include 'views/footer.php';

