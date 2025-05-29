<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #4f46e5, #3b82f6); /* Morado a azul */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 380px;
        }

        .login-container h1 {
            text-align: center;
            color: #4f46e5;
            margin-bottom: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"], input[type="password"] {
            padding: 12px;
            margin-bottom: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 16px;
        }

        button {
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2563eb;
        }

        .signup-link {
            margin-top: 1rem;
            text-align: center;
            font-size: 14px;
        }

        .signup-link a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
        <div class="signup-link">
            ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a>
        </div>
    </div>
</body>
</html>
