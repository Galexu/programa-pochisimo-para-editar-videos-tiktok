<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Editor</title>
</head>

<body class="flex column">

    <h1>Editor videos</h1>
    <div class="flex"><input type="text" id="ruta" name="ruta" value="D:\Stuff\Desktop\b\awemer\download">
        <input type="button" id="botonR" onclick="destruirCookie()">
    </div>
    <input type="file" name="archivo" id="archivo" required>

    <div class="flex row">

        <div class="flex column mitad">

            <form action="./scripts/convertir.php" method="post" enctype="multipart/form-data" class="flex column">

                <h1>Escalar</h1>
                <div class="flex row">
                    <input type="text" id="resolucionW" name="resolucionW" value='1920'>
                    <span>:</span>
                    <input type="text" id="resolucionH" name="resolucionH" value='1080'>
                </div>
                <div class="flex row">
                    <label for="interruptorMitad">Mitad</label>
                    <input type="checkbox" id="interruptorMitad">
                    <label for="interruptorDoble">Doble</label>
                    <input type="checkbox" id="interruptorDoble">
                </div>
                <input type="submit" value="Escalar" onclick="showLoader()">
                <input type="text" class="invisible" id="escalar" name="escalar" value="escalar">
                <input type="text" class="invisible caminito" id="caminito" name="caminito"
                    value="D:\Stuff\Desktop\b\awemer\download">
                <input type="text" class="invisible nombreArchivo" name="nombreArchivo" value="">

            </form>

            <form action="./scripts/convertir.php" method="post" enctype="multipart/form-data" class="flex column">

                <h1>Recortar</h1>
                <input type="range" name="slider1" min="2.1" max="10" step="0.001" value="6" id="slider1">
                <span id="valorSlider1">6</span>
                <input type="range" name="slider2" min="2.1" max="10" step="0.001" value="6" id="slider2"
                    class="invisible">
                <span id="valorSlider2" class="invisible">16</span>
                <div class="flex row">
                    <label for="disjunta">Disjunta</label>
                    <input type="checkbox" id="disjunta">
                </div>
                <input type="submit" value="Recortar" onclick="showLoader()">
                <input type="text" class="invisible" id="recortar" name="recortar" value="recortar">
                <input type="text" class="invisible caminito" id="caminito" name="caminito"
                    value="D:\Stuff\Desktop\b\awemer\download">
                <input type="text" class="invisible nombreArchivo" name="nombreArchivo" value="">

            </form>

            <form action="./scripts/convertir.php" method="post" enctype="multipart/form-data" class="flex column">

                <h1>Rotar</h1>
                <select id="giro" name="giro">
                    <option>Seleccionar rotacion</option>
                    <option value="0">90 grados anti-horario espejo</option>
                    <option value="1">90 grados</option>
                    <option value="2">90 grados anti-horario</option>
                    <option value="3">90 grados efecto espejo</option>
                </select>
                <input type="submit" value="Rotar" onclick="showLoader()">
                <input type="text" class="invisible" id="rotar" name="rotar" value="rotar">
                <input type="text" class="invisible caminito" id="caminito" name="caminito"
                    value="D:\Stuff\Desktop\b\awemer\download">
                <input type="text" class="invisible nombreArchivo" name="nombreArchivo" value="">

            </form>
        </div>

        <div class="flex column mitad">
            <div id="resolucionOriginal"></div>
            <div id="casillaVideo">
            </div>
        </div>

    </div>

    <div class="cargando-contenedor">
        <div class="cargando"></div>
    </div>


    <script src="./scripts/script.js"></script>

</body>

</html>
