<?php

    require_once("./users.php");

    $sql = "SELECT * FROM 'users'";
    $query = $db->prepare($sql);
    $query->execute();

    $contacts = $query->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./base.css" />
    <link rel="stylesheet" href="./main.css" />
    <link rel="stylesheet" href="./color.css" />
    <link rel="stylesheet" href="./typo.css" />
    <link rel="stylesheet" href="./query.css" />
    <link rel="stylesheet" href="./connectMain.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <title>Mytotool : Bienvenue sur Mytotool, la todolist par SAFRIO</title>
  </head>
  <body>
    <header class="flex spaceB alignC mlr2 fixed headerFixed bgWhite top left">
      <a href="./connect.php"
        ><img
          src="https://www.clipartmax.com/png/full/106-1064080_blue-check-mark-symbol.png"
          alt="Logo Mytotool"
          title="Mytotool"
          class="w50p ml2"
      /></a>

    </header>
    <h1 class="tac mtPage">Bienvenue sur Mytotool.<span class="" id="messageBonjour"></span></h1>

    <main class="bsd scrollerLog flex mlr2 flexCol spaceA flexC alignC mainLog">
      <section class="flex alignC sectionLog">
        <article class="w270 mtb2 mlr2 flex flexCol spaceA flexC">
        <h2 class="tac"><span id="hLogin">S'inscrire</span><span id="separator">/</span><span id="hSignup">Se connecter</span></h2>
            <p class="fontSize16p m0 tac" id="messageRegisterOff">(C'est le même endroit.)</p>
            
            <p class="m0 tac dnone" id="messageRegisterOn">Enchanté,
              <br>N'hésitez pas à créer un compte pour sauvegarder vos tâches.</p> 

          <form class="flex flexCol" action="./users.php"
          method="post"
          >
            
            <span class="" id="messageName"></span> 
            <input
              class="mtb1 dnone"
              id="name"
              type="text"
              name="name"
              placeholder="Nom"
              required
              value=""
              onblur="emptyName()"
              title="Saisissez votre nom de famille"
            />
            <span class="" id="messageNickname"></span> 
            <input
              class="mtb1 dnone"
              id="nickname"
              type="text"
              name="nickname"
              placeholder="Pseudo"
              required
              value=""
              onblur="emptyPseudo()"
              title="Saisissez votre pseudo"
            /> 
            <span class="" id="messageMail"></span> 
            <input 
              class="mtb1" 
              id="mail"
              onblur="emptyMail()"
              required 
              type="email" 
              name="email" 
              placeholder="E-mail"
              title="Saisissez votre adresse e-mail"
              />

            <span class="" id="messagePassword"></span> 
            <input
              class="mtb1"
              id="password"
              type="password"
              name="password"
              required 
              value=""
              placeholder="Mot de passe"
              onblur="validatePassword()"
              title="Choisissez un mot de passe"
            />

            <span class="" id="messagePwd2"></span> 
            <input
              class="mtb1 dnone"
              id="password2"
              onblur="samePassword()"
              required
              type="password"
              name="password2"
              placeholder="Mot de passe"
              title="Confirmez votre mot de passe"
            />

            <span class="" id="messagePwd"></span> 


            <input
              class="ptb10 mtb2"
              type="submit"
              name="login"
              value="S'inscrire"
              id="login"
              title="S'inscrire"
            />

            <input
              class="ptb10 mtb2 dnone"
              type="submit"
              name="signup"
              value="S'inscrire"
              id="signup"
              title="S'inscrire"
            />
          <a href=""><p class="tac m0">Mot de passe oublié ?</p></a>

          </form>
        </article>

        <article class="or mtb2 flex flexCol spaceA alignC flexC mlr2">
          OR
        </article>

        <article class="w270 mtb2 mlr2 flex flexCol spaceA flexC">
          
          <button title="Se connecter avec Facebook" class="whiteColor hoverBtn facebook ptb10 plr15 mtb1">
            Log in with Facebook
          </button>
          <button title="Se connecter avec Twitter" class="whiteColor hoverBtn twitter ptb10 plr15 mtb1">
            Log in with Twitter
          </button>
          <button title="Se connecter avec Google" class="whiteColor hoverBtn google ptb10 plr15 mtb1">
            Log in with Google
          </button>
          <button
            class="hoverBtn ptb10 plr15 mtb1 btnClassic "
            type="button"
            title="Accéder au site sans s'inscrire"
            onclick="self.location.href='./index.html'" 
          >Accéder à Mytotool sans s'inscrire.
          </button>
        </article>
      </section>
    </main>
    <footer class="flex flexC">
      <p class="tac bottom m0 ptb10">Développé par Thibault BOUCHE<sup>&copy</sup><br> <em>Tous droits réservés</em></p>
    </footer>
    <script src="./main.js"></script>
    <script src="./connect.js"></script>

  </body>
</html>
