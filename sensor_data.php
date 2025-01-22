<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password (default is empty)
$dbname = "user_registration"; // The database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to save sensor data
function saveSensorData($conn, $username, $soil_moisture, $temperature, $humidity) {
    $stmt = $conn->prepare("INSERT INTO sensor_data (username, soil_moisture, temperature, humidity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii", $username, $soil_moisture, $temperature, $humidity);
    
    if ($stmt->execute()) {
        echo "Sensor data saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Simulating the data received (You would replace this with actual data)
$soil_moisture = rand(0, 100); // Example random soil moisture value
$temperature = rand(20, 35); // Example random temperature value
$humidity = rand(30, 90); // Example random humidity value

// Example username (you would typically get this from a session or login system)
$username = "testuser"; // Replace with actual username

// Save the sensor data to the database
saveSensorData($conn, $username, $soil_moisture, $temperature, $humidity);

// Close connection
$conn->close();
?>
