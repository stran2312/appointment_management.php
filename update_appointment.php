<?php
include 'config.php';

if (isset($_POST['appointment_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['date'])) {
    $appointment_id = $_POST['appointment_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    $conn = getDBConnection();

    $sql = "UPDATE appointments SET name = ?, email = ?, phone = ?, date = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $phone, $date, $appointment_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Appointment updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>