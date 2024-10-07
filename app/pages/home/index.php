<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$localizacao = isset($_GET['localizacao']) ? $_GET['localizacao'] : '';

$carros = [
    [
        'marca' => 'Peugeot',
        'modelo' => '208',
        'ano' => 2020,
        'preco' => 70990.00,
        'km' => 67000,
        'imagem' => 'https://autoentusiastas.com.br/ae/wp-content/uploads/2020/09/IMG_1631.jpeg'
    ],
    [
        'marca' => 'Fiat',
        'modelo' => 'Palio',
        'ano' => 2014,
        'preco' => 40990.00,
        'km' => 130544,
        'imagem' => 'https://img2.icarros.com/dbimg/galeriaimgmodelo/2/8926_1.jpg'
    ],
    [
        'marca' => 'Hyundai',
        'modelo' => 'HB20S',
        'ano' => 2023,
        'preco' => 89290.00,
        'km' => 47105,
        'imagem' => 'https://www.webmotors.com.br/imagens/prod/348823/HYUNDAI_HB20S_1.0_TGDI_FLEX_PLATINUM_PLUS_AUTOMATICO_34882312190840753.webp'
    ],
    [
        'marca' => 'Peugeot',
        'modelo' => '208',
        'ano' => 2023,
        'preco' => 63860.00,
        'km' => 71714,
        'imagem' => 'https://www.autoo.com.br/fotos/2021/6/1280_960/peugeotnovo1_30062021_48533_1280_960.jpg'
    ],
    [
        'marca' => 'Honda',
        'modelo' => 'Civic',
        'ano' => 2023,
        'preco' => 224000.00,
        'km' => 65232,
        'imagem' => 'https://cdn.motor1.com/images/mgl/W81RXg/s1/honda-civic-sedan-e-hev-2023.jpg'
    ],
    [
        'marca' => 'Audi',
        'modelo' => 'R8',
        'ano' => 2021,
        'preco' => 1300000.00,
        'km' => 12532,
        'imagem' => 'https://s3.ecompletocarros.dev/images/lojas/285/veiculos/177015/veiculoInfoVeiculoImagesMobile/vehicle_image_1705673708_d41d8cd98f00b204e9800998ecf8427e.jpeg'
    ]
];

$filteredCarros = array_filter($carros, function($carro) use ($search) {
    return (stripos($carro['marca'], $search) !== false || stripos($carro['modelo'], $search) !== false);
});
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros UNICURITIBA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h3>Carros UNICURITIBA</h3>
        <h1 class="titulo">CARROS À VENDA</h1>
    </header>

    <section class="conteudo">
        <aside class="filtros">
            <h2>Carros</h2>
            <form method="GET" class="busca" action="">
            <input type="text" name="search" placeholder="Buscar carro..." value="<?php echo htmlspecialchars($search); ?>" />
            <button type="submit">Buscar</button>
        </form>
            <div class="localizacao">
                <label for="localizacao"><strong>Localização: </strong></label>
                <select name="localizacao" id="localizacao" class="localizacao">
                    <option value="">-- Selecione uma opção --</option>
                    <option value="Curitiba" <?php echo ($localizacao == 'Curitiba') ? 'selected' : ''; ?>>Curitiba</option>
                    <option value="Maringá" <?php echo ($localizacao == 'Maringá') ? 'selected' : ''; ?>>Maringá</option>
                    <option value="Cascavel" <?php echo ($localizacao == 'Cascavel') ? 'selected' : ''; ?>>Cascavel</option>
                    <option value="Londrina" <?php echo ($localizacao == 'Londrina') ? 'selected' : ''; ?>>Londrina</option>
                    <option value="Clevelândia" <?php echo ($localizacao == 'Clevelândia') ? 'selected' : ''; ?>>Clevelândia</option>
                </select>
            </div>

            <div class="filtros-interesse">
                <p><strong>O que é interessante pra você?</strong></p>
                <label><input type="checkbox"> Super Preço </label></br>
                <label><input type="checkbox"> Car Delivery </label></br>
                <label><input type="checkbox"> Troca com troco</label></br>
                <label><input type="checkbox"> Usado </label></br>
                <label><input type="checkbox"> Vistoriado </label></br>
            </div>
        </aside>

        <section class="produtos">
            <h2>Carros disponíveis</h2>
            <div class="lista-carros">
                <?php
                if (count($filteredCarros) > 0) {
                    foreach ($filteredCarros as $carro) {
                        // Criando a URL do carro
                        $carroLink = strtolower($carro['marca'] . '_' . $carro['modelo'] . '_' . $carro['ano'] . '.php');
                        echo '
                        <div class="carro-item">
                            <img src="' . $carro['imagem'] . '" alt="' . htmlspecialchars($carro['modelo']) . '">
                            <h3>' . htmlspecialchars($carro['marca']) . ' ' . htmlspecialchars($carro['modelo']) . '</h3>
                            <p>R$ ' . number_format($carro['preco'], 2, ',', '.') . '</p>
                            <p>' . htmlspecialchars($carro['ano']) . ' - ' . number_format($carro['km'], 0, ',', '.') . ' Km</p>
                            <button onclick="location.href=\'' . $carroLink . '\'">Ver Anúncio</button>
                        </div>';
                    }
                } else {
                    echo "<p>Nenhum carro encontrado.</p>";
                }
                ?>
            </div>
        </section>
    </section>

    <footer class="footer">
        <p>&copy; Carros UNICURITIBA. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
