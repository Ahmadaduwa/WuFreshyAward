<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miss Universe Luxury Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Montserrat', sans-serif;
            background: #000;
            color: #FFD700;
            overflow: hidden;
        }

        #universe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background: rgba(0, 0, 0, 0.8);
            border: 2px solid #FFD700;
            border-radius: 20px;
            padding: 3rem;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }

        h1 {
            font-family: 'Cinzel', serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 2rem;
            color: #FFD700;
            text-shadow: 0 0 10px #FFD700;
        }

        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-bottom: 2px solid #FFD700;
            color: #FFD700;
            font-size: 1rem;
            transition: all 0.3s;
        }

        input::placeholder {
            color: rgba(255, 215, 0, 0.5);
        }

        input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            border-bottom-color: #FFA500;
        }

        button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, #FFD700, #FFA500);
            border: none;
            border-radius: 50px;
            color: #000;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }

        .forgot-password a {
            color: #FFD700;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-password a:hover {
            color: #FFA500;
        }

        .crown {
            font-size: 3rem;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div id="universe"></div>
    <div class="container">
        <div class="login-form">
            <div class="crown">👑</div>
            <h1>Miss Universe</h1>
            <form id="login-form">
                <div class="input-group">
                    <input type="text" id="username" required placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="password" id="password" required placeholder="Password">
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="forgot-password">
                <a href="#">Forgot password?</a>
            </div>
        </div>
    </div>

    <script>
        // Three.js galaxy background
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('universe').appendChild(renderer.domElement);

        const galaxyGeometry = new THREE.BufferGeometry();
        const galaxyMaterial = new THREE.PointsMaterial({
            color: 0xFFFFFF,
            size: 0.02,
            vertexColors: true
        });

        const particleCount = 10000;
        const positions = new Float32Array(particleCount * 3);
        const colors = new Float32Array(particleCount * 3);

        for (let i = 0; i < particleCount; i++) {
            const i3 = i * 3;
            const radius = Math.random() * 2 + 1;
            const spinAngle = radius * 5;
            const branchAngle = (i % 3) * 2 * Math.PI / 3;

            const x = Math.cos(branchAngle + spinAngle) * radius;
            const y = (Math.random() - 0.5) * 0.3 * radius;
            const z = Math.sin(branchAngle + spinAngle) * radius;

            positions[i3] = x;
            positions[i3 + 1] = y;
            positions[i3 + 2] = z;

            const mixedColor = new THREE.Color();
            mixedColor.setHSL(Math.random() * 0.2 + 0.4, 0.8, 0.6);

            colors[i3] = mixedColor.r;
            colors[i3 + 1] = mixedColor.g;
            colors[i3 + 2] = mixedColor.b;
        }

        galaxyGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        galaxyGeometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        const galaxy = new THREE.Points(galaxyGeometry, galaxyMaterial);
        scene.add(galaxy);

        camera.position.z = 3;

        function animate() {
            requestAnimationFrame(animate);
            galaxy.rotation.y += 0.0005;
            renderer.render(scene, camera);
        }
        animate();

        // Form submission
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Login functionality would be implemented here.');
        });

        // Responsive design
        window.addEventListener('resize', onWindowResize, false);
        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }
    </script>
</body>
</html>