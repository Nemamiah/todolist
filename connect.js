var displayName = document.getElementById("name");
var displayNickname = document.getElementById("nickname");
var displayPassword = document.getElementById("password2");
var displayRegisterOn = document.getElementById("messageRegisterOn");
var displayRegisterOff = document.getElementById("messageRegisterOff");
var displayLogin = document.getElementById("login");
var displaySignup = document.getElementById("signup");
var displayHSignup = document.getElementById("hSignup");
var displayHLogin = document.getElementById("hLogin");
var displaySeparator = document.getElementById("separator");

var fieldName = document.getElementById("name");
fieldName.addEventListener("click", () => {
  if (fieldName) {
    fieldName.style.color = "#0404ab";
  }
});

var fieldNickname = document.getElementById("nickname");
fieldNickname.addEventListener("click", () => {
  if (fieldNickname) {
    fieldNickname.style.color = "#0404ab";
  }
});

function validatePassword() {
  let message;
  let messagePassword;
  let userPassword = document.getElementById("password").value;

  if (userPassword == "") {
    messagePassword =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre mot de passe.</em>";
    document.getElementById("messagePassword").innerHTML = messagePassword;
    message =
    "<em style='font-size:12px;color:red'>Attention : Votre mot de passe devrait contenir des majuscules, des minuscules, des chiffres et des caractères spéciaux en un minimum de 12 caractères.</em>";
  } else if (
    userPassword.match(/[0-9]/g) &&
    userPassword.match(/[A-Z]/g) &&
    userPassword.match(/[a-z]/g) &&
    userPassword.match(/[^a-zA-Z\d]/g) &&
    userPassword.length >= 12
  )
    message =
      "<em style='font-size:12px;color:green'>Sécurité du mot de passe forte.</em>";
  else
    message =
      "<em style='font-size:12px;color:red'>Attention : Votre mot de passe devrait contenir des majuscules, des minuscules, des chiffres et des caractères spéciaux en un minimum de 12 caractères.</em>";
  document.getElementById("messagePwd").innerHTML = message;
}

function samePassword() {
  let messagePass;
  let userPassword = document.getElementById("password").value;
  let userPassword2 = document.getElementById("password2").value;

  if (userPassword != userPassword2) {
    messagePass =
      '<em style="font-size:12px;color:red">Il semblerait que les mots de passe ne correspondent pas. Merci de bien vouloir vérifier votre saisie.</em>';

    document.getElementById("messagePwd2").innerHTML = messagePass;
  } else {
    messagePass = "";
    document.getElementById("messagePwd2").innerHTML = messagePass;
  }
}

function emptyName() {
  let messageName;
  let userName = document.getElementById("name").value;

  if (userName == "") {
    messageName =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre nom.</em>";
    document.getElementById("messageName").innerHTML = messageName;
  } else {
    messageName = "";
    document.getElementById("messageName").innerHTML = messageName;
  }
}

function emptyNickname() {
  let messageNickname;
  let userNickname = document.getElementById("nickname").value;

  if (userNickname == "") {
    messageNickname =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre pseudo.</em>";
    document.getElementById("messageNickname").innerHTML = messageNickname;
  } else {
    messageNickname = "";
    document.getElementById("messageNickname").innerHTML = messageNickname;
  }
}

function emptyMail() {
  let messageMail;
  let messageBonjour;
  let userMail = document.getElementById("mail").value;
  let db_userMail = "test@mail.fr";
  let db_userNickname = "M. Anderson";

  if (userMail == "") {
    messageMail =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre adresse e-mail.</em>";
    document.getElementById("messageMail").innerHTML = messageMail;
    displayHSignup.style.display = "none";
    displayLogin.value = "S'inscrire";
    displaySeparator.style.display = "none";
  } else if (userMail == db_userMail) {
    messageMail = "";
    document.getElementById("messageMail").innerHTML = messageMail;

    messageBonjour =
      "<h2 class='fontSize16p'>Heureux de vous revoir,<br>" +
      db_userNickname +
      "</h2>";
    document.getElementById("messageBonjour").innerHTML = messageBonjour;

    displayHSignup.style.display = "block";
    displayHLogin.style.display = "none";
    displaySeparator.style.display = "none";
    displayLogin.value = "Se connecter";
  } else {
    messageMail = "";
    document.getElementById("messageMail").innerHTML = messageMail;

    messageBonjour = "<h2 class='fontSize16p'>Pas encore inscrit ?</h2>";
    document.getElementById("messageBonjour").innerHTML = messageBonjour;

    displayHSignup.style.display = "none";
    displaySeparator.style.display = "none";
    displayHLogin.style.display = "block";
    displayLogin.value = "S'inscrire";
  }
}

//DEBUT BOUTON SE CONNECTER - lier à la db_ - vérif db_user en php

document.getElementById("login").addEventListener("click", function (e) {
  e.preventDefault();
  let userMail = document.getElementById("mail").value;
  let db_userMail = "test@mail.fr";

  if (userMail != db_userMail) {
    displayName.style.display = "block";
    displayNickname.style.display = "block";
    displayPassword.style.display = "block";
    displayRegisterOn.style.display = "block";
    displayRegisterOff.style.display = "none";
    displayLogin.style.display = "none";
    displaySignup.style.display = "block";
  } else {
    document.location.href = "./users.php";
  }
});

//FIN BOUTON SE CONNECTER
