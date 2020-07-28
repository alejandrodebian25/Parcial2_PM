<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Parcial2</title>
    <!-- <link rel="stylesheet" href=<?= base_url() . "assets/bootstrap/css/bootstrap.min.css" ?>> -->
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #container {
            box-sizing: border-box;
            height: 100%;
            left: 0;
            margin: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }
    </style>
</head>


<body>
    <div id="container">
    </div>
    <script src=<?= base_url() . "assets/threejs/three.min.js" ?>></script>
    <script src=<?= base_url() . "assets/threejs/OrbitControls.js" ?>></script>

    <script>
        //Load background texture


        // alert("Utilizar el Mouse para  control de la camara");
        console.log("holas")
        var camera, scene, renderer;
        var cameraControls;

        function init() {

            clock = new THREE.Clock();
            scene = new THREE.Scene();
            scene.color = new THREE.Color(0xAED6F1);
            const loader = new THREE.TextureLoader();
            loader.load('assets/images/fondo.jpg', function(texture) {
                scene.background = texture;
            });
            //  render configuraciones iniciales
            renderer = new THREE.WebGLRenderer();
            renderer.setClearColor(scene.color);
            renderer.setPixelRatio(window.devicePixelRatio);
            renderer.setSize(window.innerWidth, window.innerHeight);

            var container = document.getElementById('container');
            container.appendChild(renderer.domElement);
            addCamara();
            camaraControl()
            addLuces();
            crearPiso()
            addMuñeco()
        }

        function addMuñeco() {
            crearSombrero()
            crearRostro()
            crearCuerpo()
            crearBrazos()
        }

        function crearSombrero() {
            crearCilindro(8, 7, 10, 0, 11 + 54, 0, 0x000000);
            crearCilindro(7, 5, 5, 0, 3.5 + 54, 0, 0xff0000);
            crearCilindro(15, 15, 2, 0, 0 + 54, 0, 0x000000);
        }

        function crearRostro() {
            // rostro
            crearEsfera(10, 0, 45, 0, 0xffffff)
            // ojos
            crearEsfera(1, -4, 50, 8, 0x00000)
            crearEsfera(1, 4, 50, 8, 0x00000)
            // nariz
            crearCono(3, 20, 0, 46, 8);
            // sonrisa
            crearEsfera(0.5, 0, 41, 9, 0x00000)
            crearEsfera(0.5, -2, 42, 9, 0x00000)
            crearEsfera(0.5, 2, 42, 9, 0x00000)
            crearEsfera(0.5, -4, 44, 9, 0x00000)
            crearEsfera(0.5, 4, 44, 9, 0x00000)
        }

        function crearCuerpo() {
            // cuerpo
            crearEsfera(20, 0, 20, 0, 0xffffff)
            // bufanda
            crearCilindro(16, 16, 5, 0, 37, 0, 0xff0000);
            // botones
            crearEsfera(2, 0, 30, 17, 0x00000)
            crearEsfera(2, 0, 25, 19, 0x00000)
            crearEsfera(2, 0, 20, 19, 0x00000)
        }

        function crearBrazos() {

            crearCilindro3(2, 1, 20, 20, 30, 0, 135)
            crearCilindro3(1, 2, 20, -20, 30, 0, 45)
            // mano izq
            // crearCilindro3(0.2, 1, 4, -28, 39, 0, 10)
            crearCilindro3(0.5, 1, 8, -30, 37, 0, 90)
            crearCilindro3(0.3, 1, 7, -29, 38, 0, 60)
            // mano der
            crearCilindro3(1, 0.2, 6, 29, 36, 0, 70)
            crearCilindro3(1, 0.5, 5, 29, 37, 0, 90)
            crearCilindro3(1, 0.5, 7, 28, 38, 0, 130)
        }


        function crearCilindro3(rtop, rbot, alto, x, y, z, rota = 0) {
            var texture = new THREE.TextureLoader().load('assets/images/madera.jpg');
            var material2 = new THREE.MeshBasicMaterial({
                map: texture
            });


            let geometry = new THREE.CylinderGeometry(rtop, rbot, alto, 3);
            let material = new THREE.MeshBasicMaterial({
                color: 0x000000
            });
            let cilindro = new THREE.Mesh(geometry, material2);
            cilindro.position.x = x;
            cilindro.position.y = y - 70;
            cilindro.position.z = z;
            cilindro.rotation.z = degreesToRadians(rota);
            scene.add(cilindro);
        }


        function crearEsfera(radio, x = 0, y = 0, z = 0, color) {
            var geometry = new THREE.SphereGeometry(radio, 32, 32);
            var material = new THREE.MeshBasicMaterial({
                color: color
            });
            var esfera = new THREE.Mesh(geometry, material);

            esfera.position.x = x;
            esfera.position.y = y - 70;
            esfera.position.z = z;
            scene.add(esfera);

        }

        function crearCono(radio, alto, x, y, z) {

            var geometry = new THREE.ConeGeometry(radio, alto, 12);
            var material = new THREE.MeshBasicMaterial({
                color: 0xff0000
            });
            var cono = new THREE.Mesh(geometry, material);

            cono.position.x = x;
            cono.position.y = y - 70;
            cono.position.z = z;
            cono.rotation.x = degreesToRadians(80);
            scene.add(cono);
        }

        function crearCono2(x, y, z, rota) {

            let geometry = new THREE.ConeGeometry(1, 6, 12);
            let material = new THREE.MeshBasicMaterial({
                color: 0xff0000
            });
            let cono = new THREE.Mesh(geometry, material);

            cono.position.x = x;
            cono.position.y = y - 70;
            cono.position.z = z;
            cono.rotation.z = degreesToRadians(rota);
            scene.add(cono);
        }

        function crearCilindro(radioTop, radioBot, alto, x, y, z, color) {
            var geometry = new THREE.CylinderGeometry(radioTop, radioBot, alto, 32);
            var material = new THREE.MeshBasicMaterial({
                color: color
            });
            var cilindro = new THREE.Mesh(geometry, material);
            cilindro.position.x = x;
            cilindro.position.y = y - 70;
            cilindro.position.z = z;

            scene.add(cilindro);
        }
        // ============================= Piso
        function crearPiso() {
            // Creaar piso geometria y material

            var pisoGeo = new THREE.PlaneGeometry(100, 100);
            var material2 = new THREE.MeshPhongMaterial({
                color: 0xffffff,
                side: THREE.DoubleSide
            });
            var piso = new THREE.Mesh(pisoGeo, material2);
            piso.position.set(0, 1 - 70, 0);
            // Rota
            piso.rotation.x = degreesToRadians(90);
            scene.add(piso);
        }
        // funcionde grados a radianes
        function degreesToRadians(degrees) {
            return degrees * Math.PI / 180;
        }





        function camaraControl() {
            cameraControls = new THREE.OrbitControls(camera, renderer.domElement);
            // cameraControls.target.set(0, 20, 0);
        }

        function addCamara() {
            //  camera posicion
            camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 2000);
            camera.position.y = 10; // Height the camera will be looking from
            camera.position.x = 0;
            camera.position.z = 150;

            scene.add(camera);
        }

        function addLuces() {
            var lightOne = new THREE.DirectionalLight(0xffffff);
            lightOne.position.set(1, 1, 1);
            scene.add(lightOne);
        }

        function animate() {
            window.requestAnimationFrame(animate);
            render();
        }

        function render() {
            var delta = clock.getDelta();
            cameraControls.update(delta);
            renderer.render(scene, camera);
        }



        /**
         * LLamando Funciones
         */

        init();
        animate();
    </script>
</body>

</html>