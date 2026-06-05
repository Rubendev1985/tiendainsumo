<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente | AgroStock Pro</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../public/css/style.css">
    <style>
        .password-strength {
            height: 4px;
            border-radius: 2px;
            background-color: #e9ecef;
            margin-top: 5px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease, background-color 0.3s ease;
        }
    </style>
</head>
<body>

    <div class="auth-wrapper py-5">
        <div class="auth-card register-card">
            
            <div class="text-center mb-4">
                <h2 class="auth-title">Únete a AgroStock Pro</h2>
                <p class="auth-subtitle mb-0">Crea tu cuenta de cliente para acceder a nuestro catálogo</p>
            </div>
            
            <form action="#" method="POST" id="formRegister">
                
                <h6 class="text-success fw-bold mb-3 border-bottom pb-2"><i class="bi bi-person-vcard me-2"></i>Datos Personales</h6>
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-dark">Nombre Completo / Razón Social</label>
                        <div class="input-group input-group-auth">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" placeholder="Ej. Juan Pérez" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-dark">Documento de Identidad / NIT</label>
                        <div class="input-group input-group-auth">
                            <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                            <input type="text" class="form-control" placeholder="Ej. 123456789" required>
                        </div>
                    </div>
                </div>

                <h6 class="text-success fw-bold mb-3 border-bottom pb-2"><i class="bi bi-telephone me-2"></i>Datos de Contacto</h6>
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-dark">Correo Electrónico</label>
                        <div class="input-group input-group-auth">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="correo@ejemplo.com" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-dark">Teléfono Celular</label>
                        <div class="input-group input-group-auth">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                            <input type="tel" class="form-control" placeholder="(+57) 300 000 0000" required>
                        </div>
                    </div>
                </div>

                <h6 class="text-success fw-bold mb-3 border-bottom pb-2"><i class="bi bi-shield-lock me-2"></i>Seguridad</h6>
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-dark">Contraseña</label>
                        <div class="input-group input-group-auth">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control border-end-0" id="regPassword" placeholder="••••••••" required oninput="checkStrength()">
                            <span class="input-group-text bg-white border-start-0 password-toggle" onclick="toggleRegPassword('regPassword', 'toggleRegIcon1')">
                                <i class="bi bi-eye-slash" id="toggleRegIcon1"></i>
                            </span>
                        </div>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="strengthBar"></div>
                        </div>
                        <small class="text-muted" style="font-size: 0.7rem;" id="strengthText">Mínimo 8 caracteres</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-dark">Confirmar Contraseña</label>
                        <div class="input-group input-group-auth">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control border-end-0" id="regPasswordConfirm" placeholder="••••••••" required oninput="checkMatch()">
                            <span class="input-group-text bg-white border-start-0 password-toggle" onclick="toggleRegPassword('regPasswordConfirm', 'toggleRegIcon2')">
                                <i class="bi bi-eye-slash" id="toggleRegIcon2"></i>
                            </span>
                        </div>
                        <small class="text-danger d-none" style="font-size: 0.7rem;" id="matchText">Las contraseñas no coinciden</small>
                    </div>
                </div>
                
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="termsCheck" required>
                    <label class="form-check-label small text-muted" for="termsCheck">Acepto los <a href="#" class="auth-link">Términos y Condiciones</a> y la Política de Privacidad.</label>
                </div>
                
                <button type="submit" class="btn btn-primary-custom w-100 py-2 mb-4 d-flex justify-content-center align-items-center gap-2" id="btnRegSubmit">
                    <span>Crear Cuenta</span>
                    <i class="bi bi-person-plus"></i>
                    <span class="spinner-border spinner-border-sm d-none" id="btnRegSpinner" role="status" aria-hidden="true"></span>
                </button>
                
            </form>
            
            <div class="text-center">
                <span class="text-muted small">¿Ya tienes una cuenta?</span>
                <a href="login.php" class="auth-link small ms-1">Inicia sesión aquí</a>
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
        function toggleRegPassword(inputId, iconId) {
            const passField = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passField.type === 'password') {
                passField.type = 'text';
                toggleIcon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                passField.type = 'password';
                toggleIcon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        }

        function checkStrength() {
            const val = document.getElementById('regPassword').value;
            const bar = document.getElementById('strengthBar');
            const text = document.getElementById('strengthText');
            
            let strength = 0;
            if (val.length > 0) strength += 25;
            if (val.length > 5) strength += 25;
            if (/[A-Z]/.test(val) && /[0-9]/.test(val)) strength += 25;
            if (/[^A-Za-z0-9]/.test(val)) strength += 25;

            bar.style.width = strength + '%';
            
            if(strength <= 25) {
                bar.style.backgroundColor = '#dc3545';
                text.innerText = 'Débil';
                text.className = 'text-danger';
            } else if(strength <= 50) {
                bar.style.backgroundColor = '#ffc107';
                text.innerText = 'Aceptable';
                text.className = 'text-warning';
            } else if(strength <= 75) {
                bar.style.backgroundColor = '#0dcaf0';
                text.innerText = 'Buena';
                text.className = 'text-info';
            } else {
                bar.style.backgroundColor = '#198754';
                text.innerText = 'Fuerte';
                text.className = 'text-success';
            }
            
            checkMatch();
        }

        function checkMatch() {
            const p1 = document.getElementById('regPassword').value;
            const p2 = document.getElementById('regPasswordConfirm').value;
            const matchText = document.getElementById('matchText');
            
            if(p2.length > 0) {
                if(p1 !== p2) {
                    matchText.classList.remove('d-none');
                } else {
                    matchText.classList.add('d-none');
                }
            } else {
                matchText.classList.add('d-none');
            }
        }

        document.getElementById('formRegister').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const p1 = document.getElementById('regPassword').value;
            const p2 = document.getElementById('regPasswordConfirm').value;
            
            if(p1 !== p2) {
                document.getElementById('matchText').classList.remove('d-none');
                return;
            }
            
            const btn = document.getElementById('btnRegSubmit');
            const spinner = document.getElementById('btnRegSpinner');
            
            btn.classList.add('disabled');
            spinner.classList.remove('d-none');
            
            setTimeout(() => {
                btn.classList.remove('disabled');
                spinner.classList.add('d-none');
                btn.classList.replace('btn-primary-custom', 'btn-success');
                btn.innerHTML = '<i class="bi bi-check2-circle me-2"></i>Cuenta Creada Exitosamente';
                
                setTimeout(() => {
                    window.location.href = 'login.php';
                }, 1500);
            }, 1500);
        });
    </script>
</body>
</html>
