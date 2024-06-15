<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            text-align: center;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .button-list {
            list-style-type: none;
            padding: 0;
        }

        .button-list li {
            margin: 10px 0;
        }

        .button-list button {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 150px;
        }

        .button-list button:hover {
            background-color: #e0e0e0;
        }

        .content {
            display: none;
            text-align: left;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .content img {
            max-width: 100%;
            height: auto;
        }

        .content h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .content p {
            font-size: 16px;
        }

        .content ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .content ul li {
            margin-bottom: 10px;
        }

        .content .next-button {
            display: block;
            margin: 20px auto;
            background-color: #ffcc00;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .content .home-button {
            display: block;
            margin: 20px auto;
            background-color: #ffcc00;
            border: none;
            border-radius: 50%;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .full-page {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 1000;
            overflow-y: auto;
            display: none;
        }

        .back-button {
            display: block;
            margin: 20px auto;
            background-color: #ffcc00;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .quiz-button {
            display: block;
            margin: 20px auto;
            background-color: #cc99ff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .canvas-container {
            text-align: center;
            margin-top: 20px;
        }

        .canvas-container canvas {
            border: 1px solid #000;
        }

        .canvas-container button {
            background-color: #cc99ff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">SINARAJA</div>
        <div class="subtitle">Sinau Aksara Jawa</div>
        <ul class="button-list">
            <li><button onclick="showContent('materi1')">Materi</button></li>
            <li><button onclick="showContent('kuis')">Kuis</button></li>
            <li><button onclick="showContent('tulisAksara')">Tulis Aksara</button></li>
            <li><button>Profil</button></li>
        </ul>
    </div>

    <div id="materi1" class="content full-page">
        <h2>MATERI</h2>
        <h3>Aksara Carakan</h3>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Javanese_script_chart.svg/1200px-Javanese_script_chart.svg.png" alt="Aksara Jawa">
        <ul>
            <li>Aksara Carakan, juga dikenal sebagai Aksara Jawa, adalah sistem penulisan tradisional yang digunakan untuk menulis bahasa Jawa.</li>
            <li>Aksara Carakan terdiri dari 20 aksara dasar atau konsonan yang dikenal sebagai "nglegena".</li>
        </ul>
        <button class="next-button" onclick="showContent('materi2')">Selanjutnya</button>
        <button class="home-button" onclick="hideContent('materi1')">🏠</button>
    </div>

    <div id="materi2" class="content full-page">
        <h2>MATERI</h2>
        <h3>Aksara Murda</h3>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Javanese_script_chart.svg/1200px-Javanese_script_chart.svg.png" alt="Aksara Jawa">
        <ul>
            <li>Aksara Murda adalah aksara yang digunakan untuk menulis nama-nama orang penting atau kata-kata yang dianggap penting.</li>
            <li>Aksara Murda terdiri dari beberapa aksara yang berbeda dari aksara Carakan.</li>
        </ul>
        <button class="next-button" onclick="showContent('materi3')">Selanjutnya</button>
        <button class="home-button" onclick="hideContent('materi2')" onclick="hideContent('materi2')">🏠</button>
    </div>

    <div id="materi3" class="content full-page">
        <h2>MATERI</h2>
        <h3>Aksara Swara</h3>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Javanese_script_chart.svg/1200px-Javanese_script_chart.svg.png" alt="Aksara Jawa">
        <ul>
            <li>Aksara Swara adalah aksara yang digunakan untuk menulis vokal atau suara.</li>
            <li>Aksara Swara terdiri dari beberapa aksara yang berbeda dari aksara Carakan dan Murda.</li>
        </ul>
        <button class="home-button" onclick="hideContent('materi3')">🏠</button>
    </div>

    <div id="kuis" class="content full-page">
        <h2>KUIS</h2>
        <h3>Aksara Jawa</h3>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Javanese_script_chart.svg/1200px-Javanese_script_chart.svg.png" alt="Aksara Jawa">
        <p>1. Tulisan aksara jawa di atas dibaca.....</p>
        <div>
            <label><input type="radio" name="quiz" value="a"> a</label><br>
            <label><input type="radio" name="quiz" value="b"> b</label><br>
            <label><input type="radio" name="quiz" value="c"> c</label><br>
            <label><input type="radio" name="quiz" value="d"> d</label>
        </div>
        <button class="quiz-button">Selanjutnya</button>
        <button class="home-button" onclick="hideContent('kuis')">🏠</button>
    </div>


    <div id="tulisAksara" class="content full-page">
        <h2>Tulis Aksara Jawa</h2>
        <div class="canvas-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Javanese_script_chart.svg/1200px-Javanese_script_chart.svg.png" alt="Aksara Jawa">
            <canvas id="drawingCanvas" width="500" height="300"></canvas>
            <br>
            <button onclick="clearCanvas()">Hapus</button>
            <button onclick="hideContent('tulisAksara')">Keluar</button>
        </div>
    </div>

    <script>
        function showContent(id) {
            document.getElementById(id).style.display = 'block';
        }

        function hideContent(id) {
            document.getElementById(id).style.display = 'none';
        }

        const canvas = document.getElementById('drawingCanvas');
        const ctx = canvas.getContext('2d');
        let drawing = false;

        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mouseup', stopDrawing);
        canvas.addEventListener('mousemove', draw);

        function startDrawing(e) {
            drawing = true;
            draw(e);
        }

        function stopDrawing() {
            drawing = false;
            ctx.beginPath();
        }

        function draw(e) {
            if (!drawing) return;
            ctx.lineWidth = 5;
            ctx.lineCap = 'round';
            ctx.strokeStyle = 'black';

            ctx.lineTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
        }

        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }
    </script>
</body>

</html>