<?php
class Customer extends Person implements DBInterface
{
    public $phone_number;
    public $birthdate;
    public $status;
    public $plan;
    const PLANS = ['Gold', 'Silver', 'Regular'];
    static protected $table_name = 'customers';
    static protected $db_columns = ['id', 'username', 'hash_password', 'email', 'phone_number', 'birthdate', 'status', 'plan' ];

    public function __construct($arg = [])
    {
        parent::__construct($arg);
        $this->phone_number = $arg["phone_number"] ?? NULL;
        $this->email = $arg["email"] ?? NULL;
        $this->birthdate = $arg["birthdate"] ?? NULL;
        $this->status = $arg["status"] ?? NULL;
        $this->plan = $arg["plan"] ?? NULL;
        self::$table_name = 'customers';
        self::$db_columns = ['id', 'username', 'hash_password', 'email', 'phone_number', 'birthdate', 'status', 'plan' ];
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

        if(is_blank($this->username)) {
            $this->errors[] = "Username cannot be blank.";
        }
        if(is_blank($this->email)) {
            $this->errors[] = "Email cannot be blank.";
        }elseif (!valid_email($this->email)){
            $this->errors[] = "Email is not valid.";
        }

        if(is_blank($this->phone_number)){
            $this->errors[] = "Phone number cannot be blank.";
        }elseif (!contains_only_numbers($this->phone_number)){
            $this->errors[] = "Phone-number is not valid.";
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


?>