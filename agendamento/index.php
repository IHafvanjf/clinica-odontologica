 <?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['usuario_nome'])) {
    header("Location: ../login/index.html?erro=nao-autorizado");
    exit;
}
?> 

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Odonto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-mainbg">
    <a class="navbar-brand navbar-logo text-white" href="#">Clínica Odontológica</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector"></div> 
            <li class="nav-item "><a class="nav-link" href="../index.php"><i class="fas fa-home"></i>Início</a></li>
            <li class="nav-item active"><a class="nav-link" href="#"><i class="far fa-calendar-alt"></i>Agendamento</a></li>
            <li class="nav-item"><a class="nav-link" href="../index.php#profissionais"><i class="fas fa-user"></i>Profissionais</a></li>
            <li class="nav-item"><a class="nav-link" href="../index.php#sobre"><i class="fas fa-info-circle"></i>Sobre</a></li>
            <li class="nav-item">
                <a class="nav-link text-info font-weight-bold" href="#">
                    <i class="fas fa-user-circle"></i>
                    <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </a>
            </li>
        </ul>
    </div>
</nav>


    <!-- Seção de profissionais NOVA -->
<section class="nova-secao-profissionais py-5">
    <div class="container">
      <h2 class="text-center text-primary mb-5">Escolha o Profissional</h2>
      <div class="row justify-content-center">
  
        <div class="col-md-4 mb-4">
          <div class="card shadow">
            <img src="../img/profissoinal1.jpg" class="card-img-top" alt="Profissional 1">
            <div class="card-body text-center">
              <h5 class="card-title">Profissional 1</h5>
              <p class="card-text">Clínico Geral</p>
              <a href="#" class="btn btn-primary agendar-btn">Agendar</a>
            </div>
          </div>
        </div>
  
        <div class="col-md-4 mb-4">
          <div class="card shadow">
            <img src="../img/profissoinal2.jpg" class="card-img-top" alt="Profissional 2">
            <div class="card-body text-center">
              <h5 class="card-title">Profissional 2</h5>
              <p class="card-text">Ortodontista</p>
              <a href="#" class="btn btn-primary agendar-btn">Agendar</a>
            </div>
          </div>
        </div>
  
        <div class="col-md-4 mb-4">
          <div class="card shadow">
            <img src="../img/profissoinal3.jpg" class="card-img-top" alt="Profissional 3">
            <div class="card-body text-center">
              <h5 class="card-title">Profissional 3</h5>
              <p class="card-text">Estética e Cirurgia</p>
              <a href="#" class="btn btn-primary agendar-btn">Agendar</a>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>
  
    <!-- Seleção de Serviços -->
    <div id="servicos" style="display: none;">
        <h2 class="titulo">Seleção de Serviços</h2>
        <div class="servicos-grid">

            <!-- Exemplo de card de serviço -->
            <div class="servico-card">
                <div class="image">
                    <img src="../img/servicoDnt1.jpg" alt="Serviço 1" id="imagemServico">
                </div>
                <div class="content-servico">
                    <a href="#">
                        <span class="title-servico">Consulta Odontológica</span>
                    </a>
                    <p class="desc">Avaliação completa da saúde bucal.</p>
                    <a class="action selecionar-btn" href="#" data-selected="false">
                        Selecionar
                        <span aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <div class="servico-card">
                <div class="image">
                    <img src="../img/servicoDnt2.jpg" alt="Serviço 2" id="imagemServico">
                </div>
                <div class="content-servico">
                    <a href="#">
                        <span class="title-servico">Limpeza e Profilaxia</span>
                    </a>
                    <p class="desc">Remoção de tártaro e polimento dental.</p>
                    <a class="action selecionar-btn" href="#" data-selected="false">
                        Selecionar
                        <span aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <div class="servico-card">
                <div class="image">
                    <img src="../img/servicoDnt3.jpg" alt="Serviço 3" id="imagemServico">
                </div>
                <div class="content-servico">
                    <a href="#">
                        <span class="title-servico">Aplicação de Flúor</span>
                    </a>
                    <p class="desc">Proteção extra contra cáries.</p>
                    <a class="action selecionar-btn" href="#" data-selected="false">
                        Selecionar
                        <span aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <div class="servico-card">
                <div class="image">
                    <img src="../img/servicoDnt4.jpg" alt="Serviço 4" id="imagemServico">
                </div>
                <div class="content-servico">
                    <a href="#">
                        <span class="title-servico">Tratamento de Cárie</span>
                    </a>
                    <p class="desc">Restauração com resina ou amálgama.</p>
                    <a class="action selecionar-btn" href="#" data-selected="false">
                        Selecionar
                        <span aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <div class="servico-card">
                <div class="image">
                    <img src="../img/servicoDnt5.jpg" alt="Serviço 5" id="imagemServico">
                </div>
                <div class="content-servico">
                    <a href="#">
                        <span class="title-servico">Extração Simples</span>
                    </a>
                    <p class="desc">Remoção de dentes danificados.</p>
                    <a class="action selecionar-btn" href="#" data-selected="false">
                        Selecionar
                        <span aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <div class="servico-card">
                <div class="image">
                    <img src="../img/servicoDnt6.jpg" alt="Serviço 6" id="imagemServico">
                </div>
                <div class="content-servico">
                    <a href="#">
                        <span class="title-servico">Ajuste e Polimento de Prótese</span>
                    </a>
                    <p class="desc">Manutenção de próteses dentárias.</p>
                    <a class="action selecionar-btn" href="#" data-selected="false">
                        Selecionar
                        <span aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Barra fixa inferior para serviços selecionados -->
        <div class="service-bar" id="serviceBar">
            <div id="selectedServicesList"></div>
            <button id="confirm-services">Confirmar</button>
        </div>
    </div>

    <!-- Formulário de Dados do Cliente -->
    <div id="form-dados" style="display: none;">
        <form class="form">
            <p class="form-title">Insira seus dados</p>
            <div class="input-container">
                <label for="nome">Nome</label>
                <input type="text" id="nome" placeholder="Digite seu nome">
            </div>
            <div class="input-container">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" placeholder="Digite seu telefone">
            </div>
            <button type="button" class="submit" id="confirmar-dados">Confirmar</button>
        </form>
    </div>

    <!-- Calendário -->
    <div id="step3" class="step" style="display: none;">
        <h2 class="calendarioTitulo">Selecione o dia</h2>
        <div class="calendar-container">
            <div class="calendar-header">
                <button id="prevMonth">&lt;</button>
                <span id="currentMonth"></span>
                <button id="nextMonth">&gt;</button>
            </div>
            <div class="calendar">
                <div class="days-of-week">
                    <span>Dom</span>
                    <span>Seg</span>
                    <span>Ter</span>
                    <span>Qua</span>
                    <span>Qui</span>
                    <span>Sex</span>
                    <span>Sab</span>
                </div>
                <div class="days-grid" id="daysGrid"></div>
            </div>
        </div>
    </div>

    <!-- Horários -->
    <div id="step4" class="step" style="display: none;">
        <h2 class="titulo">Escolha o horário</h2>
        <div class="legend text-center mb-3">
            <span class="badge" style="background-color: #f0f0f0; color: #333;">Disponível</span>
            <span class="badge badge-danger">Ocupado</span>
            <span class="badge text-white" style="background-color: #bdbdbd;">Bloqueado</span>
            <span class="badge badge-primary">Selecionado</span>
          </div>
        
        <div class="schedule-container">
            <div class="schedule-grid" id="scheduleGrid"></div>
        </div>
    </div>

    <!-- Modal de Confirmação -->
    <div
        id="confirmationModal"
        class="modal-overlay"
        style="display: none;"
    >
        <div class="modal-content">
            <h3>Confirmação de Agendamento</h3>
            <p>Tem certeza que deseja marcar este horário?</p>
            <span id="selectedTime" class="selected-time"></span>
            <div class="modal-buttons">
                <button id="confirmar-horario" class="confirm-btn">
                    Confirmar
                </button>
                <button id="cancelar-horario" class="cancel-btn">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <footer class="footer-section">
        <div class="container-fluid">
          <div class="footer-cta pt-5 pb-5">
            <div class="row">
              <div class="col-xl-4 col-md-4 mb-30">
                <div class="single-cta">
                  <i class="fas fa-map-marker-alt"></i>
                  <div class="cta-text">
                    <h4 data-translate="rodapeEnderecoTitulo">Encontre-nos</h4>
                    <span data-translate="rodapeEnderecoLocal">Belo Horizonte - MG</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-4 mb-30">
                <div class="single-cta">
                  <i class="fas fa-phone"></i>
                  <div class="cta-text">
                    <h4 data-translate="rodapeTelefoneTitulo">Telefone</h4>
                    <span>3199794-1735</span><br>
                    <span>3198730-5141</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-4 mb-30">
                <div class="single-cta">
                  <i class="far fa-envelope-open"></i>
                  <div class="cta-text">
                    <h4 data-translate="rodapeEmailTitulo">Email</h4>
                    <span>techinnova01@gmail.com</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="footer-content pt-5 pb-5">
            <div class="row">
              <div class="col-xl-4 col-lg-4 mb-50">
                <div class="footer-widget">
                  <div class="footer-logo">
                    <a href="#"><img src="../img/logoAlltech.png" class="img-fluid" alt="logo"></a>
                  </div>
                  <div class="footer-text">
                    <p data-translate="rodapeDescricao">
                      A AllTech é a revolução digital que sua empresa precisa! Especialistas em desenvolvimento de sites e aplicações web, transformamos ideias em experiências digitais envolventes, escaláveis e de alto desempenho. Seja para fortalecer sua presença online, aumentar suas conversões ou oferecer uma experiência digital impecável, criamos soluções sob medida para o seu negócio.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                <div class="footer-widget">
                  <div class="footer-widget-heading">
                    <h3 data-translate="rodapeServicosTitulo">Serviços</h3>
                  </div>
                  <ul>
                    <li><a href="#" data-translate="rodapeServico1">Desenvolvimento de Sites</a></li>
                    <li><a href="#" data-translate="rodapeServico2">Aplicações Web</a></li>
                    <li><a href="#" data-translate="rodapeServico3">E-commerce</a></li>
                    <li><a href="#" data-translate="rodapeServico4">Otimização de SEO</a></li>
                    <li><a href="#" data-translate="rodapeServico5">Manutenção e Suporte</a></li>
                    <li><a href="#" data-translate="rodapeServico6">Integração de APIs</a></li>
                    <li><a href="#" data-translate="rodapeServico7">Sistemas Personalizados</a></li>
                    <li><a href="#" data-translate="rodapeServico8">UX/UI Design</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                <div class="footer-widget">
                  <div class="footer-widget-heading">
                    <h3 data-translate="rodapeContatoTitulo">Fale Conosco</h3>
                  </div>
                  <div class="footer-text mb-25">
                    <p data-translate="rodapeContatoTexto">
                      Precisa de um orçamento ou tem alguma dúvida? Fale conosco agora pelo WhatsApp!
                    </p>
                  </div>
                  <div class="whatsapp-btn">
                    <a href="https://wa.me/31997941735" target="_blank">
                      <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 

          <div class="copyright-area">
          <div class="container">
              <div class="row justify-content-center">
              <div class="col-auto">
                  <p class="copyright-text" data-translate="rodapeCopy">
                  Copyright © 2025, Todos os direitos reservados, AllTech
                  </p>
              </div>
              </div>
          </div>
          </div>
      </footer>

    <script src="script.js"></script>
</body>
</html>