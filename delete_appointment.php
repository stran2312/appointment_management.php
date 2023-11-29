<?php
include 'config.php';

if (isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    $conn = getDBConnection();

    $sql = "DELETE FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Appointment deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>