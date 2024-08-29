<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wine Quiz</title>
    <!-- Add Google Fonts link for Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="Wine Quiz Logo" width="50" height="50">
            <h1>Wine Quiz</h1>
            <p class="welcome-text">Let'see how much you really know about wine!</p>
        </div>
        <?php
        $questions = [
            [
                'question' => 'What is the main difference between Chianti Classico and Chianti Reserva?',
                'options' => ['Chianti Classico must be aged for a minimum of 12 months, where as Chianti Reserva must be aged for 24 months', 'Chianti Classico must contain 70% Sangiovese, whereas Chianti Reserva needs to contain 80%', 'Chianti Classico can be made anywehre in Italy, while Chianti Reserva comes from the Chianti wine region', 'Chianti Classico is made from white grapes, while Chianti Reserva is made from red grapes'],
                'correct' => 'Chianti Classico must be aged for a minimum of 12 months, where as Chianti Reserva must be aged for 24 months'
            ],
            [
                'question' => 'Where is the Pomerol wine region located in France?',
                'options' => ['Loire Valley', 'Bordeaux', 'Rhône', 'Burgundy'],
                'correct' => 'Bordeaux'
            ],
            [
                'question' => 'What is the most widely planted grape in the world?',
                'options' => ['Merlot', 'Pinot Noir', 'Tempranillo', 'Cabernet Sauvignon'],
                'correct' => 'Cabernet Sauvignon'
            ],
            [
                'question' => 'How many litres does a Jeroboam bottle of wine hold?',
                'options' => ['2', '3', '4', '5'],
                'correct' => '3'
            ],
            [
                'question' => 'What grape is Beaujolais made from?',
                'options' => ['Cabernet Sauvignon', 'Pinot Noir', 'Grenache', 'Gamay'],
                'correct' => 'Gamay'
            ]
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $score = 0;
            foreach ($questions as $index => $q) {
                if (isset($_POST["q$index"]) && $_POST["q$index"] === $q['correct']) {
                    $score++;
                }
            }
            echo "<h2>Your Score: $score out of " . count($questions) . "</h2>";
        } else {
            echo '<form method="post">';
            foreach ($questions as $index => $q) {
                echo "<div class='question'>";
                echo "<p><strong>" . htmlspecialchars($q['question']) . "</strong></p>";
                foreach ($q['options'] as $option) {
                    echo "<label><input type='radio' name='q$index' value='$option' required> $option</label><br>";
                }
                echo '</div>';
            }
            echo '<input type="submit" value="Submit Quiz">';
            echo '</form>';
        }
        ?>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <a href="https://x.com/kintulabs" style="font-size: 12px; color: #000; text-decoration: none;">Made by KintuLabs</a>
    </div>
</body>
</html>
