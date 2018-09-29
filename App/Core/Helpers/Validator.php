<?php
namespace App\Core\Helpers;
use App\Core\Helpers\Helper as Helper;

class Validator {
    public static function validateString(string $name) {
            if(isset($name) && strlen($name) < 50) {
            $strip = strip_tags($name);
            $trimed = trim($strip);
            return $trimed;
        }
        else {
            Helper::sendSessionNotification('error','Check your name for syntax, max number of charachters is 50 and it is required!','full_name',$name);

        }
            
    }

    public static function validateEmail(string $email) {
        if(preg_match('^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$^',$email) && strlen($email) < 50) {
            $strip = strip_tags($email);
            $emailTrim = trim($strip);
                return $emailTrim;
        } else {
            Helper::sendSessionNotification('error','Check your email for syntax, max number of charachters is 50 and it is required!','email',$email);
        }
    }

    public static function validatePhoneNum(string $phoneNum) {
        
        if(preg_match('^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$^', $phoneNum) && strlen($phoneNum) < 30){
            $strip = strip_tags($phoneNum);
            $phoneTrim = trim($strip);
            
                return $phoneNum;
            }
         else {
            Helper::sendSessionNotification('error','Check your phone number for syntax, max number of charachters is 30 and it is required!','phone',$phoneNum);
        }
    }

    public static function validateInsuranceType(string $insuranceType) {
        if(isset($insuranceType)) {
            $strip = strip_tags($insuranceType);
            $trimed = trim($strip);
            return $trimed;
        } else {
            Helper::sendSessionNotification('error','Check your insurance type it is required','insurance_type',$insuranceType);
        }
    }

    public static function validateDate($date){
        
        if(preg_match("^\d{1,2}\/\d{1,2}\/\d{4}$^",$date)){
            $strip = strip_tags($date);
            $dateTrim = trim($strip);

                $dateFormat = str_replace('/','-',$dateTrim);

                $newDate = new \DateTime($dateFormat);

                $returnDate = $newDate->format('Y-m-d');

                return $returnDate;
            }
         else {
            Helper::sendSessionNotification('error','Check your date input and it is required','date',$date);
        }
    }

    public static function validateGroup(array $array) {
        // MORAM DA PROVERIM SVAKO POLJE U TOM NIZU, POLJA SU DRUGACIJA !!! string,email,date
        foreach($array as $key => $data) {
            if(empty($array[$key])) {
                Helper::sendSessionNotification('error','Check your group input</br>Every input is required');
                break;
                }
        }
        return $array;
    }
}
?>