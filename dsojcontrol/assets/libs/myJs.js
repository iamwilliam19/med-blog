/********functions */

    const isEmpty = (value)=> {
        if(value.length === 0){
            return true;
        }
    }

    const showError = (message) => {
        let errorBox = document.getElementsByClassName('formError')[0];
        errorBox.style.display = "block";
        errorBox.textContent = message;
    }
    const showRegistered = () => {
        let errorBox = document.getElementsByClassName('adminRegistered')[0];
        errorBox.style.display = "block";
        
    }

    const hideError = () => {
        let errorBox = document.getElementsByClassName('formError')[0];
        errorBox.style.display = "hidden";
    }

    //email validator
    const validateEmail = (email) => {
        let emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return emailReg.test(String(email).toLowerCase());
    }
/*****functions ends */

const deletePost = (e) => {
    let target = e.target;
    let id = target.dataset.id;
    let confirmation = confirm("Click OK to delete Post");
    if (confirmation){
        target.textContent="Please wait...";

        //make an ajax request
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
           
             showError(data);
             target.textContent = "Delete";

            }else{
                location.reload();
            }
            
        }else if(this.readyState == 4 && this.status != 200){
            //reject
            showError("opps an error occured, please check your network connection and try again !!");
            target.textContent = "Delete";
        }
        };
        xhttp.open("POST", "models/postDelete_model.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id);
    }
}


const regStaff = (e) => {
    e.preventDefault();
    let errorBox = document.getElementsByClassName('formError')[0];
   //hide error box
    hideError();
    let fname = document.getElementById('fname');
    let lname = document.getElementById('lname');
    let email = document.getElementById('email');
    let pwd = document.getElementById('pwd');
    let pwd2 = document.getElementById('pwd2');
    let loading = document.getElementsByClassName('loadSign')[0];
    //validate input
   if(isEmpty(fname.value.trim())){
        showError("Please enter a valid first name");
    }else if(isEmpty(lname.value.trim())){
        showError("Please enter a valid last name");
    }else if(isEmpty(pwd.value.trim()) || pwd.value.trim().length < 6){
        showError("Please enter a valid password. minimum of 6 characters");
    }else if(pwd.value !== pwd2.value){
        showError("Passwords do not match");
    }else{
        //make an ajax request
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
           
             showError(data);

            }else{
                hideError();
                showRegistered();
                fname.value = "";
                lname.value = "";
                email.value = "";
                pwd.value = "";
                pwd2.value = "";
            }
            
        }else if(this.readyState == 4 && this.status != 200){
            //reject
            showError("opps an error occured, please check your network connection and try again !!");
        }
        };
        xhttp.open("POST", "models/signup_model.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fname="+fname.value+"&lname="+lname.value+"&email="+email.value+"&pwd1="+pwd.value+"&pwd2="+pwd2.value);
    }


}

const changeActivity = (e) => {
    let target = e.target;
    let email = target.dataset.email;
    let activity = target.dataset.activity;
    let content = target.textContent;
    target.textContent = "Please wait..";
       //make an ajax request
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
           if(data.length != 6 && data.length != 8){
           
                showError("oop an error occured, try again later");
                target.textContent = content;

            }else{
              target.textContent = data;
              //change data set
              if(activity == 1){
                target.dataset.activity = 0;
              }else{
                target.dataset.activity = 1;
              }
            }
            
        }else if(this.readyState == 4 && this.status != 200){
            //reject
            showError("opps an error occured, please check your network connection and try again !!");
        }
        };
        xhttp.open("POST", "models/administrators.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("email="+email+"&activity="+activity);

}