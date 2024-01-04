<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Example</title>
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>
<body>

    <div id="login-form">
        <h2>Login</h2>
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="button" onclick="login()">Login</button>
        </form>
    </div>

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <!-- Include your JavaScript file -->
    <!-- <script src="script.js"></script> -->

    <script type="text/javascript">
        // Function to handle login using Ajax
    function login() {
        // Get input values
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the request method, URL, and set asynchronous to true
        xhr.open("POST", "login-config.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Set up the callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Parse the JSON response
                // var response = JSON.parse(xhr.responseText);

                // Check if login was successful
                if (response.success) {
                    // Display success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        text: 'Welcome, ' + response.username + '!',
                        onClose: function () {
                            // Redirect or perform other actions after login
                            location.reload();
                        }
                    });
                } else {
                    // Display error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: response.message
                    });
                }
            }
        };

        // Prepare the data to be sent in the request
        var data = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);

        // Send the request
        xhr.send(data);
    }

    </script>
    

</body>
</html>
