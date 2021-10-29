function getID(name){
  return document.getElementById(name)
}

var displayName = getID("name");
var displayNickname = getID("nickname");
var displayPassword = getID("password2");
var displayRegisterOn = getID("messageRegisterOn");
var displayRegisterOff = getID("messageRegisterOff");
var displayLogin = getID("login");
var displaySignup = getID("signup");
var displayHSignup = getID("hSignup");
var displayHLogin = getID("hLogin");
var displaySeparator = getID("separator");


const WARN_MESSAGE_PWD = "Attention : Votre mot de passe devrait contenir des majuscules, des minuscules, des chiffres et des caractères spéciaux en un minimum de 12 caractères."


var fieldName = getID("name");
fieldName.addEventListener("click", () => {
  if (fieldName) {
    fieldName.style.color = "#0404ab";
  }
});

var fieldNickname = getID("nickname");
fieldNickname.addEventListener("click", () => {
  if (fieldNickname) {
    fieldNickname.style.color = "#0404ab";
  }
});

function validatePassword() {
  let message;
  let messagePassword;
  let userPassword = getID("password").value;
  const htmlWarningPwd = `<em style='font-size:12px;color:red'>${WARN_MESSAGE_PWD}</em>`

  if (userPassword == "") {
    messagePassword =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre mot de passe.</em>";
    getID("messagePassword").innerHTML = messagePassword;
    message = htmlWarningPwd
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
    message = htmlWarningPwd
  getID("messagePwd").innerHTML = message;
}

function samePassword() {
  let messagePass;
  let userPassword = getID("password").value;
  let userPassword2 = getID("password2").value;

  if (userPassword != userPassword2) {
    messagePass =
      '<em style="font-size:12px;color:red">Il semblerait que les mots de passe ne correspondent pas. Merci de bien vouloir vérifier votre saisie.</em>';

    getID("messagePwd2").innerHTML = messagePass;
  } else {
    messagePass = "";
    getID("messagePwd2").innerHTML = messagePass;
  }
}

function emptyName() {
  let messageName;
  let userName = getID("name").value;

  if (userName == "") {
    messageName =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre nom.</em>";
    getID("messageName").innerHTML = messageName;
  } else {
    messageName = "";
    getID("messageName").innerHTML = messageName;
  }
}

function emptyNickname() {
  let messageNickname;
  let userNickname = getID("nickname").value;

  if (userNickname == "") {
    messageNickname =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre pseudo.<br>Vous pouvez saisir votre prénom, si vous préférez.</em>";
    getID("messageNickname").innerHTML = messageNickname;
  } else {
    messageNickname = "";
    getID("messageNickname").innerHTML = messageNickname;
  }
}

function emptyMail() {
  let messageMail;
  let messageBonjour;
  let userMail = getID("mail").value;
  let db_userMail = "test@mail.fr";
  let db_userNickname = "M. Anderson";

  if (userMail == "") {
    messageMail =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre adresse e-mail.</em>";
    getID("messageMail").innerHTML = messageMail;
    displayHSignup.style.display = "none";
    displayHLogin.style.display = "block";
    displayLogin.value = "S'inscrire";
    displaySeparator.style.display = "none";
  } else if (userMail == db_userMail) {
    messageMail = "";
    getID("messageMail").innerHTML = messageMail;

    messageBonjour =
      "<h2 class='fontSize16p'>Heureux de vous revoir,<br>" +
      db_userNickname +
      "</h2>";
    getID("messageBonjour").innerHTML = messageBonjour;

    displayHSignup.style.display = "block";
    displayHLogin.style.display = "none";
    displaySeparator.style.display = "none";
    displayLogin.value = "Se connecter";
  } else {
    messageMail = "";
    getID("messageMail").innerHTML = messageMail;

    messageBonjour = "<h2 class='fontSize16p'>Pas encore inscrit ?</h2>";
    getID("messageBonjour").innerHTML = messageBonjour;

    displayHSignup.style.display = "none";
    displaySeparator.style.display = "none";
    displayHLogin.style.display = "block";
    displayLogin.value = "S'inscrire";
  }
}

//DEBUT BOUTON SE CONNECTER - lier à la db_ - vérif db_user en php

getID("login").addEventListener("click", function (e) {
  let signUpInputs = [
    displayName,
    displayNickname,
    displayPassword,
    displayRegisterOn
  ]

  e.preventDefault();
  let userMail = getID("mail").value;
  let db_userMail = "test@mail.fr";

  if (userMail != db_userMail || userMail == "") {
    signUpInputs.forEach(input => {
      input.style.display = "block";
    })

    
    displayRegisterOff.style.display = "none";
    displayHSignup.style.display = "none";
    displaySeparator.style.display = "none";
    // displayLogin.value = "S'inscrire";
    displayLogin.classList.add("dnone");
    displaySignup.classList.remove("dnone");
    

    // displayLogin.style.display = "none";
    // displaySignup.style.display = "block";
  } else {
    document.location.href = "./users.php";
  }
});

//FIN BOUTON SE CONNECTER
