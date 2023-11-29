<!DOCTYPE html>
<html>
<head>
    <title>Appointment App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form id="appointmentForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone">
        <br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date">
        <br>
        <button type="button" id="addAppointment">Add Appointment</button>
    </form>

    <script>
        $(document).ready(function(){
            $('#addAppointment').click(function(){
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var date = $('#date').val();

                $.ajax({
                    url: 'add_appointment.php',
                    type: 'POST',
                    data: {name: name, email: email, phone: phone, date: date},
                    success: function(response){
                        var result = JSON.parse(response);
                        if(result.status){
                            alert('Appointment added successfully.');
                        } else {
                            alert('Failed to add appointment.');
                        }
                    },
                    error: function(){
                        alert('Error while adding appointment.');
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
require_once 'db_connection.php';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['phone'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO appointments (name, email, phone, date) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $date);

    if ($stmt->execute()) {
        $result = array(
            'status' => 'success',
            'message' => 'Appointment added successfully.'
        );
    } else {
        $result = array(
            'status' => 'error',
            'message' => 'An error occurred while adding the appointment.'
        );
    }

    $stmt->close();
    $conn->close();

    echo json_encode($result);
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Missing required fields.'));
}
?>

