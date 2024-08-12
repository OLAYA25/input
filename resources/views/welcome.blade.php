<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema POS</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7fafc;
            color: #4a5568;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #e2e8f0;
            background-color: #ffffff;
        }
        header h1 {
            font-size: 1.5rem;
            margin: 0;
        }
        .btn {
            background-color: #3182ce;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.875rem;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #2b6cb0;
        }
        .main-content {
            margin-top: 20px;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .card h2 {
            font-size: 1.25rem;
            margin-top: 0;
        }
        .card p {
            margin: 0;
            color: #718096;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
            header h1 {
                margin-bottom: 10px;
            }
            .btn {
                font-size: 0.75rem;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistema POS</h1>
        <div class="auth-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="btn">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>
    <div class="container">
        <div class="main-content">
            <div class="card">
                <h2>Bienvenido</h2>
                <p>Este es tu sistema POS. Aquí puedes gestionar ventas, inventario y más...</p>
            </div>
            <div class="card">
                <h2>Documentación</h2>
                <p>Consulta la documentación para obtener más información sobre el uso del sistema.</p>
            </div>
            <div class="card">
                <h2>Soporte</h2>
                <p>Visita nuestro centro de soporte para resolver cualquier duda o problema.</p>
            </div>
        </div>
    </div>
</body>
</html>
