<?php 

include "conexao.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $rawPostData = file_get_contents('php://input');
    $postData = json_decode($rawPostData, true);

    if($postData) {
        $nomeCompleto = $postData['nomeCompleto'];
        $email = $postData['email'];
        $senha = $postData['senha'];
        $confirmarSenha = $postData['confirmarSenha'];
        $cpf = $postData['cpf'];
        $dataNascimento = $postData['dataNascimento'];
        $sexo = $postData['sexo'];

        $query = "INSERT INTO estudante (nome_estudante, cpf, email, senha, confirmar_senha, dt_nascimento, sexo) VALUES 
        ('$nomeCompleto', '$cpf',  '$email', '$senha', '$confirmarSenha', '$dataNascimento', '$sexo')";

            if(mysqli_query($conn, $query)){
                echo "Dados inseridos com sucesso";
            }
    }
}

?>