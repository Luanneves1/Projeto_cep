<?php
require __DIR__ . '/../vendor/autoload.php';
use App\WebService\ViaCEP;

$dadosCEP = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cep = $_POST['cep'];
    $dadosCEP = ViaCEP::consultarCEP($cep);
    if (is_null($dadosCEP)) {
        $error = "CEP não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de CEP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Consulta de CEP</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="cep">Digite o CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
        <?php if ($error): ?>
            <div class="alert alert-danger mt-3"><?= $error ?></div>
        <?php elseif ($dadosCEP): ?>
            <div class="alert alert-success mt-3">
                <p><strong>CEP:</strong> <?= $dadosCEP['cep'] ?></p>
                <p><strong>Logradouro:</strong> <?= $dadosCEP['logradouro'] ?></p>
                <p><strong>Bairro:</strong> <?= $dadosCEP['bairro'] ?></p>
                <p><strong>Cidade:</strong> <?= $dadosCEP['localidade'] ?></p>
                <p><strong>UF:</strong> <?= $dadosCEP['uf'] ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
