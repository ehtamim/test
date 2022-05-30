var uniqueUserName="";

function MyAjaxFunc() 
{
  var checkUserName = document.getElementById("username").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) 
    {
      document.getElementById("message").innerHTML = this.responseText;
    }
  uniqueUserName=document.getElementById("message").value;
  };
  xhttp.open("POST", "/wtproject/control/formHandle.php?checkUserName="+checkUserName, true);
  xhttp.send();
}

function AppointmentCode() 
{
  var checkCode = document.getElementById("appcode").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) 
    {
      document.getElementById("codemsg").innerHTML = this.responseText;
    }
  uniqueUserName=document.getElementById("codemsg").value;
  };
  xhttp.open("POST", "/wtproject/control/codeHandle.php?checkCode="+checkCode, true);
  xhttp.send();
}


function validateForm() 
{
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  if (username == "") 
  {
    document.getElementById("error").innerHTML="Please enter username";
    return false;
  }
  if ( password== "") {
    document.getElementById("error").innerHTML="Please enter password";
    return false;
  }
}

function validateSignUpForm() 
{
  var name = document.getElementById("name").value;
  var regName = /^[a-zA-Z]+ [a-zA-Z]+$/
  var username = document.getElementById("username").value;
  var contact= document.getElementById("contact").value;
  var passw=  /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
  var password = document.getElementById("password").value;
  var email=document.getElementById("email").value;
  var x = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var fileInput = document.getElementById("document");
  var filePath = fileInput.value;
  var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i;

  if (!(regName.test(name))) 
  {
    document.getElementById("jserror").innerHTML="Please enter name";
    return false;
  }
  if (username == "") 
  {
    document.getElementById("jserror").innerHTML="Please enter username";
    return false;
  }

  if (!(x.test(email)))
  {
    document.getElementById("jserror").innerHTML="Please enter valid email";
    return false;
  }
 if (!(contact.length==11 || contact.length==14)) 
  {
    document.getElementById("jserror").innerHTML="Please enter valid contact no";
    return false;
  }
  if (!(passw.test(password))) 
  {
    document.getElementById("jserror").innerHTML="Please enter valid password";
    return false;
  }
  if (!allowedExtensions.exec(filePath)) 
  {
    document.getElementById("jserror").innerHTML="Please select a valid file";
    fileInput.value = '';
    return false;
  }
}


function validateProfile() 
{
  var name = document.getElementById("name").value;
  var regName = /^[a-zA-Z]+ [a-zA-Z]+$/
  var contact= document.getElementById("contact").value;
  var passw=  /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
  var password = document.getElementById("password").value;
  var email=document.getElementById("email").value;
  var x = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (!(regName.test(name))) 
  {
    document.getElementById("profileError").innerHTML="Please enter name";
    return false;
  }
  if (!(x.test(email)))
  {
    document.getElementById("profileError").innerHTML="Please enter valid email";
    return false;
  }
 if (!(contact.length==11 || contact.length==14)) 
  {
    document.getElementById("profileError").innerHTML="Please enter valid contact no";
    return false;
  }
  if (!(passw.test(password))) 
  {
    document.getElementById("profileError").innerHTML="Please enter valid password";
    return false;
  } 
}