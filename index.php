<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Monitoring Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container img {
            width: 45px;
            height: 45px;
            margin-right: 12px;
        }

        .logo-container h1 {
            font-size: 24px;
            margin: 0;
        }

        .auth-buttons {
            display: flex;
            gap: 12px;
        }

        .auth-buttons button {
            background-color: white;
            color: #4CAF50;
            border: 2px solid #4CAF50;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }

        .auth-buttons button:hover {
            background-color: #4CAF50;
            color: white;
        }

        main {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            width: 280px;
            text-align: center;
            padding: 25px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-8px);
        }

        .card h3 {
            color: #333;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .gauge {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 20px auto;
        }

        .gauge .circle {
            fill: none;
            stroke-width: 15;
        }

        .gauge .background {
            stroke: #ddd;
        }

        .gauge .foreground {
            stroke: #4CAF50;
            stroke-linecap: round;
            transform: rotate(-90deg);
            transform-origin: center;
            transition: stroke-dashoffset 0.5s ease-in-out;
        }

        .gauge text {
            font-size: 16px;
            fill: #333;
            text-anchor: middle;
            dominant-baseline: middle;
        }

        .temperature-display, .humidity-display, .motion-display {
            font-size: 42px;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .temperature-display {
            color: #ff5722;
        }

        .humidity-display {
            color: #2196F3;
        }

        .motion-display {
            color: #673AB7;
        }

        @media screen and (max-width: 768px) {
            main {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="logo.png" alt="Logo">
            <h1>Plant Monitoring Dashboard</h1>
        </div>
        <div class="auth-buttons">
            <button onclick="redirectTo('login.html')">Login</button>
            <button onclick="redirectTo('signup.html')">Sign Up</button>
        </div>
    </header>
    <main>
        <div class="card">
            <h3>Soil Moisture</h3>
            <div class="gauge">
                <svg width="150" height="150">
                    <circle class="circle background" cx="75" cy="75" r="60"></circle>
                    <circle class="circle foreground" cx="75" cy="75" r="60" stroke-dasharray="377" stroke-dashoffset="226" id="moistureGauge"></circle>
                    <text x="75" y="75" id="moistureText">60%</text>
                </svg>
            </div>
        </div>
        <div class="card">
            <h3>Temperature</h3>
            <p class="temperature-display" id="temperature">25°C</p>
        </div>
        <div class="card">
            <h3>Humidity</h3>
            <p class="humidity-display" id="humidity">70%</p>
        </div>
        <div class="card">
            <h3>Motion Sensor</h3>
            <p class="motion-display">Motion Detected: <span id="motion">No</span></p>
        </div>
    </main>
    <script>
        function redirectTo(page) {
            window.location.href = page;
        }

        function updateSensorData() {
            // Simulate random values for sensor readings
            const moisture = Math.floor(Math.random() * 100);
            const temperature = (Math.random() * (35 - 20) + 20).toFixed(1);
            const humidity = Math.floor(Math.random() * (90 - 30) + 30);
            const motionDetected = Math.random() > 0.5 ? "Yes" : "No";

            // Update the UI elements
            document.getElementById('moistureText').textContent = `${moisture}%`;
            document.getElementById('moistureGauge').style.strokeDashoffset = 377 - (moisture / 100) * 377;

            document.getElementById('temperature').textContent = `${temperature}°C`;
            document.getElementById('humidity').textContent = `${humidity}%`;
            document.getElementById('motion').textContent = motionDetected;

            // Color changes based on temperature/humidity
            document.getElementById('temperature').style.color = temperature > 30 ? "#E53935" : "#FF5722";
            document.getElementById('humidity').style.color = humidity > 60 ? "#1E88E5" : "#2196F3";
            document.getElementById('motion').style.color = motionDetected === "Yes" ? "#D32F2F" : "#673AB7";
        }

        // Update sensor data every 3 seconds
        setInterval(updateSensorData, 3000);
    </script>
</body>
</html>
