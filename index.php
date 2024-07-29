<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Conversor de Números</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
    <h1>Conversor de Números</h1>
    <form method="post">
        <label for="decimal">Número Indo-árabico:</label>
        <input type="text" id="decimal" name="decimal" value="<?php echo isset($_POST['decimal']) ? htmlspecialchars($_POST['decimal']) : ''; ?>">
        <br>
        <label for="roman">Número Romano:</label>
        <input type="text" id="roman" name="roman" value="<?php echo isset($_POST['roman']) ? htmlspecialchars($_POST['roman']) : ''; ?>">
        <br>
        <input type="submit" name="convert" value="Converter">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'class/Conversor.php';
        $converter = new Conversor();

        if (!empty($_POST['decimal'])) {
            $decimal = intval($_POST['decimal']);
            $roman = $converter->toRoman($decimal);
            echo "<p class='resultado'>$decimal em romanos é: $roman</p>";
        }

        if (!empty($_POST['roman'])) {
            $roman = strtoupper($_POST['roman']);
            $decimal = $converter->toDecimal($roman);
            echo "<p class='resultado'>$roman em indo-árabico é: $decimal</p>";
        }
    }
    ?>
</body>

</html>