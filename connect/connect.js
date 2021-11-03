console.log("HelloConnect");

function getID(name) {
  return document.getElementById(name);
}

var displayName = getID("name");
var displayNickname = getID("nickname");
var displayPassword = getID("password2");
var displayRegisterOn = getID("messageRegisterOn");
var displayRegisterOff = getID("messageRegisterOff");
var displayLogin = getID("login");
var displaySignin = getID("signin");
var displayHSignin = getID("hSignin");
var displayHLogin = getID("hLogin");
var displaySeparator = getID("separator");

const WARN_MESSAGE_PWD =
  "Attention : Votre mot de passe devrait contenir des majuscules, des minuscules, des chiffres et des caractères spéciaux en un minimum de 12 caractères.";

console.log(displayHSignin);
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
  let userPassword = getID("password");
  const htmlWarningPwd = `<em style='font-size:12px;color:red'>${WARN_MESSAGE_PWD}</em>`;

  if (userPassword.value == "") {
    messagePassword =
      "<em style='font-size:12px;color:red'>Veuillez saisir votre mot de passe.</em>";
    message = htmlWarningPwd;
  } else if (
    userPassword.value.match(/[0-9]/g) &&
    userPassword.value.match(/[A-Z]/g) &&
    userPassword.value.match(/[a-z]/g) &&
    userPassword.value.match(/[^a-zA-Z\d]/g) &&
    userPassword.value.length >= 12
  ) {
    message =
      "<em style='font-size:12px;color:green'>Sécurité du mot de passe forte.</em>";
    messagePassword = "";
  } else {
    message = htmlWarningPwd;
    messagePassword = "";
  }
  getID("messagePassword").innerHTML = messagePassword;
  getID("messagePwd").innerHTML = message;
}

function samePassword() {
  let messagePass;
  let userPassword = getID("password");
  let userPassword2 = getID("password2");

  if (userPassword.value != userPassword2.value) {
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
  let userName = getID("name");

  if (userName.value == "") {
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

function nosub(){
  document.location.href = "../users.php";

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
    displayHSignin.style.display = "none";
    displayHLogin.style.display = "block";
    displayLogin.value = "S'inscrire";
    displaySeparator.style.display = "none";
  } else {
    console.log(" header location connect log. Suite du JS à mettre en PHP pour vérif db");
  }
}
// en php :  
            // else header location connect log. Suite du JS à mettre en PHP pour vérif db
            //   } else if (userMail == db_userMail) {
            //     messageMail = "";
            //     getID("messageMail").innerHTML = messageMail;

            //     messageBonjour =
            //       "<h2 class='fontSize16p'>Heureux de vous revoir,<br>" +
            //       db_userNickname +
            //       "</h2>";
            //     getID("messageBonjour").innerHTML = messageBonjour;

            //     displayHSignin.style.display = "block";
            //     displayHLogin.style.display = "none";
            //     displaySeparator.style.display = "none";
            //     displayLogin.value = "Se connecter";
            //   } else {
            //     messageMail = "";
            //     getID("messageMail").innerHTML = messageMail;

            //     messageBonjour = "<h2 class='fontSize16p'>Pas encore inscrit ?</h2>";
            //     getID("messageBonjour").innerHTML = messageBonjour;

            //     displayHSignin.style.display = "none";
            //     displaySeparator.style.display = "none";
            //     displayHLogin.style.display = "block";
            //     displayLogin.value = "S'inscrire";
            //   }
            // }

//DEBUT BOUTON SE CONNECTER - lier à la db_ - vérif db_user en php

// getID("login").addEventListener("click", function (e) {
//   let signinInputs = [
//     displayName,
//     displayNickname,
//     displayPassword,
//     displayRegisterOn,
//   ];

//   e.preventDefault();

//   let userMail = getID("mail");
//   let db_userMail = "test@mail.fr";
//   // Trouver comment vérifier si le userMail est dans la db_userMail de SQL

//   console.log("JS ok on click login");

//   if (userMail.value != db_userMail || userMail.value == "") {
//     signinInputs.forEach((input) => {
//       input.style.display = "block";
//       console.log("display block des champs d'inscription ok");
//     });

//     displayRegisterOff.style.display = "none";
//     displayHSignin.style.display = "none";
//     displaySeparator.style.display = "none";
//     displayLogin.classList.add("dnone");
//     displaySignin.classList.remove("dnone");

//     console.log("vers PHP pour inscription car mail pas dans base de données");
//   } else {
//     console.log(
//       "vers PHP pour vérif log/mdp puis direction todolist de l'ID concerné"
//     );
//     document.location.href = "../connect/log/index.php";
//   }
// });

//FIN BOUTON SE CONNECTER
