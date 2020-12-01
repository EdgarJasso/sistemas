<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-color: #dedede;
        }
        .contenedor{
            width: 75%;
            font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
            font-weight: bold;
            margin: 0 auto;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            padding: 10px;
            margin: 0 auto;
        }
        .contenedor .row{
            width: 75%;
            margin: 0 auto;
        }
        .contenedor .row img{
            width: 100%;
            margin: 0 auto;
        }
    </style>

<div class="contenedor">
    <div class="row">
    <?php include '../dominio.php';?>
    <img src="<?=URL?>/ERRORES/500.jpg" alt="500">
       <a href="<?=URL?>">Regresar</a>
    </div>
</div>

</body>
</html>