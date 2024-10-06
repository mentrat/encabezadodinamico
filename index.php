<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encabezado Dinámico con Imágenes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        /* Estilo para el encabezado */
        #header {
            position: relative;
            width: 80%;
            height: 400px;
            overflow: hidden;
            margin: auto;
        }
        /* Estilo para las imágenes de fondo */
        .background-image {
            margin-top: 30px;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            object-fit: cover;
            z-index: -1;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            cursor: pointer; /* Añadimos cursor pointer para que el usuario sepa que puede hacer clic */
            border: 2px solid black;
        }
        /* Para mostrar la imagen activa */
        .active {
            opacity: 1;
        }
        /* Estilo para el texto de la noticia */
        #headline {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 15px;
            font-size: 24px;
            border-radius: 5px;
            max-width: 80%;
        }
        /* Estilo para los indicadores (puntos) */
        #indicators {
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }
        .dot {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            border: 1px solid black;
        }
        .dot.active {
            background-color: rgba(255, 255, 255, 1);
            border: 1px solid black;
        }
        .noticia-cuerpo {
          font-family: Arial, sans-serif;
          font-size: 16px;
          line-height: 1.5;
          color: #333;
          padding: 20px;
          width: 80%;
          margin: auto;
        }
        .noticia-cuerpo img {
          max-width: 100%;
          height: auto;
          margin-bottom: 10px;
        }
        .noticia-cuerpo p {
          margin-bottom: 15px;
        }
        h1 {
          font-family: 'Montserrat', sans-serif;
          font-size: 36px;
          font-weight: bold;
          color: #333;
          text-align: center;
          margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Encabezado con imágenes y texto dinámico -->
<div id="header">
    <!-- Imágenes que cambiarán dinámicamente (ahora con onclick para cambiar la noticia) -->
    <img src="https://marketplace.canva.com/EAGQZFGdAX4/1/0/1600w/canva-presentaci%C3%B3n-seguimiento-de-noticias-en-medios-escritos-newspaper-blanco-y-negro-wi4Nw9uAWXM.jpg" alt="Noticia 1" class="background-image active" onclick="manualChange(0)">
    <img src="https://toledodiario.es/wp-content/uploads/2024/08/Cartel-concierto-e1723196805866-740x400.jpeg" alt="Noticia 2" class="background-image" onclick="manualChange(1)">
    <img src="https://toledodiario.es/wp-content/uploads/2021/09/photo_2021-09-01_18-37-12-740x400.jpg" alt="Noticia 3" class="background-image" onclick="manualChange(2)">
    <img src="https://periodicoclm.publico.es/asset/zoomcrop,992,558,center,center/media/periodicoclm/images/2024/06/24/2024062417550454382.jpg" alt="Noticia 4" class="background-image" onclick="manualChange(3)">
    <img src="https://www.eventoplus.com/wp-content/uploads/2024/09/aevea-directorio-1024x355.jpg" alt="Noticia 5" class="background-image" onclick="manualChange(4)">

    <!-- Texto del encabezado -->
    <div id="headline">Cargando noticias...</div>

    <!-- Indicadores (puntos) para cambiar manualmente -->
    <div id="indicators">
        <div class="dot active" onclick="manualChange(0)"></div>
        <div class="dot" onclick="manualChange(1)"></div>
        <div class="dot" onclick="manualChange(2)"></div>
        <div class="dot" onclick="manualChange(3)"></div>
        <div class="dot" onclick="manualChange(4)"></div>
    </div>
</div>

<h1>Noticia importante</h1>
<div class="noticia-cuerpo">
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum corporis voluptas, magni repellendus esse ullam...</p>
</div>

<script>
    // Array con las noticias y las imágenes correspondientes
    const headlines = [
        "Noticia 1: El presidente anuncia nuevas reformas económicas.",
        "Noticia 2: La selección nacional gana el campeonato mundial.",
        "Noticia 3: Científicos descubren una nueva cura para una enfermedad rara.",
        "Noticia 4: La bolsa de valores alcanza su máximo histórico.",
        "Noticia 5: Grandes avances en la exploración espacial."
    ];

    const images = document.querySelectorAll('.background-image');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;
    let intervalId;

    // Función para cambiar el titular y la imagen
    function changeHeadlineAndImage(index) {
        // Actualiza el texto del titular
        document.getElementById("headline").textContent = headlines[index];

        // Oculta todas las imágenes y quita la clase 'active' de los puntos
        images.forEach((img) => img.classList.remove('active'));
        dots.forEach((dot) => dot.classList.remove('active'));

        // Muestra la imagen correspondiente y activa el punto
        images[index].classList.add('active');
        dots[index].classList.add('active');

        currentIndex = index;
    }

    // Cambia el encabezado automáticamente cada 5 segundos
    function autoChange() {
        currentIndex = (currentIndex + 1) % headlines.length;
        changeHeadlineAndImage(currentIndex);
    }

    // Inicia el intervalo para cambiar automáticamente
    intervalId = setInterval(autoChange, 5000);

    // Función para el cambio manual cuando se hace clic en los puntos o las imágenes
    function manualChange(index) {
        clearInterval(intervalId);  // Detenemos el intervalo
        changeHeadlineAndImage(index);  // Cambia al índice seleccionado
        intervalId = setInterval(autoChange, 5000);  // Reiniciamos el intervalo automático
    }

    // Muestra la primera noticia inmediatamente
    changeHeadlineAndImage(currentIndex);
</script>

</body>
</html>
