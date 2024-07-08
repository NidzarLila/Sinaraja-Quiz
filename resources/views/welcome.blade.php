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

        .review-content {
            display: none;
            text-align: left;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .review-content table {
            width: 100%;
            border-collapse: collapse;
        }

        .review-content th, .review-content td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .review-content th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .review-content td {
            text-align: center;
        }

        .review-content .correct {
            background-color: #d4edda;
        }

        .review-content .incorrect {
            background-color: #f8d7da;
        }

        .quiz-item {
            display: none;
        }

        .quiz-item.active {
            display: block;
        }

        .profile-content {
            display: none;
            text-align: center;
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 300px;
            margin: 20px auto;
        }

        .profile-content img {
            width: 50px;
            height: 50px;
        }

        .profile-content h2 {
            font-size: 24px;
            font-weight: bold;
        }

        .profile-content p {
            font-size: 16px;
            margin: 5px 0;
        }

        .profile-content button {
            background-color: #cc99ff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
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
            <li><button onclick="showContent('profil')">Profil</button></li>
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
        <div class="quiz-item" id="quiz-item-{{ $index }}">
            <p>{{ $index + 1 }}. {{ $quiz->pertanyaan }}</p>
            @if($quiz->gambar)
            <img src="{{ asset('storage/' . $quiz->gambar) }}" alt="Gambar Soal"><br>
            @endif
            <div>
                @php
                $pilihan = json_decode($quiz->pilihan, true);
                @endphp
                @foreach($pilihan as $key => $pilihan)
                <label><input type="radio" name="quiz{{ $index }}" value="{{ $key }}" data-correct="{{ $key == $quiz->jawaban ? 'true' : 'false' }}"> {{ $pilihan }}</label><br>
                @endforeach
            </div>
            @if($index > 0)
            <button class="quiz-button" onclick="showPreviousQuiz({{ $index }})">Kembali</button>
            @endif
            @if($index < count($soal) - 1)
            <button class="quiz-button" onclick="showNextQuiz({{ $index }})">Selanjutnya</button>
            @else
            <button class="quiz-button" onclick="checkAnswers()">Selesai</button>
            @endif
        </div>
        @endforeach
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

    <div id="review" class="review-content full-page">
        <h2>Reviu Hasil</h2>
        <p id="score"></p>
        <p id="correctCount"></p>
        <p id="incorrectCount"></p>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jawaban Kamu</th>
                    <th>Kunci Jawaban</th>
                    <th>Pembahasan</th>
                </tr>
            </thead>
            <tbody id="reviewTableBody">
                <!-- Review rows will be inserted here -->
            </tbody>
        </table>
        <button class="home-button" onclick="hideContent('review')">🏠</button>
    </div>

    <div id="profil" class="profile-content">
        <h2>Profil</h2>
        @if($profil)
        <img src="{{ asset('storage/' . $profil->foto) }}" alt="Profile Picture">
        <p>Nama: {{ $profil->nama }}</p>
        <p>TTL: {{ $profil->ttl }}</p>
        <p>Univ: {{ $profil->univ }}</p>
        <p>Prodi: {{ $profil->prodi }}</p>
        @else
        <p>Profil tidak tersedia.</p>
        @endif
        <button onclick="hideContent('profil')">Keluar</button>
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

        function showNextQuiz(currentIndex) {
            document.getElementById('quiz-item-' + currentIndex).classList.remove('active');
            document.getElementById('quiz-item-' + (currentIndex + 1)).classList.add('active');
        }

        function showPreviousQuiz(currentIndex) {
            document.getElementById('quiz-item-' + currentIndex).classList.remove('active');
            document.getElementById('quiz-item-' + (currentIndex - 1)).classList.add('active');
        }

        function checkAnswers() {
            console.log("checkAnswers function called"); // Debugging log
            const quizzes = document.querySelectorAll('#kuis .quiz-item');
            let correctCount = 0;
            let incorrectCount = 0;
            const reviewTableBody = document.getElementById('reviewTableBody');
            reviewTableBody.innerHTML = '';

            quizzes.forEach((quiz, index) => {
                const selected = quiz.querySelector('input[type="radio"]:checked');
                const correctAnswer = quiz.querySelector('input[type="radio"][data-correct="true"]');
                const row = document.createElement('tr');
                const noCell = document.createElement('td');
                const userAnswerCell = document.createElement('td');
                const correctAnswerCell = document.createElement('td');
                const explanationCell = document.createElement('td');
                const explanationButton = document.createElement('button');

                noCell.textContent = index + 1;
                userAnswerCell.textContent = selected ? (selected.nextSibling ? selected.nextSibling.textContent.trim() : 'Tidak dijawab') : 'Tidak dijawab';
                correctAnswerCell.textContent = correctAnswer ? correctAnswer.nextSibling.textContent.trim() : '';
                explanationButton.textContent = 'Pembahasan';
                explanationButton.onclick = function() {
                    alert('Pembahasan untuk soal ' + (index + 1));
                };
                explanationCell.appendChild(explanationButton);

                if (selected && correctAnswer && selected.value === correctAnswer.value) {
                    row.classList.add('correct');
                    correctCount++;
                } else {
                    row.classList.add('incorrect');
                    incorrectCount++;
                }

                row.appendChild(noCell);
                row.appendChild(userAnswerCell);
                row.appendChild(correctAnswerCell);
                row.appendChild(explanationCell);
                reviewTableBody.appendChild(row);
            });
<<<<<<< Updated upstream

            const totalScore = (correctCount / quizzes.length) * 100;
            document.getElementById('score').textContent = 'Total Skor: ' + totalScore;
            document.getElementById('correctCount').textContent = 'Jumlah Soal Benar: ' + correctCount;
            document.getElementById('incorrectCount').textContent = 'Jumlah Soal Salah: ' + incorrectCount;

            hideContent('kuis');
            showContent('review');
=======
            if (allCorrect) {
                alert('Nilai Anda: 100');
            }
>>>>>>> Stashed changes
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
            document.getElementById('quiz-item-0').classList.add('active');
        }
    </script>
</body>

</html>