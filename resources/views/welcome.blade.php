<!DOCTYPE html>
<html>
<head>
    <title>Spletna stran</title>
    <style>
        h1 {
            color: red;
        }

        b {
            color: blue;
        }

        li {
            list-style-type: square;
        }
    </style>

</head>
<body>


    <h1><?php
            echo "Pozdravljeni na spletni strani!";
        ?></h1>
    <p>
        <?php
            $content = "Namen te strani je prikaz izgleda in strukture HTML dokumenta.";
            echo $content;
        ?>
    </p>

    <h4>Sestava dokumenta:</h4>
    <ul>
        <li>Glava</li>
        <li>Telo</li>
    </ul>
</body>
</html>
