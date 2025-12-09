<?php
// Configuration
$to_email = "carteat22@gmail.com"; // VOTRE EMAIL
$site_name = "Portfolio BOUSSAHEL Abdelhakim";

// Récupérer les données du formulaire
$name = htmlspecialchars($_POST['name'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$subject = htmlspecialchars($_POST['subject'] ?? 'Message depuis portfolio');
$message = htmlspecialchars($_POST['message'] ?? '');

// Validation
if (empty($name) || empty($email) || empty($message)) {
    die("ERREUR: Tous les champs sont requis.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("ERREUR: Email invalide.");
}

// Construire l'email
$email_subject = "[Portfolio] $subject - $name";
$email_body = "
Nouveau message depuis votre portfolio:

Nom: $name
Email: $email
Date: " . date('d/m/Y H:i') . "

Message:
$message

---
Cet email a été envoyé depuis votre formulaire de contact.
";

// En-têtes de l'email
$headers = "From: $site_name <noreply@portfolio.com>\r\n";
$headers .= "Reply-To: $name <$email>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Essayer d'envoyer l'email
if (mail($to_email, $email_subject, $email_body, $headers)) {
    // Email envoyé avec succès
    
    // Optionnel : Envoyer une copie à l'expéditeur
    $confirmation_subject = "Confirmation - Votre message a été envoyé";
    $confirmation_body = "
Bonjour $name,

Nous avons bien reçu votre message :
\"$message\"

Nous vous répondrons dans les plus brefs délais.

Cordialement,
BOUSSAHEL Abdelhakim
    ";
    
    mail($email, $confirmation_subject, $confirmation_body, $headers);
    
    echo "SUCCESS: Votre message a été envoyé avec succès à carteat22@gmail.com";
} else {
    // En cas d'échec, utiliser une méthode alternative
    $alternative_message = "
ERREUR: L'envoi direct a échoué.

Pour envoyer votre message manuellement :
1. Ouvrez Gmail
2. Composez un nouveau message
3. À : carteat22@gmail.com
4. Objet : $email_subject
5. Message :
$email_body

Vos informations :
Nom: $name
Email: $email
    ";
    
    echo $alternative_message;
}
?>