const togglePasswordVisibility = () => {
    const passwordInput = document.getElementById("passwordInput");
    const eyeIcon = document.getElementById("lockIcon");

    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    eyeIcon.classList.toggle("fa-eye");
    eyeIcon.classList.toggle("fa-eye-slash");
  };