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
            $full_name = Validator::validateString($_POST['full_name']);
            
            $email = Validator::validateEmail($_POST['email']);
            
            $phone_num = Validator::validatePhoneNum($_POST['phone_num']);

            $insurance_type = Validator::validateInsuranceType($_POST['insurance_type']);
            
            $start_date = Validator::validateDate($_POST['start_date']);

            $end_date = Validator::validateDate($_POST['end_date']);

            //Example save to database
            $propert = new User();
            $property->insert();

            return Helper::sendSessionNotification('success','Success!');
    }

    public function listAll() {

        $insurance = new Insurance();
        $all_users = $insurance->getAll('user_insurance');
        
        Helper::view('list',$all_users);
    }

    public function listAllGroups() {
        $insurance = new Insurance();
        $all_group_insured = $insurance->getAllGroupInsured('user_group_insurance','user_insurance');

        Helper::view('groupList',$all_group_insured);
    }
}
?>