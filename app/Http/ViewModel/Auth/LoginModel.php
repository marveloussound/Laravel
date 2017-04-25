<?php

namespace App\Http\ViewModel\Auth;

use \App\Libs as Libs;

/* @var $variable ClassName */

class LoginModel {

    private static $instance;
    public $Name;

    protected function __construct() {
        //TODO:jquery-validation-unobtrusive対応
        $this->Name = new Libs\ModelAttribute('required|max:255');
    }

    public static function getInstance() {

        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}
