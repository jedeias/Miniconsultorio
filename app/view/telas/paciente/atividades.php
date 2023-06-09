<?php

include("../../../autoload.php");


$session = new Session();

$nome = $session->get('nome');
$email = $session->get('email');
$type = $session->get('type');
$paci_id = $session->get('id');
$psico_id = $session->get('fk_psicologo');

$selecionar = new Select();
$dados = $selecionar->getDados($paci_id);
$responsavel = $selecionar->getDadosResponsavel($paci_id);
$psicologo = $selecionar->getDadosPsicologoPaciente($paci_id);
$imagem = $selecionar->getImagem($paci_id);

$imagem = $imagem['imagem'];

if($nome == NULL and $email == NULL and $type == NULL){
    header("location: ../../../index.php");
}
 
if($type != "paciente"){
     header("location: ../{$type}/{$type}.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anotações</title>
    <link rel="stylesheet" href="../../CSS/styleatividades.css">
</head>
<body>
<header class="header-container">
    <h1>ANOTE-ME</h1>
    <div class="container-notif">

        <!--notificação-->
        <?php 
            $notificacao = new Select();
            $sessao = $notificacao->notificacaoPaciente($paci_id);                
        ?>            
        <div class="com-notifiacao" id="noti" onclick="click_noti()">                
            <div class="<?php echo $sessao['lida'] == null  ? 'aviso-block' : 'aviso-none';?>" id="aviso">
                <span>!</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
            </svg>
        </div>

        <div class="vazio" id="notificacoes">
            <?php 
                if($sessao != null){
                    echo '<p> voce tem uma sessão marcada para: </p>';
                    echo '<li> dia: ' . $sessao['data_formatada'] . '</li>';
                    echo '<li> horario: ' .$sessao['horario'] . '</li>';
                    if($sessao['lida'] == null){
                        $crud = new Crud();
                        $updateNotificacao = $crud->notificacaoLida($paci_id);
                    }
                    echo '<a href="./calendario.php">Consultar agenda</a>';
                }else{

                    echo '<p> voce não tem consultas marcadas: </p>';
                    echo '<li> dia: </li>';
                    echo '<li> horario: </li>';
                    
                }      
            ?>
        </div>
        <script>                          
            let btn_noti = document.getElementsById('noti'); 
            function click_noti(){                    
                let mensagemLida = <?php echo $sessao['lida'] ? 'true' : 'false';?>;                                  
                let notificacao = document.getElementById('notificacoes');
                notificacao.classList.toggle('notification');
                
            }
        </script>

        <figure id="wrapperButton" class="click-perfil" onclick="ClickPerfil()">
            <?php if(isset($imagem) && $imagem != NULL): ?>
                <img src="<?php echo "../../IMG/imagem_perfil/$imagem"; ?>" alt="" class='perfil' id='first-perfil'>
            <?php else: ?>
                <img src="../../IMG/default.jpg" alt="" class='perfil'>
            <?php endif; ?>
        </figure>

        <div class="click-wrapper">
            <nav class="dados-wrapper hidden" id="wrapper-content">
                <ul class="lista-dados">
                    <li class="center">
                        <?php if(isset($imagem) && $imagem != NULL): ?>
                            <img src="<?php echo "../../IMG/imagem_perfil/$imagem"; ?>" alt="FOTO-DE-PERFIL" class='perfil' id='second-perfil'>
                        <?php else: ?>
                            <img src="../../IMG/default.jpg" alt="" class='perfil'>
                        <?php endif; ?>
                    </li>
                    <li class="center"><?php echo "$nome"; ?></li>
                    <div class='lista-dados-content'>
                        <li class="dados-title">Email</li>
                        <li><?php echo $email; ?></li>
                        <hr>
                        <li class="dados-title">Telefone</li>
                        <li><?php echo $dados[0]['numero']; ?></li>
                        <hr>
                        <li class="dados-title">Responsável</li>
                        <li><?php echo $responsavel[0]['nome']; ?></li>
                        <hr>
                        <li class="dados-title">Tel. Responsável</li>
                        <li><?php echo $responsavel[0]['numero_responsavel']; ?></li>
                        <hr>
                        <li class="dados-title">Psicologo</li>
                        <li><?php echo $psicologo[0]['nome_psicologo'];?></li>
                        <hr>
                    </div>
                    <li class="config-container">
                        <a class="config-button" href="../atualizar_registro.php"><img class="wrapper-icon" src="../../IMG/ico/gear-svgrepo-com.svg" title="Configurações"></a>
                        <a class="config-button" href="../../sair.php"><img class="wrapper-icon" src="../../IMG/ico/arrow-from-shape-right-svgrepo-com.svg" title="Sair"></a>
                    </li>
        
                </ul>
            </nav>
        </div>

    </div>
</header>    
    <section class="activity-container">
        <section class="menu-container">
            <nav class="menu">
                <ul>
                    <a href="paciente.php">
                    <li class="anotacoes">
                        <p>Anotações</p>
                    </li>
                    </a>   
                    <li class="agenda-consultas">
                        <p>Atividades Recomendadas</p>
                    </li>
                    <a href="calendario.php">
                        <li class="agenda-consultas">
                            <p>Agenda</p>
                        </li>
                    </a>
                </ul>
            </nav>
        </section>
        <section class="activity-content">
            <?php

            $select = new Select();

            $atividades = $select->select_atividades($psico_id, $paci_id);
            foreach ($atividades as $atividade) {
                echo "<article class='paciente-atividade'>";
                    echo "<div class='activity'>";
                    echo "<div class='activity-header'>";
                    echo "<p> Assunto: ". $atividade['assunto_atividade'] . "</p>";
                    echo "<p> Data de início: ". $atividade['data'] ."</p>";
                    echo "</div>";
                    echo "<p class='activity-text'>". $atividade['atividade']  ."</p>";
                    echo "</div>";
                echo"</article>";

            }            

            ?>
        </section> 
    </section>
    <script src="../../JS/script.js"></script>
</body>
</html>