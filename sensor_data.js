function updateSensorData() {
    const moisture = Math.floor(Math.random() * 100);  // Replace with actual sensor data
    const temperature = (Math.random() * (35 - 20) + 20).toFixed(1);  // Replace with actual sensor data
    const humidity = Math.floor(Math.random() * (90 - 30) + 30);  // Replace with actual sensor data

    // Send data to PHP for saving
    fetch('save_sensor_data.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `username=testuser&soil_moisture=${moisture}&temperature=${temperature}&humidity=${humidity}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.log('Error:', error));
}

// Call the update function every 3 seconds (or as needed)
setInterval(updateSensorData, 3000);
