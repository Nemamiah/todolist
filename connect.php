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
    <header class="flex spaceB alignC mlr2 fixed headerFixed bgWhite top">
      <a href="#"
        ><img
          src="https://to-do-cdn.microsoft.com/static-assets/c87265a87f887380a04cf21925a56539b29364b51ae53e089c3ee2b2180148c6/icons/logo.png"
          alt="Logo Mytotool"
          title="Mytotool"
          class="w50p"
      /></a>
      <div class="flex flexE cgap10 alignC displayTab">
        <div class="flex alignC">
          <a href="#"
            ><img
              type="button"
              title="Recherche"
              class="wh25p mlr1"
              src="https://image.flaticon.com/icons/png/512/1250/1250312.png"
              alt="Recherche"
          /></a>

          <input
            class="whbtn pr35 bsd bsdBorder"
            type="text"
            autocomplete="off"
            placeholder="Recherche"
            value=""
          />
        </div>

        <nav class="">
          <a href="#"
            ><img
              type="button"
              class="w50p mlr1"
              title="Ajouter une tâche"
              src="https://image.flaticon.com/icons/png/512/1250/1250151.png"
              alt="Ajouter une tâche"
          /></a>
          <a href="#"
            ><img
              type="button"
              class="w50p mlr1"
              src="https://image.flaticon.com/icons/png/512/1250/1250165.png"
              alt="Notifications"
              title="Notifications"
          /></a>
          <a href="#"
            ><img
              type="button"
              class="w50p mlr1"
              src="https://image.flaticon.com/icons/png/512/1250/1250296.png"
              title="Profil"
              alt="Profil"
          /></a>
          <a href="#"
            ><img
              type="button"
              class="w50p mlr1"
              src="https://image.flaticon.com/icons/png/512/1250/1250257.png"
              title="Déconnexion "
              alt="Déconnexion "
          /></a>
        </nav>
      </div>
    </header>
    <h1 class="tac mtPage">Bienvenue sur Mytotool.</h1>

    <main class="bsd scrollerLog flex mlr2 flexCol spaceA flexC alignC mainLog">
      <section class="flex alignC sectionLog">
        <article class="w270 mtb2 mlr2 flex flexCol spaceA flexC">
          <h2>S'inscrire</h2>
          <form class="flex flexCol" action="./users.php" method="post">
            
            <span class="" id="messageName"></span> 
            <input
              class="mtb1"
              id="name"
              type="text"
              name="name"
              placeholder="Nom"
              value=""
              onblur="emptyName()"
              title="Votre nom de famille"
            />

            <span class="" id="messageMail"></span> 
            <input 
              class="mtb1" 
              id="mail"
              onblur="emptyMail()"
              type="email" 
              name="email" 
              placeholder="E-mail"
              title="Votre adresse e-mail"
              />
            <input
              class="mtb1"
              id="password"
              type="password"
              name="password"
              value=""
              placeholder="Mot de passe"
              onblur="validatePassword()"
              title="Choisissez un mot de passe"
            />

            <span class="" id="messagePwd2"></span> 
            <input
              class="mtb1"
              id="password2"
              onblur="samePassword()"
              type="password"
              name="password2"
              placeholder="Mot de passe"
              title="Confirmez votre mot de passe"
            />

            <span class="" id="messagePwd"></span> 


            <input
              class="ptb10 mtb2"
              type="submit"
              name="signUpSubmit"
              value="S'inscrire"
              title="S'inscrire"
            />
          </form>
        </article>

        <article class="or mtb2 flex flexCol spaceA alignC flexC mlr2">
          OR
        </article>

        <article class="w270 mtb2 mlr2 flex flexCol spaceA flexC">
          <button
            class="btnClassic ptb10 plr15 mtb1"
            title="Se connecter par e-mail"
          >Se connecter par e-mail
          </button>
          <!-- <a href=""><p class="tac">Mot de passe oublié ?</p></a> -->
          <button title="Se connecter avec FaceBook" class="social-signin facebook ptb10 plr15 mtb1">
            Log in with FaceBook
          </button>
          <button title="Se connecter avec Twitter" class="social-signin twitter ptb10 plr15 mtb1">
            Log in with Twitter
          </button>
          <button title="Se connecter avec Google" class="social-signin google ptb10 plr15 mtb1">
            Log in with Google
          </button>
        </article>
      </section>
    </main>
    <script src="./main.js"></script>
    <script src="./connect.js"></script>

  </body>
</html>
