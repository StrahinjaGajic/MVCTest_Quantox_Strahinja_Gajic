<?php
namespace App\Controller;
use App\Core\Helpers\Helper;
use App\Core\Helpers\Validator;
use App\Model\User;

class HomeController {

    public function index($args) {
        return Helper::view('home', $args);
    }

    public function post() {

            //Example for validation
            $first_name = Validator::validateString($_POST['first_name']);
            
            $second_name = Validator::validateString($_POST['secodn_name']);

            //Example save to database
            $propert = new User();
            $property->insert([
                'first_name' =>$full_name,
                'second_name' => $second_name]
            );

            return Helper::sendSessionNotification('success','Success!');
    }
}
?>