 <?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['usuario_nome'])) {
    header("Location: login/index.html?erro=nao-autorizado");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            <li class="nav-item active"><a class="nav-link" href="#"><i class="fas fa-home"></i>Início</a></li>
            <li class="nav-item"><a class="nav-link" href="agendamento/index.php"><i class="far fa-calendar-alt"></i>Agendamento</a></li>
            <li class="nav-item"><a class="nav-link" href="#profissionais"><i class="fas fa-user"></i>Profissionais</a></li>
            <li class="nav-item"><a class="nav-link" href="#sobre"><i class="fas fa-info-circle"></i>Sobre</a></li>
            <li class="nav-item">
                <a class="nav-link text-info font-weight-bold" href="#">
                    <i class="fas fa-user-circle"></i>
                    <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </a>
            </li>
        </ul>
    </div>
</nav>

    <!-- Slide -->
    <section class="cont">
        <div class="slider">
            <div class="slide slide--1">
                <div class="slide__darkbg"></div>
                <div class="slide__text-wrapper">
                    <h1 class="slide__text">Clínica</h1>
                </div>
            </div>
            <div class="slide slide--2">
                <div class="slide__darkbg"></div>
                <div class="slide__text-wrapper">
                    <h1 class="slide__text">Pacientes</h1>
                </div>
            </div>
            <div class="slide slide--3">
                <div class="slide__darkbg"></div>
                <div class="slide__text-wrapper">
                    <h1 class="slide__text">Feedbacks</h1>
                </div>
            </div>
        </div>
        <ul class="nav">
        </ul>
    </section>

    <!-- TESTIMONIALS (Serviços) -->
    <section id="servicos" class="testimonials">
        <div class="container">
            <h2 class="section-title text-center">SERVIÇOS</h2>
            <div class="carousel-container">
                <button class="carousel-prev"><i class="fas fa-chevron-left"></i></button>

                <!-- Carousel -->
                <div id="customers-testimonials" class="owl-carousel">
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-responsive" src="img/servico1.png" alt="Limpeza Dentária">
                            <div class="item-details">
                                <h5>Limpeza Dentária</h5>
                                <p>Elimine placas e mantenha o sorriso saudável.</p>
                                <button class="btn-agendar">Agendar</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-responsive" src="img/servico2.jpeg" alt="Acompanhamento Dentário">
                            <div class="item-details">
                                <h5>Acompanhamento Dentário</h5>
                                <p>Check-ups para prevenir problemas bucais.</p>
                                <button class="btn-agendar">Agendar</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-responsive" src="img/servico3.jpeg" alt="Implante Dentário">
                            <div class="item-details">
                                <h5>Implante Dentário</h5>
                                <p>Substitua dentes perdidos com segurança.</p>
                                <button class="btn-agendar">Agendar</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-responsive" src="img/servico4.jpeg" alt="Lente Clareadora">
                            <div class="item-details">
                                <h5>Lente Clareadora</h5>
                                <p>Deixe seu sorriso mais branco e natural.</p>
                                <button class="btn-agendar">Agendar</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-responsive" src="img/servicoDnt1.jpg" alt="Prótese">
                            <div class="item-details">
                                <h5>Prótese (Acompanhamento)</h5>
                                <p>Ajustes regulares para adaptação perfeita da sua prótese.</p>
                                <button class="btn-agendar">Agendar</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-responsive" src="img/servicoProf2(1).jpg" alt="Prótese Dentária">
                            <div class="item-details">
                                <h5>Prótese Dentária</h5>
                                <p>Restaure a função e estética do sorriso com próteses personalizadas.</p>
                                <button class="btn-agendar">Agendar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botão Direito -->
                <button class="carousel-next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>


    <!-- ESPECIALIDADES -->
    <section id="especialidades" class="especialidades">
        <h1 class="tituloEspecialidades">ESPECIALIDADES</h1>
        <div class="container-especialidades">
            <div class="especialidade">
                <div class="icone">
                    <img src="img/iconeService1.png" alt="icone1">
                </div>
                <h2 class="tituloEspec">Ortodontia</h2>
                <p class="textEspecialidades">
                    Acreditamos que um sorriso alinhado transforma vidas! Nossa equipe de ortodontistas altamente qualificados utiliza as mais avançadas técnicas para corrigir a posição dos dentes, proporcionando estética e saúde bucal.
                </p>
            </div>
            <div class="especialidade">
                <div class="icone">
                    <img src="img/iconeService2.png" alt="icone2">
                </div>
                <h2 class="tituloEspec">Implantes</h2>
                <p class="textEspecialidades">
                    Perder um dente nunca mais será um problema! Somos referência em implantes dentários, oferecendo procedimentos seguros e minimamente invasivos. Utilizamos materiais de alta qualidade para garantir um encaixe perfeito e um resultado natural.
                </p>
            </div>
            <div class="especialidade">
                <div class="icone">
                    <img src="img/iconeService3.png" alt="icone3">
                </div>
                <h2 class="tituloEspec">Estética</h2>
                <p class="textEspecialidades">
                    Seu sorriso, sua marca registrada! Com procedimentos estéticos de última geração, ajudamos você a conquistar um sorriso mais branco, harmônico e saudável. Desde clareamento dental até lentes de contato dentais, oferecemos tratamentos personalizados.
                </p>
            </div>
        </div>
    </section>


    <!-- PROFISSIONAIS -->
    <h1 class="tituloProfissionais" id="profissionais">PROFISSIONAIS</h1>
    <div class="container-profissionais">
        <div class="card-client">
            <div class="user-picture">
                <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                </svg>
            </div>
            <p class="name-client"> Profissional
                <span>Clinico geral</span>
            </p>
            <div class="social-media">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <div class="card-client">
            <div class="user-picture">
                <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                </svg>
            </div>
            <p class="name-client"> Profissional
                <span>Estética e Cirurgia</span>
            </p>
            <div class="social-media">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <div class="card-client">
            <div class="user-picture">
                <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                </svg>
            </div>
            <p class="name-client"> Profissional
                <span>Ortodontista</span>
            </p>
            <div class="social-media">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- DEPOIMENTOS DE CLIENTES -->
    <h1 class="tituloDepoimentos">DEPOIMENTOS DE CLIENTES</h1>

    <div class="container-cartoes">
        <div class="cartao">
            <div class="container-imagem-cartao">
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 512 512" fill="currentColor" class="icone-video">
                    <path d="M464 384.39a32 32 0 01-13-2.77 15.77 15.77 0 01-2.71-1.54l-82.71-58.22A32 32 0 01352 295.7v-79.4a32 32 0 0113.58-26.16l82.71-58.22a15.77 15.77 0 012.71-1.54 32 32 0 0145 29.24v192.76a32 32 0 01-32 32zM268 400H84a68.07 68.07 0 01-68-68V180a68.07 68.07 0 0168-68h184.48A67.6 67.6 0 01336 179.52V332a68.07 68.07 0 01-68 68z"></path>
                </svg>
            </div>
            <p class="titulo-cartao">Dra. Fernanda sobre João Silva</p>
            <p class="descricao-cartao">
                O João chegou à clínica inseguro com seu sorriso desalinhado. Com um tratamento ortodôntico preciso, alinhamos seus dentes e restauramos sua confiança.
            </p>
            <div class="botao-cartao">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 384 512" fill="currentColor">
                    <path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"></path>
                </svg>
                <span class="texto-botao-cartao">Assistir Vídeo</span>
            </div>
        </div>

        <div class="cartao">
            <div class="container-imagem-cartao">
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 512 512" fill="currentColor" class="icone-video">
                    <path d="M464 384.39a32 32 0 01-13-2.77 15.77 15.77 0 01-2.71-1.54l-82.71-58.22A32 32 0 01352 295.7v-79.4a32 32 0 0113.58-26.16l82.71-58.22a15.77 15.77 0 012.71-1.54 32 32 0 0145 29.24v192.76a32 32 0 01-32 32zM268 400H84a68.07 68.07 0 01-68-68V180a68.07 68.07 0 0168-68h184.48A67.6 67.6 0 01336 179.52V332a68.07 68.07 0 01-68 68z"></path>
                </svg>
            </div>
            <p class="titulo-cartao">Dr. Carlos sobre Maria Souza</p>
            <p class="descricao-cartao">
                A Maria perdeu um dente e temia o implante. Com um procedimento seguro e confortável, devolvemos a harmonia do seu sorriso. Agora, ela está feliz e realizada!
            </p>
            <div class="botao-cartao">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 384 512" fill="currentColor">
                    <path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"></path>
                </svg>
                <span class="texto-botao-cartao">Assistir Vídeo</span>
            </div>
        </div>
    </div>


    <!-- SOBRE A EMPRESA -->
    <section id="sobre" class="sobre">
        <div class="container-sobre">
            <div class="imagem-sobre">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4903.815098900049!2d-43.94123632376499!3d-19.91911583146686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699fb595bab33%3A0xca642ca01121d880!2sPra%C3%A7a%20Sete%20de%20Setembro!5e1!3m2!1spt-BR!2sbr!4v1739657977889!5m2!1spt-BR!2sbr" 
                class="mapa-embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="texto-sobre" id="sobre">
                <h3>Sobre</h3>
                <h1>Nossa Clínica</h1>
                <p>Nossa Clínica Odontológica é referência em saúde bucal e estética do sorriso, oferecendo tratamentos modernos e personalizados para cada paciente. Com uma equipe altamente qualificada e tecnologia de ponta, buscamos proporcionar o melhor atendimento em um ambiente acolhedor e seguro.</p>
                <p>Nosso compromisso é transformar vidas através do sorriso, garantindo conforto, qualidade e eficiência em cada procedimento. Desde tratamentos preventivos até procedimentos estéticos e reabilitações complexas, priorizamos a satisfação e o bem-estar de nossos pacientes.</p>
            </div>
        </div>
    </section>


      <footer class="footer-section">
        <div class="container-fluid">
          <!-- CTA (Localização / Telefone / E-mail) -->
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
                  Copyright © 2025, Todos os direitos reservados, <a href="https://alltechwebsites.com/" class="alltech-link" id="linkAlltech">AllTech</a>
                  </p>
              </div>
              </div>
          </div>
          </div>
      </footer>
      <!-- fim Footer -->


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
