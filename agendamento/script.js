let selectedServices = [];
let selectedDate = "";
let selectedTime = "";
let selectedProfissional = "";
let blockedDays = [];

const serviceBar = document.getElementById("serviceBar");
const selectedServicesList = document.getElementById("selectedServicesList");
const confirmButton = document.getElementById("confirm-services");

// Profissionais e serviços
const servicosPorProfissional = {
  "Profissional 1": [
    { nome: "Consulta Odontológica", descricao: "Avaliação completa da saúde bucal.", img: "../img/servicoDnt1.jpg" },
    { nome: "Limpeza e Profilaxia", descricao: "Remoção de tártaro e polimento dental.", img: "../img/servicoDnt2.jpg" },
    { nome: "Aplicação de Flúor", descricao: "Proteção extra contra cáries.", img: "../img/servicoDnt3.jpg" },
    { nome: "Tratamento de Cárie", descricao: "Restauração com resina ou amálgama.", img: "../img/servicoDnt4.jpg" },
    { nome: "Extração Simples", descricao: "Remoção de dentes danificados.", img: "../img/servicoDnt5.jpg" },
    { nome: "Ajuste e Polimento de Prótese", descricao: "Manutenção de próteses dentárias.", img: "../img/servicoDnt6.jpg" }
  ],
  "Profissional 2": [
    { nome: "Avaliação Ortodôntica", descricao: "Diagnóstico para uso de aparelho.", img: "../img/servicoProf2(1).jpg" },
    { nome: "Instalação de Aparelho Fixo", descricao: "Aparelho metálico ou estético.", img: "../img/servicoProf2(2).jpeg" },
    { nome: "Aparelho Invisível", descricao: "Tratamento discreto e removível.", img: "../img/servicoProf2(3).jpeg" },
    { nome: "Manutenção de Aparelho", descricao: "Ajustes periódicos.", img: "../img/servicoProf2(4).jpg" },
    { nome: "Correção de Mordida", descricao: "Tratamento para desalinhamento funcional.", img: "../img/servicoProf2(5).jpg" },
    { nome: "Expansão Palatina", descricao: "Indicado para casos de mordida cruzada.", img: "../img/servicoProf2(6).jpg" }
  ],
  "Profissional 3": [
    { nome: "Cirurgia de Implante", descricao: "Colocação de implantes dentários.", img: "../img/servicoProf3(1).png" },
    { nome: "Extração de Siso", descricao: "Remoção de dentes do siso impactados.", img: "../img/servicoProf3(2).jpeg" },
    { nome: "Enxerto Ósseo", descricao: "Procedimento para reconstrução óssea.", img: "../img/servicoProf3(3).jpeg" },
    { nome: "Bichectomia", descricao: "Redução das bochechas para estética facial.", img: "../img/servicoProf3(4).jpeg" },
    { nome: "Cirurgia Ortognática", descricao: "Correção de deformidades faciais.", img: "../img/servicoProf3(5).jpg" },
    { nome: "Correção de Gengiva", descricao: "Gengivoplastia para harmonização do sorriso.", img: "../img/servicoProf3(6).jpg" }
  ]
};

// Escolha do profissional
document.querySelectorAll(".agendar-btn").forEach(button => {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    const card = this.closest(".card");
    selectedProfissional = card.querySelector(".card-title").textContent.trim();
    document.querySelector(".nova-secao-profissionais").style.display = "none";
    document.getElementById("servicos").style.display = "block";
    atualizarServicos(selectedProfissional);
  });
});

// Atualiza serviços do profissional
function atualizarServicos(profissional) {
  const container = document.querySelector(".servicos-grid");
  container.innerHTML = "";

  if (servicosPorProfissional[profissional]) {
    servicosPorProfissional[profissional].forEach(servico => {
      const card = document.createElement("div");
      card.classList.add("servico-card");
      card.innerHTML = `
        <div class="image"><img src="${servico.img}" alt=""></div>
        <div class="content-servico">
          <a href="#"><span class="title-servico">${servico.nome}</span></a>
          <p class="desc">${servico.descricao}</p>
          <a class="action selecionar-btn" href="#" data-selected="false">Selecionar</a>
        </div>`;
      container.appendChild(card);
    });

    document.querySelectorAll(".selecionar-btn").forEach(btn => {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        const title = this.closest(".servico-card").querySelector(".title-servico").textContent.trim();
        if (selectedServices.includes(title)) {
          selectedServices = selectedServices.filter(s => s !== title);
          this.textContent = "Selecionar";
        } else {
          selectedServices.push(title);
          this.textContent = "Remover";
        }
        updateServiceBar();
      });
    });
  }
}

function updateServiceBar() {
  selectedServicesList.innerHTML = "";
  if (selectedServices.length > 0) {
    serviceBar.style.display = "flex";
    confirmButton.style.display = "inline-block";
    selectedServices.forEach(s => {
      const span = document.createElement("span");
      span.textContent = s;
      span.classList.add("selected-service");
      selectedServicesList.appendChild(span);
    });
  } else {
    serviceBar.style.display = "none";
    confirmButton.style.display = "none";
  }
}

confirmButton.addEventListener("click", () => {
  if (selectedServices.length === 0) {
    alert("Selecione pelo menos um serviço.");
    return;
  }
  document.getElementById("servicos").style.display = "none";
  document.getElementById("form-dados").style.display = "block";
});

document.getElementById("confirmar-dados").addEventListener("click", () => {
  const nome = document.getElementById("nome").value.trim();
  const telefone = document.getElementById("telefone").value.trim();
  if (!nome || !telefone) {
    alert("Preencha todos os campos!");
    return;
  }
  document.getElementById("form-dados").style.display = "none";
  document.getElementById("step3").style.display = "block";
  fetch("get_dias_bloqueados.php")
    .then(res => res.json())
    .then(data => {
      blockedDays = data;
      renderCalendar();
    });
});

// Calendário
let date = new Date();
const daysGrid = document.getElementById("daysGrid");
const currentMonth = document.getElementById("currentMonth");
const prevMonthBtn = document.getElementById("prevMonth");
const nextMonthBtn = document.getElementById("nextMonth");

function renderCalendar() {
  daysGrid.innerHTML = "";
  const year = date.getFullYear();
  const month = date.getMonth();
  const monthNames = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
  currentMonth.textContent = `${monthNames[month]} ${year}`;
  const firstDayIndex = new Date(year, month, 1).getDay();
  const lastDay = new Date(year, month + 1, 0).getDate();

  for (let i = 0; i < firstDayIndex; i++) {
    daysGrid.appendChild(document.createElement("div"));
  }

  for (let day = 1; day <= lastDay; day++) {
    const el = document.createElement("div");
    el.textContent = day;
    el.classList.add("day");

    const dataStr = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;

    if (blockedDays.includes(dataStr)) {
      el.classList.add("blocked");
      el.title = "Dia indisponível";
    } else {
      el.addEventListener("click", () => {
        selectedDate = dataStr;
        document.querySelectorAll(".day").forEach(d => d.classList.remove("selected"));
        el.classList.add("selected");
        document.getElementById("step3").style.display = "none";
        document.getElementById("step4").style.display = "block";
        carregarHorarios(dataStr);
      });
    }

    daysGrid.appendChild(el);
  }
}

prevMonthBtn.addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});
nextMonthBtn.addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});
const duracaoServico = 30; // minutos


function carregarHorarios(dataSelecionada) {
  fetch(`get_agendamentos.php?data=${dataSelecionada}`)
      .then(res => res.json())
      .then(data => {
          const ocupados = data.horarios || [];
          const ocupadosSet = new Set(ocupados);

          const duracaoPorServico = 30; // minutos
          const duracaoTotal = selectedServices.length * duracaoPorServico;

          const horarios = [
              "08:00", "08:30", "09:00", "09:30", "10:00", "10:30",
              "11:00", "11:30", "12:00", "12:30", "13:00", "13:30",
              "14:00", "14:30", "15:00", "15:30", "16:00", "16:30",
              "17:00", "17:30", "18:00"
          ];

          const scheduleGrid = document.getElementById("scheduleGrid");
          scheduleGrid.innerHTML = "";

          function horarioParaMinutos(h) {
              const [hora, minuto] = h.split(":").map(Number);
              return hora * 60 + minuto;
          }

          function intervalosConflitam(inicioA, fimA, inicioB, fimB) {
              return inicioA < fimB && inicioB < fimA;
          }

          horarios.forEach(horario => {
              const div = document.createElement("div");
              div.textContent = horario;
              div.classList.add("time-slot");

              const inicio = horarioParaMinutos(horario);
              const fim = inicio + duracaoTotal;

              let conflita = false;
              let conflitoDireto = false;

              ocupados.forEach(h => {
                  const ocupadoInicio = horarioParaMinutos(h);
                  const ocupadoFim = ocupadoInicio + duracaoPorServico;

                  if (intervalosConflitam(inicio, fim, ocupadoInicio, ocupadoFim)) {
                      conflita = true;
                      if (ocupadoInicio === inicio) {
                          conflitoDireto = true;
                      }
                  }
              });

              if (conflita) {
                  div.classList.add(conflitoDireto ? "ocupado-direto" : "bloqueado-cinza");
                  div.style.pointerEvents = "none";
              } else {
                  div.addEventListener("click", () => {
                      selectedTime = horario;
                      document.querySelectorAll(".time-slot").forEach(s => s.classList.remove("selected-slot"));
                      div.classList.add("selected-slot");
                      document.getElementById("confirmationModal").style.display = "flex";
                      document.getElementById("selectedTime").textContent = "Horário: " + horario;
                  });
              }

              scheduleGrid.appendChild(div);
          });
      });
}

// Confirmar envio
document.getElementById("confirmar-horario").addEventListener("click", () => {
  const nome = document.getElementById("nome").value.trim();
  const telefone = document.getElementById("telefone").value.trim();
  if (!selectedDate || !selectedTime || !selectedServices.length || !nome || !telefone || !selectedProfissional) {
    alert("Preencha todos os dados corretamente!");
    return;
  }

  const data = {
    nome,
    telefone,
    data: selectedDate,
    horario: selectedTime,
    servicos: selectedServices.join(", "),
    profissional: selectedProfissional
  };

  fetch("agendamento.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data)
  })
  .then(res => res.json())
  .then(res => {
    if (res.success) {
      alert("Agendamento confirmado com sucesso!");
      window.location.reload();
    } else {
      alert("Erro ao agendar: " + res.message);
    }
  })
  .catch(() => alert("Erro ao enviar os dados para o servidor."));
});

// Cancelar
document.getElementById("cancelar-horario").addEventListener("click", () => {
  document.getElementById("confirmationModal").style.display = "none";
});

function test() {
    var tabsNewAnim = $('#navbarSupportedContent');
    var activeItemNewAnim = tabsNewAnim.find('.active');
    var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
    var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
    var itemPosNewAnimTop = activeItemNewAnim.position();
    var itemPosNewAnimLeft = activeItemNewAnim.position();
    $(".hori-selector").css({
        "top": itemPosNewAnimTop.top + "px", 
        "left": itemPosNewAnimLeft.left + "px",
        "height": activeWidthNewAnimHeight + "px",
        "width": activeWidthNewAnimWidth + "px"
    });
}

$(document).ready(function () {
    setTimeout(function () { test(); });

    $(window).on('resize', function () {
        setTimeout(function () { test(); }, 500);
    });

    $(".navbar-toggler").click(function () {
        $(".navbar-collapse").slideToggle(300);
        setTimeout(function () { test(); });
    });

    $("#navbarSupportedContent").on("click", "li", function () {
        $('#navbarSupportedContent ul li').removeClass("active");
        $(this).addClass('active');
        test();
    });
});
