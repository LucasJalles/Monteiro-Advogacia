<?php
// Configurações do e-mail
$to = 'Lucasjalles333@gmail.com'; // Substitua pelo seu e-mail
$subject = 'Novo contato do site Monteiro Advocacia';

// Coletando dados do formulário
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Montando o corpo do e-mail
$body = "Você recebeu um novo contato através do site:\n\n";
$body .= "Nome: " . htmlspecialchars($name) . "\n";
$body .= "E-mail: " . htmlspecialchars($email) . "\n";
$body .= "Telefone: " . htmlspecialchars($phone) . "\n";
$body .= "Mensagem:\n" . htmlspecialchars($message) . "\n";

// Cabeçalhos do e-mail
$headers = "From: " . htmlspecialchars($email) . "\r\n";
$headers .= "Reply-To: " . htmlspecialchars($email) . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Enviando o e-mail
$mailSent = mail($to, $subject, $body, $headers);

// Verificando se o e-mail foi enviado com sucesso
if ($mailSent) {
    // Retorna uma resposta JSON para o AJAX
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'E-mail enviado com sucesso']);
} else {
    // Retorna uma resposta de erro
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Erro ao enviar e-mail']);
}
?>