<?php
function returnSuccess($message, $returnUrl = null, $showAlert = false){
    return [
        'status' => true,
        'returnUrl' => $returnUrl,
        'message' => $message,
        'showAlert' => $showAlert
    ];
}

function returnError(array $messages, $status = false){
    return [
        'status' => $status,
        'messages' =>  $messages
    ];
}
