<!-- Login Box -->
<div id="logInWindow" class="logIn">
    <div class="logInWindow">
        <form class="form" action="includes/login.php" method="POST">
            <div class="imgcontainer">
                <img src="http://localhost/webRPG/pics/hero.svg" alt="image" class="loginIcon">
            </div>
            <div class="miniContainer">
                <label for="loginUser"></label>
                <input type="text" placeholder="Username/E-mail" name="loginUser" required>
                <label for="loginPsw"></label>
                <input type="password" placeholder="Password" name="loginPwd" required>
                <button type="submit" name="loginBtn" class="login btn">Login</button>
                <label class="remember">
                <input type="checkbox" checked="checked" name="remember">
                Remember me
                </label>
                </div>

            <div class="miniContainer">
                <span class="psw">Forgot <a href="#">password?</a></span>
                <span class="signUp d-block">Don't have an account?
                    <a href="#" data-toggle="modal" data-target=".signupModal">SignUp</a>
                </span>
            </div>
        </form>
    </div>
</div>