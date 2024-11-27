<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
<?php require('header.php'); ?>

    <main>
        <div class="container">
            <h1 class="titleForm">Register for an Event</h1>
            <form id="eventForm" action="formRegister.php" method="POST" onsubmit="return validateForm()">
                
                <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" class="form-control">
                    <span class="error" id="userNameError"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control">
                    <span class="error" id="userEmailError"></span>
                </div>

                <div class="form-group">
                    <label for="select_event">Select Event:</label>
                    <select id="select_event" name="select_event" class="form-control">
                        <option value="">Select Event</option>
                        <option value="Conference">Conference</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Seminar">Seminar</option>
                        <option value="Webinar">Webinar</option>
                    </select>
                    <span class="error" id="eventSelectionError"></span>
                </div>

                <div class="form-group">
                    <label for="preferred_date">Preferred Date:</label>
                    <input type="date" id="preferred_date" name="preferred_date" class="form-control">
                    <span class="error" id="preferredDateError"></span>
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" id="contact_number" name="contact_number" class="form-control">
                    <span class="error" id="contactNumberError"></span>
                </div>

                <div class="form-group">
                    <label for="special_requests">Special Requests:</label>
                    <textarea id="special_requests" name="special_requests" rows="4" class="form-control"></textarea>
                    <span class="error" id="specialRequestsError"></span>
                </div>

                <button type="submit" class="submit-btn">Register</button>

            </form>

            <div id="successModal" class="modal">
                <div class="modal-content">
                    <p>Registration successful!</p>
                </div>
            </div> 
        </div>
    </main>

    <script>
        function validateForm() {
            document.getElementById('userNameError').innerText = '';
            document.getElementById('userEmailError').innerText = '';
            document.getElementById('eventSelectionError').innerText = '';
            document.getElementById('preferredDateError').innerText = '';
            document.getElementById('contactNumberError').innerText = '';
            document.getElementById('specialRequestsError').innerText = '';

            let valid = true;

            const userName = document.getElementById('userName').value;
            if (userName === '') {
                document.getElementById('userNameError').innerText = 'Full Name is required';
                valid = false;
            }

            const userEmail = document.getElementById('userEmail').value;
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (userEmail === '' || !userEmail.match(emailPattern)) {
                document.getElementById('userEmailError').innerText = 'Valid Email is required';
                valid = false;
            }

            const eventSelection = document.getElementById('eventSelection').value;
            if (eventSelection === '') {
                document.getElementById('eventSelectionError').innerText = 'Please select an event';
                valid = false;
            }

            const preferredDate = document.getElementById('preferredDate').value;
            if (preferredDate === '') {
                document.getElementById('preferredDateError').innerText = 'Preferred Date is required';
                valid = false;
            }

            const contactNumber = document.getElementById('contactNumber').value;
            if (contactNumber === '') {
                document.getElementById('contactNumberError').innerText = 'Contact Number is required';
                valid = false;
            }

            const specialRequests = document.getElementById('specialRequests').value;
            if (specialRequests.length > 200) {
                document.getElementById('specialRequestsError').innerText = 'Special Requests must be less than 200 characters';
                valid = false;
            }

            if (valid) {
                document.getElementById('successModal').style.display = "block";
                setTimeout(() => {
                    closeModal();
                    document.getElementById('eventForm').submit();
                }, 1000); 
                return false; 
            }

            return valid;
        }

        function closeModal() {
            document.getElementById('successModal').style.display = "none";
            document.getElementById('eventForm').reset(); 
        }
    </script>

<?php require('footer.php'); ?>


</body>

</html>
