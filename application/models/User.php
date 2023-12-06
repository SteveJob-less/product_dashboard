<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{
    public function __construct()
    {
        parent :: __construct();
        $this -> load -> library('form_validation');
    }

    public function get_user($email)
    {
        $result = $this -> db -> select('*') -> from('Users') -> where('email', $email) -> get() -> result();
        
        return $result[0] ?? null;
    }

    public function create_user($user)
    {
        $hashedpass = password_hash($user['password'], PASSWORD_BCRYPT);

        $user_data = [
            'firstname' => strtolower($user['firstname']),
            'lastname' => strtolower($user['lastname']),
            'email' => strtolower($user['email']),
            'password' => $hashedpass,
            'created_at' => date('Y-m-d'),
        ];

        $this -> db -> insert('users', $user_data);
    }

    public function update_user_email($new_email, $user_id){
        $this -> db -> set('email', $new_email) -> where('id', $user_id) -> update('users');
    }

    public function update_user_info($user_array, $user_id)
    {
       $this -> db -> set('firstname', $user_array['firstname']) -> set('lastname', $user_array['lastname']) -> set('email', $user_array['email']) -> where('id', $user_id) -> update('users');
    }

    public function update_user_password($new_password, $user_id)
    {
        $hashedpass = password_hash($new_password, PASSWORD_BCRYPT);
  
        $this -> db -> set('password', $hashedpass) -> where('id', $user_id) -> update('users');
    }

    public function validate_editProfile_input()
    {
        $this -> form_validation -> set_rules($this -> signup_rules);
        $this -> form_validation -> set_message($this -> error_messages);
        $this -> form_validation -> run();
        $this -> errors = $this -> form_validation -> error_array();

        $user = $this -> get_user($this -> input -> post('email'));

        if($user)
        {
            $this -> errors['email'] = "'" . $user -> email . "' is already taken";
        }

        return $this -> errors;
    }

    public function validate_change_pass_input()
    {
        $errors = [
            'old_password' => '',
            'new_password' => '',
            'confirm_password' => '',
        ];

        
        $user_session = $this -> session -> userdata('user');
        $user = $this -> get_user($user_session['email']);

        if(!password_verify($this -> input -> post('old_password'), $user -> password))
        {
            $errors['old_password'] = "Incorrect password";
            return $errors;
            exit;
        }

        if(strlen($this -> input -> post('new_password')) < 8)
        {
            $errors['new_password'] = "Password must be at least 8 charters long";
            return $errors;
            exit;
        }
        

        if($this -> input -> post('new_password') !== $this -> input -> post('confirm_password'))
        {
            $errors['confirm_password'] = "Password doesn't matched";
            return $errors;
            exit;
        }
        
        return $errors;
    }

    public function validate_signup_input()
    {
        $this -> form_validation -> set_rules($this -> signup_rules);
        $this -> form_validation -> set_message($this -> error_messages);
        $this -> form_validation -> run();
        $this -> errors = $this -> form_validation -> error_array();

        $user = $this -> get_user($this -> input -> post('email'));

        if($user)
        {
            $this -> errors['email'] = "Email already taken";
        }

        return $this -> errors;
    }

    public function validate_login_input()
    {
        $this -> form_validation -> set_rules($this -> login_rules);
        $this -> form_validation -> set_message($this -> error_messages);
        $this -> form_validation -> run();
        $this -> errors = $this -> form_validation -> error_array();

        $input_pass = $this -> input -> post('log_password');

        $user = $this -> get_user($this -> input -> post('log_email'));

        if(empty($user) && strlen($this -> input -> post('log_email')) > 7)
        {
            $this -> errors['log_email'] = "Email not found";
        }

        if($user && !password_verify($input_pass, $user -> password))
        {
            $this -> errors['log_password'] = "Incorrect password";
        }

        return $this -> errors;
    }

    // This is the signup rule config for form_validation
    private $signup_rules = [
        ['field' => 'firstname', 'label' => 'Firstname', 'rules' => 'required|alpha|max_length[45]'],
        ['field' => 'lastname', 'label' => 'Lastname', 'rules' => 'required|alpha|max_length[45]'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email|max_length[45]'],
        ['field' => 'password', 'label' => 'Password', 'rules' => 'required|min_length[8]|max_length[32]'],
        ['field' => 'password2', 'label' => 'Repeat password', 'rules' => 'required|matches[password]'],
    ];

    // This is the signup rule config for form_validation
    private $login_rules = [
        ['field' => 'log_email', 'label' => 'Email', 'rules' => 'required|valid_email|max_length[45]'],
		['field' => 'log_password', 'label' => 'Password', 'rules' => 'required|min_length[8]|max_length[32]'],
    ];

    private $change_pass_rules = [
        ['field' => 'new_password', 'label' => 'Password', 'rules' => 'required|min_length[8]|max_length[32]'],
        ['field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[password]']
    ];

    // This is for the custom made rule error message for form_validation
    private $error_messages = [
		'matches[Password]' => "Password doesn't match",
		'required' => '{field} is required',
		'alpha' => '{field} must contain only letters',
	];

    private $errors = [
		'firstname' => '',
		'lastname' => '',
		'email' => '',
		'password' => '',
		'password2' => '',
		'log_email' => '',
		'log_password' => '',
	];
}