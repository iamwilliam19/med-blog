window.onload = () => {
  
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
