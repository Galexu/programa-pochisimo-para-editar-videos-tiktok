const archivo = document.getElementById('archivo');
const casillaResolucionW = document.getElementById('resolucionW');
const casillaResolucionH = document.getElementById('resolucionH');
const casilla = document.getElementById("resolucionOriginal");
const casillaV = document.getElementById("casillaVideo");
const interruptorM = document.getElementById('interruptorMitad');
const interruptorD = document.getElementById('interruptorDoble');
const ruta = document.getElementById('ruta');
const caminito = document.querySelectorAll('.caminito');
const slider1 = document.getElementById('slider1');
const slider2 = document.getElementById('slider2');
const valorSpan1 = document.getElementById('valorSlider1');
const valorSpan2 = document.getElementById('valorSlider2');
const disjunta = document.getElementById('disjunta');
const inputArchivo = document.querySelectorAll(".nombreArchivo");
const giro = document.getElementById('giro');

archivo.addEventListener('change', function (event) {
    var archivo = event.target.files[0];
    var nombreArchivo = archivo.name;
    inputArchivo.forEach(element => {
        element.value = nombreArchivo;
    });
});

ruta.addEventListener('change', function () {
    caminito.forEach(element => {
        element.value = ruta.value;
    });
    document.cookie = `ruta=${ruta.value}; expires=Thu, 18 Dec 2025 12:00:00 UTC; path=/`;
});

archivo.addEventListener('change', (event) => {
    var file = event.target.files[0];
    var url = URL.createObjectURL(file);
    window.video = document.createElement('video');
    video.setAttribute("id", "video");

    video.src = url;
    video.controls = true;
    casillaV.appendChild(video);
    video.addEventListener('loadedmetadata', obtenerResolucion);
});

function showLoader() {
    video.pause();
    document.querySelector('.cargando-contenedor').style.display = 'block';
    // var audio = document.getElementById("audio");
    // audio.play();
}

function obtenerResolucion() {
    var video = this;
    window.width = video.videoWidth;
    window.height = video.videoHeight;

    const durationInSeconds = this.duration;
    const framesPerSecond = 30; 
    const totalFrames = Math.floor(durationInSeconds * framesPerSecond);

    casilla.textContent = `${width}:${height}`;
    casillaResolucionW.value = width;
    casillaResolucionH.value = height;

    interruptorM.addEventListener('change', function () {
        if (this.checked) {
            casilla.textContent = `${width / 2}:${height / 2}`;
            casillaResolucionW.value = width / 2;
            casillaResolucionH.value = height / 2;
        } else {
            casilla.textContent = `${width}:${height}`;
            casillaResolucionW.value = width;
            casillaResolucionH.value = height;
        }
    });

    interruptorD.addEventListener('change', function () {
        if (this.checked) {
            casilla.textContent = `${width * 2}:${height * 2}`;
            casillaResolucionW.value = width * 2;
            casillaResolucionH.value = height * 2;
        } else {
            casilla.textContent = `${width}:${height}`;
            casillaResolucionW.value = width;
            casillaResolucionH.value = height;
        }
    });
}

slider1.addEventListener('input', function () {
    var valor = this.value;
    if (disjunta.checked) {
        valorSpan1.textContent = valor;
        slider1.value = valor;
    } else {
        valorSpan1.textContent = valor;
        valorSpan2.textContent = valor;
        slider1.value = valor;
        slider2.value = valor;
        
    }
    var primerPorcentaje = (10 / valor) * 10;
    var primerPorcentajeFloor = primerPorcentaje.toFixed(2);
    var segundoPorcentaje = 100 - primerPorcentajeFloor;
    video.style.clipPath = `polygon(0% ${primerPorcentajeFloor}%, 100% ${primerPorcentajeFloor}%, 100% ${segundoPorcentaje}%, 0% ${segundoPorcentaje}%)`;

});

slider2.addEventListener('input', function () {
    var valor = this.value;
    if (disjunta.checked) {
        valorSpan2.textContent = valor;
        slider2.value = valor;
    } else {
        valorSpan1.textContent = valor;
        valorSpan2.textContent = valor;
        slider1.value = valor;
        slider2.value = valor;
    }
});

disjunta.addEventListener('change', function () {
    if (this.checked) {
        slider2.style.display = "block";
        valorSpan2.style.display = "block";
    } else {
        slider2.style.display = "none";
        valorSpan2.style.display = "none";
    }
});

function cargarDesdeCookies() {
    var cookies = document.cookie.split(';');
    for (var cookie of cookies) {
        var [name, value] = cookie.trim().split('=');
        if (name === 'ruta') {
            document.getElementById('ruta').value = value;
            caminito.forEach(element => {
                element.value = value;
            });
        }
    }
}

function destruirCookie() {
    document.cookie = `ruta=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
    ruta.value = "D:\\Stuff\\Desktop\\b\\awemer\\download";
    caminito.forEach(element => {
        element.value = "D:\\Stuff\\Desktop\\b\\awemer\\download";
    });
}

giro.addEventListener('change', function () {
    var valorSeleccionado = giro.value;
    switch (valorSeleccionado) {
        case "0":
            video.style.transform = "rotate(90deg) scaleX(-1)";
            break;
        case "1":
            video.style.transform = "rotate(90deg)";
            break;
        case "2":
            video.style.transform = "rotate(-90deg)";
            break;
        case "3":
            video.style.transform = "rotate(-90deg) scaleX(-1)";
            break;
        default:
            video.style.transform = "none";
            break;
    }
});

document.addEventListener('DOMContentLoaded', cargarDesdeCookies);
