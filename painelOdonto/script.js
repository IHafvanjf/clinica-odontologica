let today = new Date().getDate();
let todayMonth = new Date().getMonth();
let todayYear = new Date().getFullYear();
let currentMonth = todayMonth;
let currentYear = todayYear;

const monthNames = [
  "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
  "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
];

function updateCalendars() {
  document.querySelectorAll(".schedule-table").forEach(table => {
    const monthEl = table.querySelector(".calendar-nav");
    const daysList = table.querySelector(".days-wrapper");

    if (monthEl && daysList) {
      monthEl.innerHTML = `
        <button onclick="changeMonth(-1)">&#60;</button>
        <span class="mx-4">${monthNames[currentMonth]} ${currentYear}</span>
        <button onclick="changeMonth(1)">&#62;</button>
      `;

      daysList.innerHTML = "";
      const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

      for (let day = 1; day <= daysInMonth; day++) {
        let dayItem = document.createElement("button");
        dayItem.className = "px-4 py-2 bg-white text-gray-900 border border-gray-300 rounded-lg hover:bg-blue-500 hover:text-white transition m-1";
        dayItem.textContent = day;

        if (day === today && currentMonth === todayMonth && currentYear === todayYear) {
          dayItem.classList.add("bg-yellow-300", "font-bold");
        }

        dayItem.addEventListener("click", () => {
          const dataStr = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
          let profissional = "";

          if (document.getElementById("schedule-carlos").style.display === "block") profissional = "carlos";
          if (document.getElementById("schedule-ricardo").style.display === "block") profissional = "ricardo";
          if (document.getElementById("schedule-marcos").style.display === "block") profissional = "marcos";

          if (profissional) {
            buscarAgendamentos(dataStr, profissional);
          }
        });

        daysList.appendChild(dayItem);
      }
    }
  });
}

function changeMonth(step) {
  currentMonth += step;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear -= 1;
  } else if (currentMonth > 11) {
    currentMonth = 0;
    currentYear += 1;
  }
  updateCalendars();
}

function showProfessionals() {
  document.getElementById("professionals-container").style.display = "flex";
  ["schedule-carlos", "schedule-ricardo", "schedule-marcos"].forEach(id => {
    document.getElementById(id).style.display = "none";
  });
}

function showScheduleTable(professional) {
  document.getElementById("professionals-container").style.display = "none";
  ["schedule-carlos", "schedule-ricardo", "schedule-marcos"].forEach(id => {
    document.getElementById(id).style.display = "none";
  });
  document.getElementById(`schedule-${professional}`).style.display = "block";
}

document.addEventListener("DOMContentLoaded", () => {
  showProfessionals();
  updateCalendars();
});

const nomesBanco = {
  carlos: "Profissional 1",
  ricardo: "Profissional 2",
  marcos: "Profissional 3"
};

function buscarAgendamentos(data, profissionalKey) {
  const profissional = nomesBanco[profissionalKey];
  const tbody = document.getElementById(`agendamentosBody-${profissionalKey}`);
  if (!tbody || !profissional) return;

  fetch(`get_agendamentos.php?data=${data}&profissional=${encodeURIComponent(profissional)}`)
    .then(async (res) => {
      const txt = await res.text();
      if (!res.ok) throw new Error(`HTTP ${res.status}: ${txt.slice(0,200)}`);
      let json;
      try { json = txt ? JSON.parse(txt) : {}; }
      catch { throw new Error("Resposta não é JSON válido: " + txt.slice(0,200)); }

      const lista = Array.isArray(json) ? json
                  : Array.isArray(json.agendamentos) ? json.agendamentos
                  : [];
      return lista;
    })
    .then((lista) => {
      tbody.innerHTML = "";

      if (lista.length === 0) {
        tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-gray-500">Nenhum agendamento</td></tr>`;
        return;
      }

      lista.forEach((item) => {
        const hora = String(item.horario || "").slice(0,5); 
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td class="px-4 py-2">${item.nome ?? ""}</td>
          <td class="px-4 py-2">${item.telefone ?? ""}</td>
          <td class="px-4 py-2">${hora}</td>
          <td class="px-4 py-2">${item.servicos ?? ""}</td>
          <td class="px-4 py-2">${item.duracao ?? ""} min</td>
          <td class="px-4 py-2">
            <button class="text-red-600 hover:underline"
              onclick="excluirAgendamento(${item.id}, '${data}', '${profissionalKey}')">
              Excluir
            </button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch((err) => {
      console.error(err);
      tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-red-600">Erro ao carregar</td></tr>`;
    });
}


function excluirAgendamento(id, data, profissional) {
  if (!confirm("Deseja realmente excluir este agendamento?")) return;

  fetch("delete_agendamento.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `id=${id}`
  })
    .then(res => res.json())
    .then(res => {
      if (res.success) {
        alert("Agendamento excluído.");
        buscarAgendamentos(data, profissional);
      } else {
        alert("Erro ao excluir.");
      }
    });
}
