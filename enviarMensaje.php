<?php

function enviarMensajeWhatsapp($celular, $mensaje) {
    $url = 'https://api.green-api.com/waInstance7103865763/SendMessage/03d85c1ff2764af1b0fb9cb43dd2f4036c354d4f683340c69d';
    $data = [
        "chatId" => $celular . '@c.us',
        "message" =>  $mensaje
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
}
