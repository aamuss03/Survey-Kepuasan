<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>BRIN SURVEY</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" type="image" href="https://brin.go.id/images/favicon.png">
    @vite("../../public/survey.css")
</head>

<body>
    <div class="container">
        <main>
            <h1>SURVEY <span>KEPUASAN</span></h1>
            <p>
                SILAHKAN ISI SURVEI DI BAWAH INI UNTUK MENILAI PELAYANAN YANG KAMI
                BERIKAN
            </p>

            <form action="{{ route('submitSurvey') }}" method="POST">
              @csrf
                <div class="survey-form">
                    <ol>
                    @foreach ($questions as $question)
                        <div class="survey-question">
                            <li>{{ $question->Question }}</li>
                        </div>
                        <div class="survey-options">
                            <p style="margin-top: 10px;">Tidak Puas</p>
                            <div class="radio-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="answers[{{ $question->id }}]" value="1" id="btnradio1_{{ $question->id }}" autocomplete="off" required>
                                <label class="btn btn-outline-light btn-circle btn-lg" for="btnradio1_{{ $question->id }}">1</label>

                                <input type="radio" class="btn-check" name="answers[{{ $question->id }}]" value="2" id="btnradio2_{{ $question->id }}" autocomplete="off" required>
                                <label class="btn btn-outline-light btn-circle btn-lg" for="btnradio2_{{ $question->id }}">2</label>

                                <input type="radio" class="btn-check" name="answers[{{ $question->id }}]" value="3" id="btnradio3_{{ $question->id }}" autocomplete="off" required>
                                <label class="btn btn-outline-light btn-circle btn-lg" for="btnradio3_{{ $question->id }}">3</label>

                                <input type="radio" class="btn-check" name="answers[{{ $question->id }}]" value="4" id="btnradio4_{{ $question->id }}" autocomplete="off" required>
                                <label class="btn btn-outline-light btn-circle btn-lg" for="btnradio4_{{ $question->id }}">4</label>
                            </div>
                            <p style="margin-top: 10px;">Sangat Puas</p>
                        </div>
                        <br>
                        @endforeach
                    </ol>
                </div>
                <br>
                <div class="feedback">
                    <label for="floatingTextarea2">Feedback</label>
                    <textarea class="form-control" placeholder="Leave a comment here" name="feedback" id="feedbackInput"
                        style="height: 100px" required></textarea>
                    <br>
                    <button type="submit" class="btn btn-danger">Kirim</button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>