var displayName = document.getElementById("name");
var displayPassword = document.getElementById("password2");
var displayRegisterOn = document.getElementById("messageRegisterOn");
var displayRegisterOff = document.getElementById("messageRegisterOff");

var fieldName = document.getElementById("name");
fieldName.addEventListener("click", ()=>{
    if (fieldName){
    fieldName.style.color = "#0404ab";
    }
});

function validatePassword() {
  let message;
  let userPassword = document.getElementById("password").value;

  if (
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

function emptyMail() {
  let messageMail;
  let userMail = document.getElementById("mail").value;

  if (userMail == "") {
    messageMail =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre adresse e-mail.</em>";
    document.getElementById("messageMail").innerHTML = messageMail;
  } else {
    messageMail = "";
    document.getElementById("messageMail").innerHTML = messageMail;
  }
}



//DEBUT BOUTON SE CONNECTER - lier à la db_ - vérif db_user en php 

document.getElementById("signupSubmit").addEventListener("click", function (e) {
  e.preventDefault();
  let userMail = document.getElementById("mail").value;
  let db_userMail = "test@mail.fr";

  if (userMail != db_userMail) {
    displayName.style.display = "block";
    displayPassword.style.display = "block";
    displayRegisterOn.style.display = "block";
    displayRegisterOff.style.display = "none";
  } else {
    document.location.href = "./index.html";
  }
});

//FIN BOUTON SE CONNECTER