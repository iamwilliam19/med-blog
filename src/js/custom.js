window.onload = () => {
  
}

//email validator
const validateEmail = (email) => {
  let emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return emailReg.test(String(email).toLowerCase());
}

//name validator
const validateName = (name) => {
  let nameReg = /^[A-Za-z\s]+$/;
  return nameReg.test(name);
}

//sign up form
  
const register = (e) => {
  let fname = document.getElementById('fname');
  let lname = document.getElementById('lname');
  let email = document.getElementById('email');
  let pwd1 = document.getElementById('pwd1');
  let pwd2 = document.getElementById('pwd2');
  let signupBut = document.getElementById('signupBut');
  let errorMessage = document.getElementById('errorMessage');
  
  //ensure error message box is hidden
  if(!errorMessage.classList.contains("ui")){
    errorMessage.classList.add('ui');
  }else if(!errorMessage.classList.contains("hidden")){
    errorMessage.classList.add('hidden');
  }else if(!errorMessage.classList.contains("error")){
    errorMessage.classList.add('error');
  }else if(!errorMessage.classList.contains("message")){
    errorMessage.classList.add('message');
  }

  //check if all fields are filled
  if(fname.value.trim().length == 0 || lname.value.trim().length == 0 || email.value.trim().length == 0 || pwd1.value.trim().length == 0 || pwd2.value.trim().length == 0 ){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "Please fill all fields !!";
  }else if(!validateName(fname)){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "Please enter a valid first name eg. smith !!";
  }else if(!validateName(lname)){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "Please enter a valid last name eg. smith !!";
  }else if(!validateEmail(email)){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "Please enter a valid email address !!";
  }else if(pwd1.value.length < 6){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "Password too short !!";
  }else if(pwd1.value != pwd2.value){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "Passwords do not match !!";
  }else{
    //add loading icon
    signupBut.classList.add('ui');
    signupBut.classList.add('loading');
    signupBut.classList.add('button');

    //make ajax request
    let xhttp;
    if(window.XMLHttpRequest){
      xhttp = new XMLHttpRequest();
    }else{
      xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
      let data;
      if(this.readyState == 4 && this.status == 200){
        //continue
        data = this.responseText;
        if(data.length != 8){
          errorMessage.classList.remove('hidden');
          errorMessage.textContent = data;
           //remove loading icon
          signupBut.classList.remove('ui');
          signupBut.classList.remove('loading');
          signupBut.classList.remove('button');

        }else{
          //ensure error message box is hidden
          if(!errorMessage.classList.contains("ui")){
            errorMessage.classList.add('ui');
          }else if(!errorMessage.classList.contains("hidden")){
            errorMessage.classList.add('hidden');
          }else if(!errorMessage.classList.contains("error")){
            errorMessage.classList.add('error');
          }else if(!errorMessage.classList.contains("message")){
            errorMessage.classList.add('message');
          }

           //remove loading icon
           signupBut.classList.remove('ui');
           signupBut.classList.remove('loading');
           signupBut.classList.remove('button');

           //redirect
           location.replace('index');
        }
      }else if(this.readyState == 4 && this.status != 200){
        //reject
        errorMessage.textContent = "opps an error occured, please check your network connection and try again !!";
      }
    };
    xhttp.open("POST", "models/signup_model.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("fname="+fname.value+"&lname="+lname.value+"&email="+email.value+"&pwd1="+pwd1.value+"&pwd2="+pwd2.value);
  }
}


//login
const login = () => {
  let email = document.getElementById('email');
  let pwd = document.getElementById('pwd');
  let errorMessage = document.getElementById('errorMessage');
  let loginBut = document.getElementById('loginBut');
  //ensure error message box is hidden
  if(!errorMessage.classList.contains("ui")){
    errorMessage.classList.add('ui');
  }else if(!errorMessage.classList.contains("hidden")){
    errorMessage.classList.add('hidden');
  }else if(!errorMessage.classList.contains("error")){
    errorMessage.classList.add('error');
  }else if(!errorMessage.classList.contains("message")){
    errorMessage.classList.add('message');
  }

  //check for empty fields
  if(email.value.trim().length == 0 || pwd.value.trim().length == 0){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "Please fill all fields !!";
  }else if(!validateEmail(email)){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "Please enter a valid email address !!";
  }else{
    //add loading icon
    loginBut.classList.add('ui');
    loginBut.classList.add('loading');
    loginBut.classList.add('button');

    //make ajax request
    let xhttp;
    if(window.XMLHttpRequest){
      xhttp = new XMLHttpRequest();
    }else{
      xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
      let data;
      if(this.readyState == 4 && this.status == 200){
        //continue
        data = this.responseText;
        if(data.length != 8){
          errorMessage.classList.remove('hidden');
          errorMessage.textContent = data;
           //remove loading icon
           loginBut.classList.remove('ui');
           loginBut.classList.remove('loading');
           loginBut.classList.remove('button');

        }else{
          //ensure error message box is hidden
          if(!errorMessage.classList.contains("ui")){
            errorMessage.classList.add('ui');
          }else if(!errorMessage.classList.contains("hidden")){
            errorMessage.classList.add('hidden');
          }else if(!errorMessage.classList.contains("error")){
            errorMessage.classList.add('error');
          }else if(!errorMessage.classList.contains("message")){
            errorMessage.classList.add('message');
          }

           //remove loading icon
           loginBut.classList.remove('ui');
           loginBut.classList.remove('loading');
           loginBut.classList.remove('button');

           //redirect
           location.replace('index');
        }
      }else if(this.readyState == 4 && this.status != 200){
        //reject
        errorMessage.textContent = "opps an error occured, please check your network connection and try again !!";
      }
    };
    xhttp.open("POST", "models/login_model.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email="+email.value+"&pwd="+pwd.value);
  }
}


//logout
const logout = (e) => {
  let logout = e.target;
  //add loading icon
  logout.classList.add('ui');
  logout.classList.add('loading');
  logout.classList.add('button');

  
  
  //make ajax request
  let xhttp;
  if(window.XMLHttpRequest){
    xhttp = new XMLHttpRequest();
  }else{
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    let data;
    if(this.readyState == 4 && this.status == 200){
      //continue
      data = this.responseText;
      if(data.length != 7){
        
         //remove loading icon
        alert(data.length)

      }else{

         //redirect
         location.reload();
      }
    }else if(this.readyState == 4 && this.status != 200){
      //reject
      errorMessage.textContent = "opps an error occured, please check your network connection and try again !!";
    }
  };
  xhttp.open("POST", "models/logout_model.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}

//email subscription
const subscribe = (e) => {
  let email = document.getElementById('subEmail');
  let subscribe = document.getElementById('subscribe');
  if(email.value.length != 0){
    //remove  icon 
    subscribe.classList.remove('ui');
    subscribe.classList.remove('grey');
    subscribe.classList.remove('send');
    subscribe.classList.remove('icon');

    //make it load
    subscribe.classList.add('ui');
    subscribe.classList.add('loading');
    subscribe.classList.add('grey');
    subscribe.classList.add('send');
    subscribe.classList.add('icon');

    //make ajax request
    let xhttp;
    if(window.XMLHttpRequest){
      xhttp = new XMLHttpRequest();
    }else{
      xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
      let data;
      if(this.readyState == 4 && this.status == 200){
        //continue
        data = this.responseText;
        if(data.length != 7){
          
          //remove loading icon
          alert(data)
           //remove loading 
          subscribe.classList.remove('loading');
        }else{
          //remove  icon 
          subscribe.classList.remove('ui');
          subscribe.classList.remove('loading');
          subscribe.classList.remove('grey');
          subscribe.classList.remove('send');
          subscribe.classList.remove('icon');

          //make it load
          subscribe.classList.add('ui');
          subscribe.classList.add('green');
          subscribe.classList.add('thumbs');
          subscribe.classList.add('up');
          subscribe.classList.add('icon');
        }
      }else if(this.readyState == 4 && this.status != 200){
        //reject
        alert("opps an error occured, please check your network connection and try again !!");
      }
    };
    xhttp.open("POST", "models/subscription_model.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email="+email.value);
  }
}

//contact us 
const contactUs = (e) => {
  let name = document.getElementById('name');
  let email = document.getElementById('email');
  let message = document.getElementById('message');
  let errorMessage = document.getElementById('errorMessage');
  let successMessage = document.getElementById('successMessage');
  let but = e.target;

  //ensure error message box is hidden
  if(!errorMessage.classList.contains("ui")){
    errorMessage.classList.add('ui');
  }else if(!errorMessage.classList.contains("hidden")){
    errorMessage.classList.add('hidden');
  }else if(!errorMessage.classList.contains("error")){
    errorMessage.classList.add('error');
  }else if(!errorMessage.classList.contains("message")){
    errorMessage.classList.add('message');
  }
  
  if(name.value.trim().length == 0 || email.value.trim().length == 0 || message.value.trim().length == 0){
    errorMessage.classList.remove('hidden');
    errorMessage.textContent = "please fill all fields";
  }else{
    //put loading sign 
    //remove  icon 
    but.classList.remove('ui');
    but.classList.remove('right');
    but.classList.remove('floated');
    but.classList.remove('button');
  
    //make it load
    but.classList.add('ui');
    but.classList.add('right');
    but.classList.add('floated');
    but.classList.add('loading');
    but.classList.add('button');

    //make ajax request
    let xhttp;
    if(window.XMLHttpRequest){
      xhttp = new XMLHttpRequest();
    }else{
      xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
      let data;
      if(this.readyState == 4 && this.status == 200){
        //continue
        data = this.responseText;
        if(data.length != 7){
          
          errorMessage.classList.remove('hidden');
          errorMessage.textContent = data;
          but.classList.remove('loading');
        }else{
          
          but.classList.remove('loading');
          name.value = '';
          email.value = '';
          message.value = '';

          
          //ensure error message box is hidden
          if(!errorMessage.classList.contains("ui")){
            errorMessage.classList.add('ui');
          }else if(!errorMessage.classList.contains("hidden")){
            errorMessage.classList.add('hidden');
          }else if(!errorMessage.classList.contains("error")){
            errorMessage.classList.add('error');
          }else if(!errorMessage.classList.contains("message")){
            errorMessage.classList.add('message');
          }

          successMessage.classList.remove('hidden');
          successMessage.textContent = "message sent";
        }
      }else if(this.readyState == 4 && this.status != 200){
        //reject
        alert("opps an error occured, please check your network connection and try again !!");
      }
    };
    xhttp.open("POST", "models/contactus_model.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("name="+name.value+"&email="+email.value+"&message="+message.value);                                  
  }
}