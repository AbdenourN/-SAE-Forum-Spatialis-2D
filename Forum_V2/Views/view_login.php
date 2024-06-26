<?php require_once "view_begin.php" ?>
<link href="Content/css/login.css" rel="stylesheet" >
</head>


<body>
    <div class="container text-center" id="mainContent">
        <header>
            <h1 class="my-4">Bienvenue sur le Forum Naruto</h1>
            <img src="Content/img/logo.png" alt="Logo Naruto" class="mb-4 logo-small"> 
        </header>

        <main>
            <button class="btn btn-primary btn-lg" id="loginButton">Connexion</button>
            <button class="btn btn-secondary btn-lg" id="registerButton">Inscription</button>

            <div id="loginForm" class="form-container">
                <form id="formLogin" action ="?controller=auth&action=login" method="POST">
                    <h2>Connexion</h2>
                    <div class="form-group">
                        <label for="loginEmail">Email</label>
                        <input type="text" class="form-control" id="loginEmail" name="email" placeholder="Entrez votre email" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Mot de Passe</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="validate">Se Connecter</button>
                </form>
                <button onclick="hideForms()" class="btn btn-link">Retour</button>
                <p><a href="javascript:void(0);" id="forgotPasswordLink">Mot de passe oublié</a></p>
            </div>
        
        <div id="registerForm" class="form-container">
            <form id="formRegister" action="?controller=auth&action=register" method="POST">
                <h2>Inscription</h2>
                <div class="form-group">
                    <label for="registerUsername">Pseudo</label>
                    <input type="text" class="form-control" id="registerUsername" name="pseudo" placeholder="Choisissez un pseudo" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Nom</label>
                    <input type="text" class="form-control" id="registerEmail" name="lastname" placeholder="Entrez votre Nom" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Prénom</label>
                    <input type="text" class="form-control" id="registerEmail" name="firstname" placeholder="Entrez votre Prénom" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Adresse Email</label>
                    <input type="email" class="form-control" id="registerEmail" placeholder="Entrez votre email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Mot de Passe</label>
                    <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Créez un mot de passe" required>
                </div>
                <button type="submit" class="btn btn-secondary btn-block" name="validate">S'inscrire</button>
            </form>
            <button onclick="hideForms()" class="btn btn-link2">Retour</button>
        </div>
        
        <div id="forgotPasswordForm" class="form-container" method="POST">
            <form id="formForgotPassword">
                <h2>Récupération de Mot de Passe</h2>
                <div class="form-group">
                    <label for="forgotEmail">Adresse Email</label>
                    <input type="email" class="form-control" id="forgotEmail" placeholder="Entrez votre email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
            </form>
            <button onclick="hideForms()" class="btn btn-link">Retour</button>
        </div>
        

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="Content/js/script.js"></script>
</body>
</html>




<?php require_once "view_end.php" ?>

