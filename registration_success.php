<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
    <script>
        function redirectToLogin() {
            alert("You have successfully registered your account.");
            window.location.href = "Login_form.html";
        }

        window.onload = redirectToLogin;
    </script>
</head>
<body>
    <p>If you are not redirected automatically, <a href="Login_form.html">click here</a>.</p>
</body>
</html>
