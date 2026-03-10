<?php 

$uri = $_SERVER['REQUEST_URI'];;
$methodHTTP = $_SERVER['REQUEST_METHOD'];

$mails_file = __DIR__ . '/E-mails.txt';

if($uri == '/mails' && $methodHTTP == 'GET') {

    $content_mails = file_get_contents($mails_file);
    $mails_result = explode("\n", $content_mails);

    echo response($mails_result);
}

if($uri == '/mails' && $methodHTTP == 'POST') {
    
    $mail = json_decode(file_get_contents('php://input'), true)['mail'];

    file_put_contents($mails_file, "\n" . $mail, FILE_APPEND);

    echo response([], 201);

}

function response($body, $statusCode = 200) {
    
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    http_response_code($statusCode);

    return json_encode($body);

}