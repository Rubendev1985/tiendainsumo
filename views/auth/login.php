<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | AgroStock Pro</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-card">
            
            <div class="auth-logo">
                <i class="bi bi-tree-fill"></i>
            </div>
            
            <h2 class="auth-title">Bienvenido de nuevo</h2>
            <p class="auth-subtitle">Ingresa a tu panel de control agrícola</p>
            
            <form action="#" method="POST" id="formLogin">
                
                <div class="mb-4">
                    <label class="form-label small fw-bold text-dark">Correo Electrónico</label>
                    <div class="input-group input-group-auth">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="correo@ejemplo.com" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label small fw-bold text-dark mb-0">Contraseña</label>
                        <a href="#" class="small auth-link">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="input-group input-group-auth">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control border-end-0" id="passwordField" placeholder="••••••••" required>
                        <span class="input-group-text bg-white border-start-0 password-toggle" onclick="togglePassword()">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </span>
                    </div>
                </div>
                
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label small text-muted" for="rememberMe">Recordar mis datos</label>
                </div>
                
                <button type="submit" class="btn btn-primary-custom w-100 py-2 mb-4 d-flex justify-content-center align-items-center gap-2" id="btnSubmit">
                    <span>Iniciar Sesión</span>
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="spinner-border spinner-border-sm d-none" id="btnSpinner" role="status" aria-hidden="true"></span>
                </button>
                
            </form>
            
            <div class="text-center">
                <span class="text-muted small">¿No tienes una cuenta?</span>
                <a href="register.php" class="auth-link small ms-1">Regístrate como Cliente</a>
            </div>
            
            <div class="text-center mt-4">
                <a href="../../public/index.php" class="text-muted small text-decoration-none">
                    <i class="bi bi-arrow-left me-1"></i> Volver a la página principal
                </a>
            </div>
            
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Funcionalidad para mostrar/ocultar contraseña
        function togglePassword() {
            const passField = document.getElementById('passwordField');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passField.type === 'password') {
                passField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }

        // Simulación de envío del formulario
        document.getElementById('formLogin').addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmit');
            const spinner = document.getElementById('btnSpinner');
            
            btn.classList.add('disabled');
            spinner.classList.remove('d-none');
            
            // Simular petición AJAX
            setTimeout(() => {
                btn.classList.remove('disabled');
                spinner.classList.add('d-none');
                btn.classList.replace('btn-primary-custom', 'btn-success');
                btn.innerHTML = '<i class="bi bi-check2-circle me-2"></i>Acceso Concedido';
            }, 1500);
        });
    </script>
</body>
</html>
