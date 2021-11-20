<?php
$nome = $_POST['nome'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$resultado = $peso / ($altura**2);

$sql = "INSERT INTO cadastro (nome, peso, altura, resultado) 
        VALUES (:nome, :peso, :altura, :resultado);";

$statement = $conn->prepare($sql);
$statement->bindParam(':nome', $nome);
$statement->bindParam(':peso', $peso);
$statement->bindParam(':altura', $altura);
$statement->bindParam(':resultado', $resultado);



$statement->execute();

echo $twig->render('calculaImc.html', [
    'nome' => $nome,
    'resultado' => number_format($resultado,2)  
]);

switch ($resultado){
    case ($resultado < 18.5);
    echo "Você esta abaixo de seu peso. Seu IMC e: ". number_format($resultado,1,',','') .PHP_EOL;
    break;
    case ($resultado >= 18.5 && $resultado <= 24.9);
    echo "Parabens!!! Voce esta no seu peso ideal. Seu IMC e: ". number_format($resultado,1,',','') .PHP_EOL;
    break;
    case ($resultado >= 25.0 && $resultado <= 29.9);
    echo "Você está acima de seu peso (sobrepeso). Seu IMC e: ". number_format($resultado,1,',','') .PHP_EOL;
    break;
    case ($resultado >= 30.0 && $resultado <= 34.9);
    echo "Você está com Obesidade grau I. Seu IMC e: ". number_format($resultado,1,',','') .PHP_EOL;
    break;
    case ($resultado > 34.9);
    echo "Você está com Obesidade grau II (severa). Seu IMC e: ". number_format($resultado,1,',','') .PHP_EOL;
    break;
}
