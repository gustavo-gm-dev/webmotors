<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender Carro - Veículo Usado ou Seminovo</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/cadastrar_anuncio.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<?php
//conexão com o banco de dados
// include '../../../config/connection_db.php';

//Valida se usuario está atenticado
// include '../utils/autentication.php';
session_start();
// session_destroy(); 

// Definir a etapa inicial se não existir
if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 0;
}

$val_erro = 0;

// Processa os dados enviados do formulário e avança para a próxima etapa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica qual etapa foi enviada e processa os dados
    if (isset($_POST['submit_step_1']) && $_SESSION['step'] == 0) {
        // Processar dados da primeira etapa
        if (!empty($_POST['val_placa'])) {
            $_SESSION['val_placa'] = $_POST['val_placa'];
            $_SESSION['step'] = 1;  // Avançar para a próxima etapa
        } else {
            echo "Por favor, preencha a placa do carro.";
        }

    } elseif (isset($_POST['submit_step_2']) && $_SESSION['step'] == 1) {
        // Processar dados da segunda etapa
        if (!empty($_POST['quilometragem'])) {
            $_SESSION['quilometragem'] = $_POST['quilometragem'];
        } else {
            echo "Por favor, preencha a quilometragem do carro.";
            $val_erro = 1;
        }

        if (!empty($_POST['preco'])) {
            $_SESSION['preco'] = $_POST['preco'];
        } else {
            echo "Por favor, preencha a preco do carro.";
            $val_erro = 1;
        }

        // Receber os valores dos opcionais
        if (isset($_POST['opcionais'])) {
            $_SESSION['opcionais'] = $_POST['opcionais'];
        }

        // Receber os valores das condições
        if (isset($_POST['condicoes'])) {
            $_SESSION['condicoes'] = $_POST['condicoes'];
        }
        if(!$val_erro > 0) {
            $_SESSION['step'] = 2;  // Avançar para a próxima etapa
        }

    } elseif (isset($_POST['submit_step_3']) && $_SESSION['step'] == 2) {
        // Processar dados da terceira etapa
        if (isset($_POST['email'])) {
            $_SESSION['email'] = $_POST['email'];
        } else {
            echo "Por favor, preencha o email.";
            $val_erro = 1;
        }

        if (isset($_POST['nome'])) {
            $_SESSION['nome'] = $_POST['nome'];
        } else {
            echo "Por favor, preencha o nome completo.";
            $val_erro = 1;
        }

        if (isset($_POST['nascimento'])) {
            $_SESSION['nascimento'] = $_POST['nascimento'];
        } else {
            echo "Por favor, preencha a data nascimento.";
            $val_erro = 1;
        }

        if (isset($_POST['cpf'])) {
            $_SESSION['cpf'] = $_POST['cpf'];
        } else {
            echo "Por favor, preencha o cpf.";
            $val_erro = 1;
        }

        if (isset($_POST['telefone'])) {
        $_SESSION['telefone'] = $_POST['telefone'];
        } else {
            echo "Por favor, preencha o telefone.";
            $val_erro = 1;
        }

        if (isset($_POST['cep'])) {
            $_SESSION['cep'] = $_POST['cep'];
        } else {
            echo "Por favor, preencha o cep.";
            $val_erro = 1;
        }
        if(!$val_erro > 0) {
            $_SESSION['step'] = 3;  // Avançar para a próxima etapa
        }
    } elseif (isset($_POST['submit_step_4']) && $_SESSION['step'] == 3) {
        if (isset($_FILES['images'])) {
            
            // Define o diretório onde as imagens serão salvas
            $uploadDir = 'uploads/';
            
            // Verifica se o diretório de upload existe, senão cria
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            // Limite de até 8 imagens
            $numFiles = count($_FILES['images']['name']);
            if ($numFiles > 8) {
                echo "Você só pode enviar até 8 imagens.";
                $val_erro = 1;
            }
    
            if (!isset($val_erro) || $val_erro == 0) {
                // Processa cada imagem
                for ($i = 0; $i < $numFiles; $i++) {
                    // Obter nome temporário e nome do arquivo original
                    $fileTmpName = $_FILES['images']['tmp_name'][$i];
                    $fileName = basename($_FILES['images']['name'][$i]);
                    $currentTimestamp = time();
                    $formattedDate = date('Y-m-d-H-i-s', $currentTimestamp);
                    $newFileName = $_SESSION['val_placa'] . '_' . $formattedDate . '_' . $fileName;
                    $uploadFile = $uploadDir . $i . $newFileName;
                    
                    // Verifica se o upload foi bem-sucedido
                    if (move_uploaded_file($fileTmpName, $uploadFile)) {
                        $_SESSION['step'] = 4;
                    } else {
                        $_SESSION['step'] = 5;
                        session_destroy();
                    }
                }
            } else {
                $_SESSION['step'] = 5;
                session_destroy();
            }
        }
    }
    
}
?>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <div class="navbar-logo-solo">
                <img class="image-logo-solo" alt="Webmotors Logo" src="../../../public/image/logo.svg">
            </div>
        </div>
    </div>
    <div class="step">
        <div class="step-one">
            <div class="step-content">
                <div class="step-icon">
                    <img class="icon-step" src="../../../public/image/counter_1.svg" alt="step_1">
                </div>
                <span class="step-text">Preencha os dados do veículo</span>
            </div>
            <div class="step-progress">
                <div class="step-progress-completed"></div>
            </div>
        </div>
        <div class="step-two">
            <div class="step-content">
                <div class="step-icon">
                    <img class="icon-step" src="../../../public/image/counter_2.svg" alt="step_2">
                </div>
                <span class="step-text">Destaque seu anúncio</span>
            </div>
            <div class="step-progress">
                <div class="step-progress-completed"></div>
            </div>
        </div>
        <div class="step-three">
            <div class="step-content">
                <div class="step-icon">
                    <img class="icon-step" src="../../../public/image/counter_3.svg" alt="step_3">
                </div>
                <span class="step-text">Contrate um plano e finalize seu anúncio</span>
            </div>
            <div class="step-progress">
                <div class="step-progress-completed"></div>
            </div>
        </div>
    </div>
<?php
    switch ($_SESSION['step']) {
        case 0:
            include '1_dados_veículo_placa.html';
            break;
        case 1:
            include '2_dados_veículo_principal.html';
            break;
        case 2:
            include '3_dados_veículo_perfil.html';
            break;
        case 3:
            include '4_dados_veículo_imagem.html';
            break;
        case 4:
            include '5_dados_veículo_confirm.html';
            break;
        case 5:
            include '6_dados_veículo_error.html';
            break;
    }
?> 
</body>
</html>