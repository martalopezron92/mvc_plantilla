<?php

    /*
    El archivo más importante en un proyecto MVC es el index.php. Todas las peticiones URL que realice el usuario pasarán por este fichero. 
    Toda acción que se ejecute en nuestra aplicación tendrá que llamar al index y este tendrá que cargar el controlador asociado a dicha acción, 
    el modelo y la vista si procede.

    Responsabilidad principal: Es el punto de entrada de la aplicación.
    Detalles:
    - Se encarga de inicializar el entorno de la aplicación, como configurar constantes, cargar librerías e incluir el archivo de 
    autoloading si se utiliza (por ejemplo, con Composer).
    - Maneja la lógica de enrutar las solicitudes al controlador correspondiente.
    - Es minimalista y delega todas las responsabilidades importantes a las capas lógicas del patrón MVC.
    */

    // carga los controladores que necesita
    

    // NECESITAMOS CAPTURAR LA PETICIÓN
    /*
    localhost/mvc_plantilla/landing
    localhost/mvc_plantilla/login
    localhost/mvc_plantilla/register
    localhost/mvc_plantilla/loquesea
    */
    $requestUri = $_SERVER["REQUEST_URI"] ?? "";

    // Como ya sabemos a qué URI quiere acceder el cliente, podemos cargar el Controller Asociado
    switch ($requestUri) {
        case "/mvc_plantilla/landing":
            // Cargamos LandingController.php
            require_once "./controllers/LandingController.php";
            $landingController = new LandingController();
            // LLAMAR AL MÉTODO DE LANDING CONTROLLER RESPONSABLE DE CARGAR LA PAGINA
            $landingController->cargarVistaLanding();
            break;
        case "/mvc_plantilla/citas/allCitas":
            require_once "./controllers/CitaController.php";
            $controller = new CitaController();
            $controller->cargarListAllCitas();
            break;
        case "/mvc_plantilla/citas":
            $nombre = $_GET["nombre"];
        default:
            // CARGAR EL CONTROLLER ASOCIADO A MOSTRAR LA PAGINA 404
            require_once "./controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->cargarVistaNotFound();
            break;
    }
?>