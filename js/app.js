function myMove() {
  var elem = document.getElementById("animate");   
  var pos = 0;
  var id = setInterval(frame, 5);
  function frame() {
    if (pos == 350) {
      clearInterval(id);
    } else {
      pos++; 
      elem.style.display = "block"; 
      elem.style.top = pos + 'px'; 
      elem.style.left = pos + 'px'; 
    }
  }
}

function openLogin() {
    document.getElementById("login-form").style.display = "block";
}

function closeLogin() {
    document.getElementById("login-form").style.display = "none";
}
function openRegister() {
    document.getElementById("register-form").style.display = "block";
}

function closeRegister() {
    document.getElementById("register-form").style.display = "none";
}
function showImage() {
    document.getElementById("img-big").style.display = "block";
}

function closeImage() {
    document.getElementById("img-big").style.display = "none";
}
//function closeAll() {
//    closeLogin();
//    closeRegister();
//}