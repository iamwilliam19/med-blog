<?php
    //$_SESSION['email'];
?>

<section>
    <div class="form">
        <div class="ui large center aligned header">
            Create Account
        </div>

        <div class="underLine"></div>

        <div class="ui hidden error  message" id="errorMessage"></div>
        <div class="formMeta">
            <strong>Sign up today to enjoy benefits of being a member</strong>
        </div>

        

        <div class="ui form" action="signup/signup_model">
        
            <div class="field">
                <label for="fname">First name</label>
                <div class="ui icon input">
                <i class="ui right floated pencil icon"></i>
                    <input type="text" name="fname" placeholder="Enter your first name" id="fname" />
                </div>
            </div>

            <div class="field">
                <label for="lname">Last name</label>
                <div class="ui icon input">
                <i class="ui right floated pencil icon"></i>
                    <input type="text" name="lname" placeholder="Enter your last name" id="lname" />
                </div>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <div class="ui icon input">
                <i class="ui right floated mail icon"></i>
                    <input type="text" name="email" placeholder="Enter your email" id="email" />
                </div>
            </div>

            <div class="field">
                <label for="pwd1">Password</label>
                <div class="ui icon input">
                <i class="ui right floated pencil icon"></i>
                    <input type="password" name="pwd" placeholder="Enter your password" id="pwd1" />
                </div>
            </div>

            <div class="field">
                <label for="pwd2">Confirm Password</label>
                <div class="ui icon input">
                <i class="ui right floated pencil icon"></i>
                    <input type="text" name="pwd2" placeholder="Retype your password" id="pwd2" />
                </div>
            </div>

            <div class="butCont">
                <button type="submit" onclick="register()" id="signupBut">SIGN UP</button>
            </div>

            <div class="formAux">
               <small> Already have an account?</small> <span><a href="login"><strong>LOGIN</strong></a></span>
            </div>

            <div class="ui small center aligned header">
                OR SIGN UP WITH
            </div>

            
        </div>

        <div class="socialBut">
                <div class="ui buttons">
                    <div class="ui facebook button">
                        <i class="ui facebook icon"></i>
                        Facebook
                    </div>
                    <div class="or"></div>
                    <div class="ui google plus button">
                        <i class="ui google icon"></i>
                        Google
                    </div>
                </div>
            </div>

    </div>
</section>