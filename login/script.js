const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

// Formulários
const forgotPasswordForm = document.getElementById("forgot-password-form");
const verificationCodeForm = document.getElementById("verification-code-form");
const resetPasswordForm = document.getElementById("reset-password-form");

// Botões
const forgotPasswordLink = document.getElementById("forgot-password-link");
const sendCodeBtn = document.getElementById("send-code-btn");
const verifyCodeBtn = document.getElementById("verify-code-btn");
const resetPasswordBtn = document.getElementById("reset-password-btn");

// Alternância entre Login e Cadastro
registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

// Mostrar formulário de recuperação de senha
forgotPasswordLink.addEventListener("click", function (e) {
    e.preventDefault();
    document.querySelector(".container").style.display = "none";
    document.getElementById("recovery-container").style.display = "flex";
});

// Navegação no fluxo de recuperação de senha
sendCodeBtn.addEventListener("click", function () {
    forgotPasswordForm.classList.remove("active");
    verificationCodeForm.classList.add("active");
});

verifyCodeBtn.addEventListener("click", function () {
    verificationCodeForm.classList.remove("active");
    resetPasswordForm.classList.add("active");
});

resetPasswordBtn.addEventListener("click", function () {
    alert("Senha redefinida com sucesso!");
    document.getElementById("recovery-container").style.display = "none";
    document.querySelector(".container").style.display = "flex";
});

  const params = new URLSearchParams(window.location.search);
  const erro = params.get('erro');
  const sucesso = params.get('cadastro');

  const msgBox = document.getElementById('mensagem');

  if (erro || sucesso === 'sucesso') {
    let msg = '';
    msgBox.classList.remove('erro', 'sucesso');

    if (erro) {
      msgBox.classList.add('erro');
      switch (erro) {
        case 'usuario': msg = 'Usuário não encontrado.'; break;
        case 'senha': msg = 'Senha incorreta.'; break;
        case 'email': msg = 'E-mail já cadastrado.'; break;
        case 'cadastro': msg = 'Erro ao cadastrar.'; break;
        case 'nao-autorizado': msg = 'Faça login para acessar o sistema.'; break;
        case 'logout': msg = 'Sessão encerrada com sucesso.'; break;
        default: msg = 'Erro desconhecido.';
      }
    }

    if (sucesso === 'sucesso') {
      msgBox.classList.add('sucesso');
      msg = 'Cadastro realizado com sucesso! Faça login para continuar.';
    }

    msgBox.innerText = msg;
    msgBox.style.display = 'block';
  }