<?php
namespace App\Core\Helpers;

class Helper {

    public static function goBack() {
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }

    public static function view(string $view_name, array $data = []) {
        if (!session_start()) session_start();
        // var_dump($_SESSION['error']);
        require_once 'App/View/'.$view_name.'.php';
        session_unset();
    }
    
    public static function dd($toCheck) {
        die(var_dump($toCheck));
    }
    public static function sendSessionNotification($type, $sessionMessage, $sessionKey = '',  $sessionValue = '') {
        session_start();

        $_SESSION[$type] = $sessionMessage;
        
        $_SESSION[$sessionKey] = $sessionValue;
        self::goBack();
    }
}
?>