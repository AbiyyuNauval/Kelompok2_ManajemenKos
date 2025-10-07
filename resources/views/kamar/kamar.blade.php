<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kamar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .room-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            overflow: hidden;
            text-align: center;
            padding: 20px;
        }
        .room-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .room-card h2 {
            font-size: 1.5em;
            margin: 0 0 10px;
            color: #333;
        }
        .room-card p {
            color: #666;
            margin: 0 0 15px;
        }
        .details-button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .details-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Kamar Deluxe">
            <h2>Kamar Deluxe</h2>
            <p>Kamar mewah dengan pemandangan kota yang indah.</p>
            <a href="#" class="details-button">Lihat Detail</a>
        </div>

        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Kamar Standar">
            <h2>Kamar Standar</h2>
            <p>Kamar yang nyaman dan terjangkau untuk perjalanan singkat.</p>
            <a href="#" class="details-button">Lihat Detail</a>
        </div>

        <div class="room-card">
            <img src="https://via.placeholder.com/300x200" alt="Suite Eksekutif">
            <h2>Suite Eksekutif</h2>
            <p>Suite luas dengan fasilitas lengkap untuk kenyamanan maksimal.</p>
            <a href="#" class="details-button">Lihat Detail</a>
        </div>
    </div>

</body>
</html>