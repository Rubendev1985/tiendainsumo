<?php
// index.php - Página de presentación y portal de acceso
session_start();

// Simulación de conexión (sólo para la presentación)
$systemStatus = "Conectado a MySQL 8.0";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroStock Pro | Sistema de Inventario y Ventas</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top glass-nav">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-tree-fill" style="font-size: 1.5rem;"></i>
                AgroStock Pro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#modulos">Módulos (SRS)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kpis">Indicadores</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge bg-success bg-opacity-25 text-success rounded-pill px-3 py-2 border border-success border-opacity-25">
                        <i class="bi bi-hdd-network"></i> <?= $systemStatus ?>
                    </span>
                    <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Acceder
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="hero-section">
        <div class="hero-pattern"></div>
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 z-1">
                    <h1 class="hero-title">
                        Gestión Inteligente de <br><span>Insumos Agrícolas</span>
                    </h1>
                    <div class="hero-subtitle fs-5 text-muted mb-4" id="typewriter">
                        <!-- El JS escribirá aquí -->
                    </div>
                    <div class="d-flex gap-3">
                        <button class="btn btn-primary-custom btn-lg" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Iniciar Sesión <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                        <a href="#modulos" class="btn btn-outline-custom btn-lg">
                            Ver Módulos
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 z-1">
                    <div class="glass-card p-4 floating-element position-relative">
                        <div class="position-absolute top-0 end-0 p-3">
                            <span class="badge bg-danger rounded-pill"><i class="bi bi-exclamation-triangle"></i> 2 Alertas Stock</span>
                        </div>
                        <h4 class="mb-4"><i class="bi bi-cart-plus text-success me-2"></i>Simulador Venta POS Rápida</h4>
                        <div class="mb-3">
                            <label class="form-label text-muted small">Buscar Insumo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" placeholder="Ej: Fertilizante Urea 50kg" readonly value="Fertilizante Urea 50kg">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mb-4 pb-3 border-bottom">
                            <div>
                                <small class="text-muted d-block">Stock Actual: <strong class="text-success" id="demoStock">150</strong> sacos</small>
                                <span class="fs-4 fw-bold text-dark">$120.00 <small class="fs-6 text-muted">/u</small></span>
                            </div>
                            <div style="width: 120px;">
                                <label class="form-label text-muted small">Cantidad</label>
                                <input type="number" class="form-control text-center fw-bold" id="demoQty" value="1" min="1" max="200">
                            </div>
                        </div>
                        <button class="btn btn-primary-custom w-100" id="btnSimularPOS">
                            Procesar Venta <i class="bi bi-check2-circle ms-1"></i>
                        </button>
                        <div id="posAlert" class="alert alert-danger mt-3 d-none p-2 small mb-0">
                            <i class="bi bi-x-circle me-1"></i> <strong>RN01:</strong> Stock insuficiente.
                        </div>
                        <div id="posSuccess" class="alert alert-success mt-3 d-none p-2 small mb-0">
                            <i class="bi bi-check-circle me-1"></i> Venta procesada. Stock actualizado.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KPIs Section -->
    <section id="kpis" class="kpi-section shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="kpi-card">
                        <div class="kpi-number" id="kpiSales">$12,450</div>
                        <div class="kpi-label">Ventas del Día</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="kpi-card">
                        <div class="kpi-number">342</div>
                        <div class="kpi-label">Insumos Activos</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="kpi-card">
                        <div class="kpi-number text-warning">12</div>
                        <div class="kpi-label">Stock Mínimo</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="kpi-card">
                        <div class="kpi-number">35%</div>
                        <div class="kpi-label">Margen Utilidad</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modules Grid Section -->
    <section id="modulos" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="text-success fw-bold text-uppercase tracking-wider small">Ecosistema MVC</span>
                <h2 class="display-6 fw-bold text-dark mt-2">Módulos del Sistema</h2>
                <p class="text-muted fs-5 col-md-8 mx-auto">Conoce la arquitectura estructurada para el manejo eficiente de tu inventario agrícola.</p>
            </div>
            
            <div class="row g-4">
                <!-- Modulo Inventario -->
                <div class="col-md-4">
                    <div class="glass-card h-100 bg-light">
                        <div class="card-icon">
                            <i class="bi bi-boxes"></i>
                        </div>
                        <h4>Control de Inventario</h4>
                        <p class="text-muted">Gestión de stock en caliente (RN04). Agrupación por categorías: Fertilizantes, Semillas, Herbicidas.</p>
                        <ul class="list-unstyled text-muted small mt-3">
                            <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Alertas de Vencimiento</li>
                            <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Control de Mermas (RF08)</li>
                            <li><i class="bi bi-check2 text-success me-2"></i>Kardex Valorado</li>
                        </ul>
                    </div>
                </div>
                <!-- Modulo Facturacion -->
                <div class="col-md-4">
                    <div class="glass-card h-100 bg-light">
                        <div class="card-icon">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <h4>Facturación POS</h4>
                        <p class="text-muted">Procesamiento de ventas inmediato. Restricción estricta de stock negativo y cálculo de impuestos.</p>
                        <div class="mt-4">
                            <canvas id="salesChart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Modulo Roles -->
                <div class="col-md-4">
                    <div class="glass-card h-100 bg-light">
                        <div class="card-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h4>Seguridad RBAC</h4>
                        <p class="text-muted">Control de acceso basado en roles para Administrador, Vendedor y Cliente final con hashing BCRYPT.</p>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge bg-dark">Administrador</span>
                            <span class="badge bg-secondary">Vendedor</span>
                            <span class="badge bg-info text-dark">Cliente</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-1 fw-bold"><i class="bi bi-tree-fill text-success me-2"></i>AgroStock Pro v1.1</p>
            <p class="small text-white-50 mb-0">Sistema desarrollado bajo arquitectura MVC • PHP 8.3 & MySQL 8.0</p>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header bg-light border-0 p-4 pb-2">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-person-circle text-success me-2"></i>Acceso al Sistema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-2">
                    <p class="text-muted small mb-4">Selecciona un rol para autocompletar credenciales de prueba:</p>
                    
                    <div class="d-flex gap-2 mb-4">
                        <div class="p-2 border rounded text-center flex-fill role-badge" onclick="fillLogin('admin@agrostock.com', 'Admin123')">
                            <i class="bi bi-shield-check text-dark fs-4"></i><br>
                            <small class="fw-bold">Admin</small>
                        </div>
                        <div class="p-2 border rounded text-center flex-fill role-badge" onclick="fillLogin('vendedor@agrostock.com', 'Vend2026')">
                            <i class="bi bi-shop text-secondary fs-4"></i><br>
                            <small class="fw-bold">Vendedor</small>
                        </div>
                        <div class="p-2 border rounded text-center flex-fill role-badge" onclick="fillLogin('cliente@agrostock.com', 'ClientePass')">
                            <i class="bi bi-person text-info fs-4"></i><br>
                            <small class="fw-bold">Cliente</small>
                        </div>
                    </div>

                    <form id="loginForm">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" class="form-control login-input border-start-0" id="loginEmail" required placeholder="correo@ejemplo.com">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                <input type="password" class="form-control login-input border-start-0" id="loginPass" required placeholder="••••••••">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary-custom w-100 py-2" id="btnLoginSubmit">
                            Ingresar <i class="bi bi-box-arrow-in-right ms-2"></i>
                        </button>
                    </form>
                    <div id="loginLoader" class="text-center d-none mt-3">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="small text-muted mt-2 mb-0">Verificando hash BCRYPT...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Navbar Scrolled Effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.glass-nav');
            if (window.scrollY > 50) {
                nav.style.background = 'rgba(255, 255, 255, 0.95)';
                nav.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
            } else {
                nav.style.background = 'rgba(255, 255, 255, 0.85)';
                nav.style.boxShadow = '0 8px 32px 0 rgba(10, 92, 54, 0.1)';
            }
        });

        // Typewriter Effect for Hero
        const texts = [
            "Evita el inventario negativo en caliente.",
            "Factura al instante con desgloses del IVA.",
            "Calcula tus márgenes de utilidad en tiempo real."
        ];
        let count = 0;
        let index = 0;
        let currentText = '';
        let letter = '';

        (function type() {
            if (count === texts.length) count = 0;
            currentText = texts[count];
            letter = currentText.slice(0, ++index);
            
            document.getElementById('typewriter').textContent = letter;
            if (letter.length === currentText.length) {
                count++;
                index = 0;
                setTimeout(type, 2000);
            } else {
                setTimeout(type, 50);
            }
        }());

        // POS Simulator Logic
        document.getElementById('btnSimularPOS').addEventListener('click', function() {
            const qtyInput = document.getElementById('demoQty');
            const qty = parseInt(qtyInput.value);
            const stockElement = document.getElementById('demoStock');
            let currentStock = parseInt(stockElement.innerText);
            
            const alertErr = document.getElementById('posAlert');
            const alertSucc = document.getElementById('posSuccess');
            
            alertErr.classList.add('d-none');
            alertSucc.classList.add('d-none');
            
            if (qty > currentStock) {
                alertErr.classList.remove('d-none');
            } else {
                stockElement.innerText = currentStock - qty;
                alertSucc.classList.remove('d-none');
                
                // Animate KPI Sales increase
                const salesEl = document.getElementById('kpiSales');
                let currentSales = 12450;
                let added = qty * 120;
                let newSales = currentSales + added;
                
                // Simple counter animation
                let interval = setInterval(() => {
                    if(currentSales >= newSales) {
                        clearInterval(interval);
                        salesEl.innerText = '$' + newSales.toLocaleString();
                    } else {
                        currentSales += Math.ceil(added/10);
                        salesEl.innerText = '$' + currentSales.toLocaleString();
                    }
                }, 30);
            }
        });

        // Chart.js Init for Sales Demo
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                datasets: [{
                    label: 'Ventas Semanales',
                    data: [1200, 1900, 1500, 2200, 1800, 2800],
                    borderColor: '#2ECC71',
                    backgroundColor: 'rgba(46, 204, 113, 0.2)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { display: true },
                    y: { display: false }
                }
            }
        });

        // Login Mock Logic
        function fillLogin(email, pass) {
            document.getElementById('loginEmail').value = email;
            document.getElementById('loginPass').value = pass;
            
            // Visual feedback
            const badges = document.querySelectorAll('.role-badge');
            badges.forEach(b => b.style.backgroundColor = 'transparent');
            event.currentTarget.style.backgroundColor = 'rgba(10, 92, 54, 0.1)';
        }

        document.getElementById('btnLoginSubmit').addEventListener('click', function() {
            const email = document.getElementById('loginEmail').value;
            if(!email) return;
            
            const btn = this;
            const loader = document.getElementById('loginLoader');
            
            btn.classList.add('d-none');
            loader.classList.remove('d-none');
            
            setTimeout(() => {
                btn.classList.remove('d-none');
                loader.classList.add('d-none');
                
                // Simulate redirect success
                btn.classList.remove('btn-primary-custom');
                btn.classList.add('btn-success');
                btn.innerHTML = '<i class="bi bi-check2-circle me-2"></i>Acceso Concedido';
                
                setTimeout(() => {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                    modal.hide();
                    
                    // Reset button
                    btn.classList.add('btn-primary-custom');
                    btn.classList.remove('btn-success');
                    btn.innerHTML = 'Ingresar <i class="bi bi-box-arrow-in-right ms-2"></i>';
                }, 1500);
                
            }, 1200);
        });
    </script>
</body>
</html>
