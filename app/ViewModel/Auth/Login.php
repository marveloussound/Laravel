<?php

namespace App\Http\ViewModel\Auth;

/* @var $variable ClassName */

class LoginModel {

    private static $instance;
    public $Name;

    protected function __construct() {

        $this->Name = new ModelAttribute('required|max:255');
    }

    public static function getInstance() {

        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}

/* @var  ModelAttribute */

class ModelAttribute {

    //
    public $validation = null;
    public $IsRequired = false;
    public $StringLength = null;
    public $RegExp = null;
    public $Range = null;
    public $Raw = null;

    /* @var $variable ModelAttribute */

    function __construct($Raw) {

        $this->Raw = $Raw;

        $attributes = explode('|', $Raw);

        foreach ($attributes as $attribute) {

            if (strpos($attribute, 'max') !== false) {
                $this->StringLength = new StringLength();
                $this->StringLength->Set(0, 20);
            }
        }
    }

}

/**
 * 文字の長さ
 */
class StringLength {

    public $Min = 0;
    public $Max = null;

    public function Set($min = 0, $max = null) {

        $this->Min = $min;
        $this->Max = $max;
    }

}
