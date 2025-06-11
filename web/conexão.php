<?php
header('Content-Type: application/json');

$host = 'mysql';
$dbname = 'loja_db';
$username = 'loja_user';
$password = 'loja123';

$resultado = [];

try{
    $pdo = new PDO("mysql:host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $resultado['conexao_pdo'] = 'Sucesso!';

    $stmt=$pdo->query("SELECT COUNT(*) as total_clientes FROM clientes");
    $total=$stmt->fetch(PDO::FETCH_ASSOC);
    $resultado['total_clientes'] = $total['total_clientes'];

    $stmt=$pdo->query("SELECT COUNT(*) as total_produtos FROM produtos");
    $total=$stmt->fetch(PDO::FETCH_ASSOC);
    $resultado['total_produtos'] = $total['total_produtos'];

    $stmt = $pdo->query("SELECT VERSION() as versao");
    $versao = $stmt->fetch(PDO::FETCH_ASSOC);
    $resultado['mysql_version'] =$version['versao'];

    $resultado['status'] ='success';
    $resultado['mensagem'] = 'Todas as conexões estão funcionando perfeitamente!';

} catch(PDOException $e) {
    $resultado['conexao.pdo'] = 'Erro:' . $e->getMessage();
    $resultado['status'] = 'error';
    $resultado['mensagem'] = 'Erro na conexão com o banco de dados';
}

try{
    $mysqli = new mysqli($host, $username, $password, $dbname);

    if($mysqli->connect_error){
        $resultado['conexao_mysqli'] ='Erro: ' . $mysqli->connect_error;
    } else{
        $resultado['conexao_mysqli'] = 'Sucesso';
        $mysqli->close();
    }
} catch(Exception $e){
    $resultado['conexao_mysqli'] = 'Erro: ' . $e->getMessage();
}

$resultado['php_version'] = phpversion();
$resultado['php_extensions'] = [
    'mysqli' => extension_loaded('mysqli') ? 'Carregada' : 'Não carregada'
];

echo json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>