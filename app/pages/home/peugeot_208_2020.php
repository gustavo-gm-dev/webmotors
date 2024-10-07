<?php
$carro = [
    'marca' => 'Peugeot',
    'modelo' => '208',
    'ano' => 2020,
    'preco' => 70990.00,
    'km' => 67000,
    'imagem' => 'https://autoentusiastas.com.br/ae/wp-content/uploads/2020/09/IMG_1631.jpeg',
    'descricao' => 'Peugeot 208 2020 em excelente estado, com apenas 67.000 km rodados. O carro possui ar-condicionado, direção hidráulica e todos os serviços em dia.',
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $carro['marca'] . ' ' . $carro['modelo']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?php echo $carro['marca'] . ' ' . $carro['modelo']; ?></h1>
    </header>

    <section class="detalhes">
        <img src="<?php echo $carro['imagem']; ?>" alt="<?php echo $carro['modelo']; ?>">
        <h2>Detalhes do Carro</h2>
        <p><strong>Ano:</strong> <?php echo $carro['ano']; ?></p>
        <p><strong>Preço:</strong> R$ <?php echo number_format($carro['preco'], 2, ',', '.'); ?></p>
        <p><strong>Km:</strong> <?php echo number_format($carro['km'], 0, ',', '.'); ?> Km</p>
        <p><strong>Descrição:</strong> <?php echo $carro['descricao']; ?></p>
    </section>

    <footer>
        <p>&copy; Carros UNICURITIBA. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
