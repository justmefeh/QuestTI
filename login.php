<?php

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM estudantes WHERE email = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
       
        $usuario = $resultado->fetch_assoc();

        if (password_verify($senha, $usuario['senha_hash'])) {
            // Login bem-sucedido
            echo json_encode(['success' => true]);
        } else {
            // Senha incorreta
            echo json_encode(['success' => false, 'message' => 'Senha incorreta']);
        }
    } else {
        // Usuário não encontrado
        echo json_encode(['success' => false, 'message' => 'Usuário não encontrado']);
    }

    $stmt->close();
}

$conn->close();
?>
