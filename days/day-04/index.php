<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day 4: Loops in PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Day 4: Loops</h1>
        <p class="subtitle">Master iteration and repetition in PHP</p>

        <div class="section">
            <h2>1. for Loop</h2>
            <p>Use when you know how many times to repeat.</p>
            <div class="syntax">for ($i = 1; $i <= 5; $i++) { }</div>
            <div class="output"><?php for ($i = 1; $i <= 5; $i++) { echo "$i "; } ?></div>
        </div>

        <div class="section">
            <h2>2. while Loop</h2>
            <p>Use when you don't know how many times to repeat.</p>
            <div class="syntax">while (condition) { }</div>
            <div class="output"><?php $n = 5; while ($n > 0) { echo "$n "; $n--; } ?>Blast off!</div>
        </div>

        <div class="section">
            <h2>3. foreach Loop</h2>
            <p>Use to loop through arrays.</p>
            <div class="syntax">foreach ($array as $item) { }</div>
            <div class="output"><?php $fruits = ["Apple", "Banana", "Cherry"]; foreach ($fruits as $fruit) { echo "$fruit "; } ?></div>
        </div>

        <div class="section">
            <h2>4. break & continue</h2>
            <p>Control loop flow.</p>
            <div class="syntax">break; // exit loop | continue; // skip iteration</div>
            <div class="output"><?php for ($i = 1; $i <= 10; $i++) { if ($i == 5) break; echo "$i "; } ?>(stopped at 5)</div>
        </div>

        <div class="section">
            <h2>5. FizzBuzz Example</h2>
            <p>Classic programming exercise using loops.</p>
            <div class="output"><?php for ($i = 1; $i <= 15; $i++) { if ($i % 15 == 0) echo "FizzBuzz "; elseif ($i % 3 == 0) echo "Fizz "; elseif ($i % 5 == 0) echo "Buzz "; else echo "$i "; } ?></div>
        </div>
    </div>
</body>
</html>
