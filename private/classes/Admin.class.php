<?php

class Admin extends Person implements DBInterface
{
    static protected $table_name = 'admins';
    static protected $db_columns = ['id', 'username', 'hash_password', 'email'];

    public function __construct(array $arg = [])
    {
        parent::__construct($arg);
        self::$table_name = 'admins';
        self::$db_columns = ['id', 'username', 'hash_password', 'email'];
    }


    public function create() {
        $this->set_hashed_password();
        return parent::create();
    }

    public function update() {
        if($this->password != '') {
            $this->set_hashed_password();
        } else {
            $this->password_required = false;
        }
        return parent::update();
    }

    public function validate() {
        $this->errors = [];

        if(is_blank($this->get_username())) {
            $this->errors[] = "Username cannot be blank.";
        } elseif (!self::has_unique_username($this->username , $this->id ?? 0)){
            $this->errors[] = "Username is already used.";
        }

        if(is_blank($this->email)) {
            $this->errors[] = "Email cannot be blank.";
        }elseif (!valid_email($this->email)){
            $this->errors[] = "Email is not valid.";
        }
        if($this->password_required) {
            if(is_blank($this->password)) {
                $this->errors[] = "Password cannot be blank.";
            } elseif (has_length_in_range($this->password, 6, 10)){
                $this->errors[] = "Password should be between 6 and 10 letter.";
            }
        }
        return $this->errors;
    }



}