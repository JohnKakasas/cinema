
//LOGIN-REGISTER  /////////////////////////////////////////////////////////

// JavaScript to toggle between Login and Register forms
document.getElementById("login-btn").addEventListener("click", function() {
    toggleForms("login");
  });
  
  document.getElementById("register-btn").addEventListener("click", function() {
    toggleForms("register");
  });
  
  document.getElementById("switch-to-register").addEventListener("click", function() {
    toggleForms("register");
  });
  
  document.getElementById("switch-to-login").addEventListener("click", function() {
    toggleForms("login");
  });
  
  function toggleForms(form) {
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const loginBtn = document.getElementById("login-btn");
    const registerBtn = document.getElementById("register-btn");
  
    if (form === "login") {
      loginForm.classList.add("active");
      registerForm.classList.remove("active");
      loginBtn.classList.add("active");
      registerBtn.classList.remove("active");
    } else {
      loginForm.classList.remove("active");
      registerForm.classList.add("active");
      loginBtn.classList.remove("active");
      registerBtn.classList.add("active");
    }
  }
  