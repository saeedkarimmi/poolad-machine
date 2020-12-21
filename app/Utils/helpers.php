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

function setActive($route, $class = 'active', $classElese = '')
{
    $routeName = Route::currentRouteName();

    if (!is_array($route) and $route != '') {
        return routeIsInCurrent($route, $routeName) ? $class : $classElese;
    } elseif (is_array($route) and !empty($route)) {
        foreach ($route as $item) {
            if (routeIsInCurrent($route, $routeName)) {
                return $class;
            }
        }
        return $classElese;
    }
}

function routeIsInCurrent($route, $current)
{
    //$prefix = config('cruds.admin_prefix', 'backend');
    return strpos($current, $route) !== false;
}
