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
            max-height: 300px;
            /* Set maximum height */
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

        .materi-content {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .materi-content img {
            max-width: 50%;
            height: auto;
        }

        .materi-content .text {
            max-width: 50%;
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

    @foreach($materi as $materi)
    <div id="materi{{ $loop->index + 1 }}" class="content full-page">
        <h2>MATERI</h2>
        <div class="materi-content">
            @if($materi->gambar)
            <img src="{{ asset('storage/' . $materi->gambar) }}" alt="{{ $materi->materi }}">
            @endif
            <div class="text">
                <h3>{{ $materi->materi }}</h3>
                <!-- <p>{{ $materi->materi }}</p> -->
            </div>
        </div>
        @if(!$loop->last)
        <button class="next-button" onclick="showContent('materi{{ $loop->index + 2 }}')">Selanjutnya</button>
        @endif
        <button class="home-button" onclick="hideContent('materi{{ $loop->index + 1 }}')">🏠</button>
    </div>
    @endforeach

    <div id="kuis" class="content full-page">
        <h2>KUIS</h2>
        @foreach($soal as $index => $quiz)
        <p>{{ $index + 1 }}. {{ $quiz->pertanyaan }}</p>
        @if($quiz->gambar)
        <img src="{{ asset('storage/' . $quiz->gambar) }}" alt="Gambar Soal"><br>
        @endif
        <div>
            @php
            $pilihan = json_decode($quiz->pilihan, true);
            @endphp
            @foreach($pilihan as $key => $pilihan)
            <label><input type="radio" name="quiz{{ $index }}" value="{{ $key }}"> {{ $pilihan }}</label><br>
            @endforeach
        </div>
        @endforeach
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
            localStorage.setItem('lastContent', id);
        }

        function hideContent(id) {
            document.getElementById(id).style.display = 'none';
            localStorage.removeItem('lastContent');
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

        window.onload = function() {
            const lastContent = localStorage.getItem('lastContent');
            if (lastContent) {
                showContent(lastContent);
            }
        }
    </script>
</body>

</html>