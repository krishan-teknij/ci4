<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Add Student</h1>

    <form id="studentForm" action="/students/store" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <span id="emailError" style="color: red; display: none;">Email is already registered. Please use another email.</span><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>

        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function () {
            $('#email').on('blur', function () {
                var email = $('#email').val();
                
                // Check if email exists in the database
                $.ajax({
                    url: '/students/check_email',  // The URL for the email check route
                    method: 'POST',
                    data: { email: email },
                    success: function (response) {
                        if (response.exists) {
                            $('#emailError').show(); // Show error message
                            $('#studentForm button[type="submit"]').prop('disabled', true); // Disable the submit button
                        } else {
                            $('#emailError').hide(); // Hide error message
                            $('#studentForm button[type="submit"]').prop('disabled', false); // Enable the submit button
                        }
                    }
                });
            });

            // Prevent form submission if email is already registered
            $('#studentForm').on('submit', function (e) {
                if ($('#emailError').is(':visible')) {
                    e.preventDefault(); // Stop form submission
                }
            });
        });
    </script>
</body>

</html>
