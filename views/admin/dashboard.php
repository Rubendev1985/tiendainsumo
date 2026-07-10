<?php
session_start();

if (!isset($_SESSION['usuario']) || ($_SESSION['usuario']['id_rol'] != 1 && $_SESSION['usuario']['id_rol'] !== '1')) {
    header('Location: ../../views/auth/login.php');
    exit;
}

require_once __DIR__ . '/../../config/database.php';

$result = $conn->query('SELECT id_rol, COUNT(*) as total FROM usuarios GROUP BY id_rol');
$totalVendedores = 0;
$totalClientes = 0;
$totalAdmins = 0;
while ($row = $result->fetch_assoc()) {
    if ($row['id_rol'] == 1)
        $totalAdmins = $row['total'];
    if ($row['id_rol'] == 2)
        $totalVendedores = $row['total'];
    if ($row['id_rol'] == 3)
        $totalClientes = $row['total'];
}
$totalUsuarios = $totalAdmins + $totalVendedores + $totalClientes;

// Dummy values for other stats until models are created
$totalProductos = 0;
$totalPedidos = 0;

$titulo = 'Dashboard Administrador';
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../layouts/sidebaradmin.php';
?>

<div class="space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card Clientes -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-blue-100 text-green-600 flex items-center justify-center text-2xl">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Clientes</p>
                <p class="text-2xl font-bold text-slate-800"><?= $totalClientes ?></p>
            </div>
        </div>

        <!-- Card Vendedores -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-2xl">
                <i class="fas fa-user-tie"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Vendedores</p>
                <p class="text-2xl font-bold text-slate-800"><?= $totalVendedores ?></p>
            </div>
        </div>

        <!-- Card Productos -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                <i class="fas fa-box"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Productos</p>
                <p class="text-2xl font-bold text-slate-800"><?= $totalProductos ?></p>
            </div>
        </div>

        <!-- Card Pedidos -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-2xl">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Pedidos</p>
                <p class="text-2xl font-bold text-slate-800"><?= $totalPedidos ?></p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Próximos Eventos o Accesos Rápidos -->
        <div class="bg-white rounded-2xl shadow p-6 border border-slate-200">
            <h3 class="text-xl font-bold text-slate-800 mb-6">Accesos Rápidos</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="usuarios.php" class="p-4 border rounded-xl hover:bg-slate-50 transition flex flex-col items-center gap-2">
                    <i class="fas fa-user-plus text-blue-600 text-xl"></i>
                    <span class="text-sm font-medium">Nuevo Usuario</span>
                </a>
                <a href="productos.php" class="p-4 border rounded-xl hover:bg-slate-50 transition flex flex-col items-center gap-2">
                    <i class="fas fa-box text-green-600 text-xl"></i>
                    <span class="text-sm font-medium">Productos</span>
                </a>
                <a href="categorias.php" class="p-4 border rounded-xl hover:bg-slate-50 transition flex flex-col items-center gap-2">
                    <i class="fas fa-tags text-purple-600 text-xl"></i>
                    <span class="text-sm font-medium">Categorías</span>
                </a>
                <a href="ventas.php" class="p-4 border rounded-xl hover:bg-slate-50 transition flex flex-col items-center gap-2">
                    <i class="fas fa-shopping-cart text-orange-600 text-xl"></i>
                    <span class="text-sm font-medium">Ventas</span>
                </a>
            </div>
        </div>

        <!-- Resumen de Sistema -->
        <div class="bg-white rounded-2xl shadow p-6 border border-slate-200">
            <h3 class="text-xl font-bold text-slate-800 mb-6">Estado del Sistema</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-500"></div>
                        <span class="text-slate-700 font-medium">Base de Datos</span>
                    </div>
                    <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded">CONECTADO</span>
                </div>
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-clock text-slate-400"></i>
                        <span class="text-slate-700 font-medium">Hora del Servidor</span>
                    </div>
                    <span class="text-sm text-slate-500"><?= date('H:i:s d/m/Y') ?></span>
                </div>
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-shield-alt text-slate-400"></i>
                        <span class="text-slate-700 font-medium">Nivel de Acceso</span>
                    </div>
                    <span class="text-sm font-bold text-blue-600">ADMINISTRADOR</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>