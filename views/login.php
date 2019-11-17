<section>
    <div class="form">
        <div class="ui large center aligned header">
            Login Your Account
        </div>

        <div class="underLine"></div>

        <div class="ui hidden error  message" id="errorMessage"></div> 
        <div class="formMeta">
            <strong>Login to view your profile and enjoy thousands of benefits of being a member </strong>
        </div>
    
        <div class="ui form">
            

            <div class="field">
                <label for="email">Email</label>
                <div class="ui icon input">
                <i class="ui right floated mail icon"></i>
                    <input type="email" placeholder="Enter your email" id="email" />
                </div>
            </div>

            <div class="field">
                <label for="pwd1">Password</label>
                <div class="ui icon input">
                <i class="ui right floated pencil icon"></i>
                    <input type="password" placeholder="Enter your password" id="pwd" />
                </div>
            </div>

           
            <div class="butCont">
                <button onclick="login()" id="loginBut">LOGIN</button>
            </div>

            <div class="formAux">
               <small> Already have an account?</small> <span><a href="signup"><strong>SIGN UP</strong></a></span>
            </div>

            <div class="ui small center aligned header">
                OR LOGIN WITH
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