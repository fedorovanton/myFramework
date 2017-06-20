<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>
<h1>Внимание</h1>

<h3><?= $message ?></h3>

<div>Код: <?= $code ?></div>
<div>В файле: <?= $file ?> <br/>

    <div>В строке: <?= $line ?></div>
</body>
</html>