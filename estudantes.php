<?php 

require "conexao.php";
$query = "select * from estudante";
if($is_query_run = mysqli_query($conn, $query)){
    $userData = [];
    while($query_executed = mysqli_fetch_assoc($is_query_run)){
        $userData[] = $query_executed;
    }
}
else{
    echo "Erro na execução!";
}

echo json_encode($userData);

?>