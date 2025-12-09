document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le formulaire de se soumettre

    let nom = document.getElementById('nom').value.trim();
    let email = document.getElementById('email').value.trim();
    let message = document.getElementById('message').value.trim();
    let validationMessage = document.getElementById('validationMessage');

    if (nom === "" || email === "" || message === "") {
        validationMessage.textContent = "Veuillez remplir tous les champs.";
        validationMessage.style.color = "red";
    } else {
        validationMessage.textContent = "Merci pour votre message ! Je vous répondrai bientôt.";
        validationMessage.style.color = "green";
        // Vous pouvez ajouter ici du code pour envoyer les données du formulaire,
        // par exemple en utilisant fetch() pour communiquer avec un serveur.
        console.log("Nom:", nom);
        console.log("Email:", email);
        console.log("Message:", message);
        this.reset(); // Réinitialise le formulaire après une soumission réussie
    }
});