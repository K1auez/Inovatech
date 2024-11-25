<?php
session_start();
include './conexao.php';

if (isset($_SESSION['mensagem'])) {
    echo "<script>
        window.onload = function() {
            alert('" . $_SESSION['mensagem'] . "');
        };
    </script>";
    unset($_SESSION['mensagem']);
}

$valor_mensal = null; // Inicializa com null para o valor mensal
$valor_anual = null;  // Inicializa com null para o valor anual

// Verificar se o usuário está logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $usuario_id = $_SESSION['usuario_id'];

    // Consulta para pegar o valor mensal na tabela formulario_lucro_mensal
    $sql_mensal = "SELECT valor_mensal FROM formulario_lucro_mensal WHERE usuario_id = ?";
    $stmt_mensal = $conexao->prepare($sql_mensal);
    
    if ($stmt_mensal) {
        $stmt_mensal->bind_param("i", $usuario_id);
        $stmt_mensal->execute();
        $result_mensal = $stmt_mensal->get_result();

        // Verifica se há valor mensal
        if ($result_mensal->num_rows > 0) {
            $row_mensal = $result_mensal->fetch_assoc();
            $valor_mensal = $row_mensal['valor_mensal']; // Atribui o valor mensal
        }

        $stmt_mensal->close();
    }

    // Consulta para pegar o valor anual na tabela formulario_lucro_anual
    $sql_anual = "SELECT valor_anual FROM formulario_lucro_anual WHERE usuario_id = ?";
    $stmt_anual = $conexao->prepare($sql_anual);
    
    if ($stmt_anual) {
        $stmt_anual->bind_param("i", $usuario_id);
        $stmt_anual->execute();
        $result_anual = $stmt_anual->get_result();

        // Verifica se há valor anual
        if ($result_anual->num_rows > 0) {
            $row_anual = $result_anual->fetch_assoc();
            $valor_anual = $row_anual['valor_anual'];
        }

        $stmt_anual->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="./img/logo-foguete.png" type="image/x-icon">
    <title>InovaTech</title>
</head>
<body>

<div class="header">
<div class="box-logo"><img src="./img/logosemfoguete.png"></div>
    <div class="links">
        <a class="home" href="#home">Home</a>
        <a class="sobre" href="#sobre">Sobre</a>
        <a class="contato" href="#contato">Contato</a>
    </div>

    <div class="autenticacao">
    <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<span><a class="btn-sair" href="./logout.php">Sair<ion-icon name="exit-outline"></ion-icon></a></span>';
                } else {
                    echo '<a class="login" href="./login.php">login</a>';
                    echo '<a class="cadastro" href="./cadastro.php">Cadastre-se</a>';
                }
    ?>
    </div>
</div>

<div class="inicio">
  <div class="container_info">
   <h1>Veja além da <span>tecnologia</span> com nosso <span>aplicativo</span>!</h1>
   <a class="btn_inicio" href="#planos_pagamento">Baixe já!</a>
   </div>
  <img class="img_inicio" src="./img/ambiente-ia.png">
</div>

<ul class="glass">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>

<main>
<div class="container_sobre"><h1>Se você deseja <span>elevar</span> sua loja e marca a um novo patamar de <span>sucesso</span>, está no lugar certo.</h1></div>


<div class="tablet">
    <div class="border2">
        <div class="yt-box1">
        <video src="./img/Cópia de Vídeo PITCH InovaTech - SENAI.mp4" muted controls></video>
                <h2>COMO TORNAR SEU NEGOCIO 10X MAIS LUCRATIVO?!</h2>
            <div class="yt-infos">
                <div class="yt-row">
                <img src="./img/logo-foguete.png">
                <div class="yt-profile">
                <p class="profile">InovaTech<ion-icon name="checkmark-circle-outline"></ion-icon></p>
                <p class="inscritos">1.2 M inscritos</p>
                </div>
                <p class="yt-btn"><ion-icon name="notifications-outline"></ion-icon>Increver-se</p>
                </div>
                <div class="yt-row">
                <p class="yt-btn"><ion-icon name="thumbs-up-outline"></ion-icon>497 mil</p>
                <p class="yt-btn"><ion-icon name="arrow-redo-outline"></ion-icon>Compartilhar</p>
                <p class="yt-btn"><ion-icon name="download-outline"></ion-icon>Download</p>
                <p class="yt-btn"><ion-icon name="ellipsis-horizontal-outline"></ion-icon></p>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="sobre" class="container_box0">
<div class="light-effect"></div>
<div class="light-effect"></div>
<div class="light-effect"></div>

<div class="container_box1">
    <div class="container_box_texto">
    <h2>Quem somos nós</h2>
    <p class="texto-containerbox">Somos a TechForge, trazendo o InovaTech como um aplicativo de realidade aumentada que transforma a experiência visual. Como uma equipe de cinco jovens visionários, estamos comprometidos em oferecer soluções tridimencionais únicas para empresas, revolucionando o futuro dos negócios. Junte-se a nós! </p>
    </div>
</div>
</div>

<div class="container_box0">
<div class="container_box2">
    <div class="container_box_texto">
    <h2>Sobre o aplicativo</h2>
    <p class="texto-containerbox">Explore nossa inovadora tecnologia de realidade virtual! Nosso aplicativo permite visualizar produtos tridimensionalmente na tela do seu celular, utilizando a câmera para integrá-los ao seu ambiente. Assista ao vídeo ao lado e transforme sua experiência de compras! </p>
    </div>
</div>
</div>

<div class="container_box0">
<div class="container_box1">
    <div class="container_box_texto">
    <h2>Decole sua marca a um novo patamar!</h2>
    <p class="texto-containerbox">Com a integração do InovaTech em seu negócio, oferecemos uma experiência de compra mais realista e envolvente. Nosso produto não só aumenta a confiança do cliente, mas também reduz as devoluções, oferecendo uma experiência de compra segura e divertida. Não perca tempo e decole suas vendas! </p>
    </div>
</div>
</div>

<div class="container_box0">
<div class="container_box2">
    <div class="container_box_texto">
    <h2>Dados</h2>
    <p class="texto-containerbox">A implementação bem-sucedida do InovaTech pode potencialmente aumentar os lucros da sua empresa em até 7,2%. Isso é alcançado através de um aumento de 10% nas taxas de conversão, uma redução de 10% nas taxas de devolução e um aumento de 5% no ticket médio devido a compras por impulso. </p>
    </div>
</div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const elements = document.querySelectorAll('.container_box_texto');
    
    function checkVisibility() {
      elements.forEach(element => {
        const rect = element.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
          element.classList.add('show');
        }
      });
    }

    window.addEventListener('scroll', checkVisibility);
    checkVisibility(); // Verifica imediatamente ao carregar a página
  });
</script>

<!-- <div class="luz">
            <label class="switch">
                <input type="checkbox" class="cb" name="toggle">
                <span class="toggle">
                    <span class="left">OFF</span>  
                    <span class="right">ON</span>  
                </span>
            </label>
            <div id="info"></div>
        <script>
        const checkbox = document.querySelector('.cb');
        const info = document.getElementById('info');

        const info1 = 'This is info1, which appears when the checkbox is checked.';
        const info2 = 'This is info2, which appears when the checkbox is unchecked.';

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                info.textContent = info1;
            } else {
                info.textContent = info2;
            }
        });

        checkbox.dispatchEvent(new Event('change'));
    </script>
</div> -->

</main>

<div id="planos_pagamento" class="planos_pagamento">

   <div class="cardContainer">
    <div class="card">
        <h1>Mensal</h1>
        <div class="price-container">
        <span>R$</span>
            <span><?php echo isset($valor_mensal) ? number_format($valor_mensal, 2, ',', '.') : '...'; ?></span>
            <span>/mês</span>
        </div>
        <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($result_mensal->num_rows > 0) {
        echo '<a href="assinaturaMensal.php" class="btn-price" id="openModalBtn">Finalizar</a>';
    } else {
        echo '<button class="btn-price" id="openModalBtn">Calcular orçamento</button>';
    }
} else {
    echo '<button class="btn-price" id="openModalBtn">Calcular orçamento</button>';
}
?>
    </div>
   </div>

   <div id="myModal" class="modal">
    <!-- Conteúdo do Modal -->
    <div class="modal-content">
      <span class="closeBtn">&times;</span>
      <h2>Plano mensal</h2>
      <p>Nossa precificação é baseada em valor: cobramos 7% do lucro bruto mensal da sua empresa. Esse approach alinha nossos interesses ao sucesso da sua empresa, garantindo que nossa remuneração esteja diretamente vinculada ao seu desempenho financeiro. Para mais detalhes ou ajustes, entre em contato conosco. </p>
      <form action="./orcamentoMensal.php" method="post" enctype="multipart/form-data">
      <label for="lucro">Lucro Bruto do Último Mês:</label><br>
      <input type="number" id="lucro" name="lucro" placeholder="R$" required>
      <label for="file">Anexar Comprovante de Rendimento (PDF, Excel):</label>
      <input class="file-input" type="file" id="file" name="file" accept=".pdf, .xls, .xlsx" required>
      <button type="submit">Enviar</button>
      </form>
    </div>
  </div>

   <div class="cardContainer">
    <div class="card">
        <h1>Anual</h1>
        <div class="price-container">
        <span>R$</span>
            <span><?php echo isset($valor_anual) ? number_format($valor_anual, 2, ',', '.') : '...'; ?></span>
            <span>/mês</span>
        </div>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            if ($result_anual->num_rows > 0) {
                echo '<a href="assinaturaAnual.php" class="btn-price" id="openModalBtn2">Finalizar</a>';
            } else {
                echo '<button class="btn-price" id="openModalBtn2">Calcular orçamento</button>';
            }
        } else {
            echo '<button class="btn-price" id="openModalBtn2">Calcular orçamento</button>';
        }
        ?>
    </div>
   </div>

   <div id="myModal2" class="modal">
  <div class="modal-content">
    <span class="closeBtn2">&times;</span>
    <h2>Plano anual</h2>
    <p>Nossa precificação é baseada em valor: cobramos 2% do lucro bruto anual da sua empresa. Esse approach alinha nossos interesses ao sucesso da sua empresa, garantindo que nossa remuneração esteja diretamente vinculada ao seu desempenho financeiro. Para mais detalhes ou ajustes, entre em contato conosco.</p>
    <form action="./orcamentoAnual.php" method="post" enctype="multipart/form-data">
      <label for="lucro2">Lucro Bruto do Último Ano:</label><br>
      <input type="number" id="lucro2" name="lucro2" placeholder="R$" required>
      <label for="file2">Anexar Comprovante de Rendimento (PDF, Excel):</label>
      <input class="file-input" type="file" id="file2" name="file2" accept=".pdf, .xls, .xlsx" required>
      <button type="submit">Enviar</button>
    </form>
  </div>
</div>

</div>

<div class="container-contato" id="contato">
    <div class="container_box_ctt">
        <div class="contato-texto">
            <h1>Entre em <span>contato</span></h1>
            <p>Converse diretamente com nossa equipe. Junte-se a nós nessa parceria ou de seu depoimento!</p>
        </div>
        <form method="POST" action="./contato-insert.php" class="contato-inputs">
        <input type="text" name="assunto" class="input" for="input-assunto" placeholder="Assunto"/>
        <div class="input-row">
            <input type="text" name="nome" class="input" for="input-nome" id="input-nome" placeholder="Nome da empresa"/>
            <input type="text" name="tipo" class="input" for="input-tipo" id="input-tipo" placeholder="Tipo de empresa"/>
        </div>
        <div class="input-row">
            <input type="text" name="email" class="input" for="input-email" id="input-email" placeholder="E-mail"/>
            <input type="text" name="telefone" class="input" for="input-telefone" id="input-telefone" placeholder="Telefone"/>
        </div>
        <input type="text" name="mensagem" class="input" for="input-mensagem" placeholder="Mensagem"/>
        <div class="radios">
            <p>Como nos conheceu:</p>
            <div class="checkbox">
                <input type="radio" name="radio" value="indicacao" id="indicacao">
                <label for="indicacao">Indicação</label>
            </div>
            <div class="checkbox">
                <input type="radio" name="radio" value="instagram" id="instagram">
                <label for="instagram">Instagram</label>
            </div>
            <div class="checkbox">
                <input type="radio" name="radio" value="facebook" id="facebook">
                <label for="facebook">Facebook</label>
            </div>
            <div class="checkbox">
                <input type="radio" name="radio" value="google" id="google">
                <label for="google">Google</label>
            </div>
            <div class="checkbox">
                <input type="radio" name="radio" value="linkedin" id="linkedin">
                <label for="linkedin">Linkedin</label>
            </div>
            <div class="checkbox">
                <input type="radio" name="radio" value="outro" id="outro">
                <label for="outro">Outro</label>
            </div>
        </div>
        <button class="contato-btn" type="submit">Enviar</button>
    </form>
    </div>
</div>

<footer>
    <img src="./img/planeta.png">

    <div class="responsive-footer-1">
    <div class="container-footer">  
        <div class="footer-links">
        <h3><span>Companhia</span></h3>
        <div class="underline"><div class="span"></div></div>
        <a class="linksfot" href="./footer/sobre-inovatech.pdf" download="sobre-inovatech.pdf">Sobre nós</a>
        <a class="linksfot" href="./footer/politica-inovatech.pdf" download="politica-inovatech.pdf">Política de privacidade</a>
        </div>
    </div>
    <div class="container-footer">
        <div class="footer-links">
        <h3><span>Ajuda</span></h3>
        <div class="underline"><div class="span"></div></div>
        <a class="linksfot" href="./footer/faq-inovatech.pdf" download="faq-inovatech.pdf">FAQ</a>
        <a class="linksfot" href="./footer/retorno-inovatech.pdf" download="retorno-inovatech.pdf">Retornos</a>
        <a class="linksfot" href="./footer/pagamento-inovatech.pdf" download="pagamento-inovatech.pdf">Opções de pagamento</a>
        </div>
    </div>
    </div><!-- responsive-footer-1 -->
    <div class="responsive-footer-1">
    <div class="container-footer">
        <div class="footer-links">
        <h3><span>Dos criadores</span></h3>
        <div class="underline"><div class="span"></div></div>
        <a class="linksfot" href="https://www.linkedin.com/in/mariana-ferreira-morgado/">Mariana Ferreira</a>
        <a class="linksfot" href="https://www.linkedin.com/in/kau%C3%AA-de-souza-83380826b/">Kauê de Souza</a>
        <a class="linksfot" href="https://www.linkedin.com/in/emilly-vilela-88a80726b/">Emilly Vilela</a>
        <a class="linksfot" href="">Kauã Roberto</a>
        <a class="linksfot" href="https://www.linkedin.com/in/gabriel-ara%C3%BAjo-rovida/">Gabriel Rovida</a>
        </div>
    </div>
    <div class="container-footer">
        <div class="footer-links">
        <h3><span>Redes sociais</span></h3>
        <div class="underline"><div class="span"></div></div>
        <a class="footer-icon" href="https://www.instagram.com/techforge_/"><ion-icon name="logo-instagram"></ion-icon> Instagram</a>
        <a class="footer-icon" href="https://www.linkedin.com/in/techforge-solutions-7224492b2/"><ion-icon name="logo-linkedin"></ion-icon> Linkedin</a>
        </div>
    </div>
    </div><!-- responsive-footer-1 -->
</footer>

</body>
<script src="script.js"></script>
</html>