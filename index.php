<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wine Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #8B0000;
            text-align: center;
        }
        .question {
            margin-bottom: 20px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #8B0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #660000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Wine Quiz</h1>
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
                echo '<div class="question">';
                echo "<p>" . ($index + 1) . ". {$q['question']}</p>";
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
</body>
</html>
