<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EFCoworking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="navbar">
        <div class="logo-container">
            <img src="coworking.png" alt="Logo EF" class="logo">
            <h1 style="color: white;">EFCoworking</h1>
        </div>
    </header>
    
    <br><br><br><br><br>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img src="coworking.png" alt="Logo EF" class="login-logo">
                <h2>EFCoworking</h2>
            </div>
            
            <p class="login-subtitle">Inicia sesión para gestionar tus espacios</p>

            <form action="validar_login.php" method="POST">
                <div class="input-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="********" required>
                </div>

                <div class="login-options">
                    <a href="recuperar.html" class="forgot-password">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn-login">Ingresar</button>
            </form>

            <div class="login-footer">
                <p>¿No tienes una cuenta? <a href="index.php">Regístrate aquí</a></p>
            </div>
        </div>
    </div>

</body>
</html>
