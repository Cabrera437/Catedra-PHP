<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva Nota</title>
  
  <!-- Estilos embebidos -->
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #F5F5F5;
      color: #333333;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #4CAF50;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    header nav {
      display: flex;
      align-items: center;
    }

    header nav a {
      color: #FFFFFF;
      text-decoration: none;
      margin: 0 10px;
      font-weight: 500;
    }

    header nav hr {
      border: none;
      border-right: 1px solid #FFFFFF;
      height: 20px;
      margin: 0 10px;
    }

    header nav a:hover {
      color: #FF9800;
    }

    main {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background-color: #FFFFFF;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #163917;
      font-size: 32px;
      margin-bottom: 20px;
      text-align: center;
    }

    form label {
      display: block;
      font-weight: 500;
      margin-bottom: 10px;
    }

    form input,
    form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #CCCCCC;
      border-radius: 4px;
      font-size: 16px;
      margin-bottom: 20px;
    }

    .form-actions {
      display: flex;
      justify-content: center;
    }

    form button {
      background-color: #4cacf9;
      color: #FFFFFF;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    form button:hover {
      background-color: #1976D2;
    }

   
  </style>
</head>
<body>
  <header>
    <nav>
      <a href="{{ route('dashboard') }}">Inicio</a>
      <a href="{{ route('dashboard') }}">Volver</a>
    </nav>
  </header>

  <main>
    <h1>Nueva Nota</h1>
    
    <form method="POST" action="{{ route('nota.guardar') }}">
      @csrf 
      
      <label for="note-title">Título:</label>
      <input type="text" id="note-title" name="note-title" required>

      <label for="note-content">Contenido:</label>
      <textarea id="note-content" name="note-content" rows="10" required></textarea>

      <div class="form-actions">
        <button type="submit">Guardar</button>
      </div>
    </form>
  </main>

  
</body>
</html>
