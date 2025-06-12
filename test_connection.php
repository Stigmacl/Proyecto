<?php
require_once 'database/connection.php';

echo "<h1>🔧 Test de Conexión - Tactical Ops 3.5 Chile</h1>";

try {
    $conn = getDBConnection();
    echo "<p style='color: green;'>✅ Conexión exitosa a la base de datos MySQL!</p>";
    
    // Probar consulta de usuarios
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM users");
    $stmt->execute();
    $result = $stmt->fetch();
    echo "<p>👥 <strong>Usuarios registrados:</strong> " . $result['total'] . "</p>";
    
    // Probar consulta de clanes
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM clans");
    $stmt->execute();
    $result = $stmt->fetch();
    echo "<p>🛡️ <strong>Clanes creados:</strong> " . $result['total'] . "</p>";
    
    // Probar consulta de noticias
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM news");
    $stmt->execute();
    $result = $stmt->fetch();
    echo "<p>📰 <strong>Noticias publicadas:</strong> " . $result['total'] . "</p>";
    
    // Probar consulta de logros
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM achievements");
    $stmt->execute();
    $result = $stmt->fetch();
    echo "<p>🏆 <strong>Logros disponibles:</strong> " . $result['total'] . "</p>";
    
    // Mostrar usuario admin
    $stmt = $conn->prepare("SELECT username, email, role FROM users WHERE role = 'admin'");
    $stmt->execute();
    $admin = $stmt->fetch();
    
    if ($admin) {
        echo "<div style='background: #e8f5e8; padding: 15px; border-radius: 8px; margin: 20px 0;'>";
        echo "<h3>🔐 Usuario Administrador:</h3>";
        echo "<p><strong>Usuario:</strong> " . $admin['username'] . "</p>";
        echo "<p><strong>Email:</strong> " . $admin['email'] . "</p>";
        echo "<p><strong>Rol:</strong> " . $admin['role'] . "</p>";
        echo "<p><strong>Contraseña:</strong> tacticalopschile2025</p>";
        echo "</div>";
    }
    
    echo "<div style='background: #e8f4fd; padding: 15px; border-radius: 8px; margin: 20px 0;'>";
    echo "<h3>🚀 APIs Disponibles:</h3>";
    echo "<ul>";
    echo "<li><strong>Autenticación:</strong> /api/auth.php</li>";
    echo "<li><strong>Usuarios:</strong> /api/users.php</li>";
    echo "<li><strong>Noticias:</strong> /api/news.php</li>";
    echo "<li><strong>Comentarios:</strong> /api/comments.php</li>";
    echo "<li><strong>Mensajes:</strong> /api/messages.php</li>";
    echo "<li><strong>Clanes:</strong> /api/clans.php</li>";
    echo "</ul>";
    echo "</div>";
    
    echo "<p style='color: blue;'>🎮 <strong>¡Base de datos lista para Tactical Ops 3.5 Chile!</strong></p>";
    
} catch(Exception $e) {
    echo "<p style='color: red;'>❌ <strong>Error de conexión:</strong> " . $e->getMessage() . "</p>";
    echo "<div style='background: #ffe8e8; padding: 15px; border-radius: 8px; margin: 20px 0;'>";
    echo "<h3>🔧 Posibles soluciones:</h3>";
    echo "<ul>";
    echo "<li>Verifica que MySQL esté corriendo en XAMPP</li>";
    echo "<li>Asegúrate de que la base de datos 'tactical_ops_chile' existe</li>";
    echo "<li>Revisa las credenciales en database/connection.php</li>";
    echo "<li>Verifica que el puerto 3306 esté disponible</li>";
    echo "</ul>";
    echo "</div>";
}
?>