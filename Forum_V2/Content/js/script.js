// <src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
// <src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">


function showForm(formId) {
    // Cacher le contenu principal
    document.querySelector('h1').style.display = 'none';
    document.querySelector('img').style.display = 'none';
    document.getElementById('loginButton').style.display = 'none';
    document.getElementById('registerButton').style.display = 'none';

    // Cacher tous les formulaires puis afficher celui demandé
    var allForms = document.querySelectorAll('.form-container');
    allForms.forEach(function (form) {
        form.style.display = 'none';
    });

    document.getElementById(formId).style.display = 'block';
}

// Fonction pour cacher les formulaires et montrer le contenu principal
function hideForms() {
    document.querySelector('h1').style.display = 'block';
    document.querySelector('img').style.display = 'block';
    document.getElementById('loginButton').style.display = 'block';
    document.getElementById('registerButton').style.display = 'block';

    var allForms = document.querySelectorAll('.form-container');
    allForms.forEach(function (form) {
        form.style.display = 'none';
    });
}

// Ajouter l'écouteur d'événements aux boutons
document.getElementById('loginButton').addEventListener('click', function () {
    showForm('loginForm');
});

document.getElementById('registerButton').addEventListener('click', function () {
    showForm('registerForm');
});

document.getElementById('forgotPasswordLink').addEventListener('click', function () {
    showForm('forgotPasswordForm');
});

hideForms();

