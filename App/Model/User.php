<?php
namespace App\Model;
use App\Core\Model;

class User extends Model {

        /**
         * Table name
         *
         * @var string
         */
        protected $table = 'users';
        
        /**
         * Table fields
         *
         * @var array
         */
        protected $fields = [
            'first_name', 'last_name'
        ];
}
?>