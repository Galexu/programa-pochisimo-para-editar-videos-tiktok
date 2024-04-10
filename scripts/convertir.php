<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $archivo = $_POST["nombreArchivo"];
    $nombreArchivoSinExtension = substr($archivo, 0, -4);
    $caminito = $_POST["caminito"];
    $archivoo = '"' . $caminito . "\\" . $archivo . '"';
    $archivoGuardar = '"' . $caminito . "\\" . $nombreArchivoSinExtension . "1";

    if (exec("ffmpeg -version")) { //si ffmpeg esta en el path global
        if (isset($_POST["escalar"]) and $_POST["escalar"] == "escalar") {
            $resolucionW = $_POST["resolucionW"];
            $resolucionH = $_POST["resolucionH"];
            $comandoEscalar = "ffmpeg -i " . $archivoo . " -vf scale=" . $resolucionW . ":" . $resolucionH . " -c:a copy " . $archivoGuardar . '.mp4"';

            exec($comandoEscalar, $output, $returnCode);
            if ($returnCode === 0) {
                header("Location: ../index.html");
            } else {
                echo "Error al convertir el video.";
            }
        } else if (isset($_POST["recortar"]) and $_POST["recortar"] == "recortar") {
            $corte1 = $_POST["slider1"];
            $corte2 = $_POST["slider2"];
            $comandoRecortar = "ffmpeg -i " . $archivoo . ' -vf "crop=in_w:in_h-(in_h/' . $corte1 . ')*2:0:(in_h/' . $corte2 . ')" ' . $archivoGuardar . '.mp4"';

            exec($comandoRecortar, $output, $returnCode);
            if ($returnCode === 0) {
                header("Location: ../index.html");
            } else {
                echo "Error al convertir el video.";
            }
        } else if (isset($_POST["rotar"]) and $_POST["rotar"] == "rotar") {
            $giro = $_POST["giro"];
            $comandoGiro = "ffmpeg -i " . $archivoo . ' -vf "transpose=' . $giro . '" ' . $archivoGuardar . '.mp4"';

            exec($comandoGiro, $output, $returnCode);
            if ($returnCode === 0) {
                header("Location: ../index.html");
            } else {
                echo "Error al convertir el video.";
            }
        }
    } else {
        echo "FFmpeg no está instalado.";
    }
}
