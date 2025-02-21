<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Signup.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div>
        <h2>Sign Up</h2>
        <form id="signupForm" action="Process-Signup.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <input type="submit" value="Sign Up">
        </form>
    </div>

    <div>
        <img src="oia-uia.gif" alt="Wala ka Net eh. Pa load ka muna!" class="signup-gif">
        <p class=" image-caption">Pusang Umiikot Putangina naman oh.</p>
    </div>

    <script>
        // JavaScript to handle form submission using AJAX
        $(document).ready(function() {
            $('#signupForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Send the form data via AJAX
                $.ajax({
                    type: 'POST',
                    url: 'Process-Signup.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Show SweetAlert based on the PHP response
                        if (response == 'duplicate') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Monggoloid kaba?!',
                                text: 'Email or Username already exists. Please use a different one!',
                            });
                        } else if (response == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sign Up Successful',
                                text: 'Your account has been created!',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred during sign up. Please try again.',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'There was an issue with your request. Please try again.',
                        });
                    }
                });
            });
        });
    </script>

</body>
</html>