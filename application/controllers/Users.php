<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// TODO: make another class for validations
class Users extends CI_Controller 
{
	public function __construct()
	{
		parent :: __construct();
		$this -> load -> model('User');
	}

	public function logout()
	{
		$this -> session -> unset_userdata('user');
		
		redirect(base_url('users/login'));
	}

	public function login()
	{
		$user = $this -> session -> userdata('user');

        if($user)
        {
            redirect(base_url('/products/dashboard'));
            exit;
        }

		$data = [
			'title' => 'Login',
			'error' => $this -> session -> flashdata('error'),
			'input' => $this -> session -> flashdata('input'),
		];

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('users/nav_bar');
		$this -> load -> view('users/login');
		$this -> load -> view('templates/footer');
	}

	public function signup()
	{
		$user = $this -> session -> userdata('user');

        if($user)
        {
            redirect(base_url('/products/dashboard'));
            exit;
        }

		$data = [
			'title' => 'Signup',
			'error' => $this -> session -> flashdata('error'),
			'input' => $this -> session -> flashdata('input'),
			'prompt_success' => $this -> session -> flashdata('isRegistered'),
		];

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('users/nav_bar');
		$this -> load -> view('users/signup');
		$this -> load -> view('templates/footer');
	}

	public function profile()
	{
		// $this -> session -> unset_userdata('user');
		$user = $this -> session -> userdata('user');
		$fetched_user_data = $this -> User -> get_user($user['email']);

		$user_data = [
			'firstname' => $fetched_user_data -> firstname,
			'lastname' => $fetched_user_data -> lastname,
			'email' => $fetched_user_data -> email,
			'created_at' => $fetched_user_data -> created_at,
			'updated_at' => $fetched_user_data -> updated_at,
		];

		$data = [
			'title' => 'Profile',
			'user' => $user_data,
			'error' => $this -> session -> flashdata('error'),
			'input' => $this -> session -> flashdata('input'),
		];

		$this -> load -> view('templates/header', $data);
		$user ? $this -> load -> view('products/nav_bar'): $this -> load -> user('users/nav_bar');
		$this -> load -> view('users/profile');
		$this -> load -> view('templates/footer');
	}

	public function edit_profile()
	{
		$user = $this -> session -> userdata('user');

        if(!$user)
        {
            redirect(base_url('/users/login'));
            exit;
        }

		$error = $this -> User -> validate_editProfile_input();

		if($user['email'] === $this -> input -> post('email') && empty($error['firstname']) && empty($error['lastname']))
		{
			$this -> User -> update_user_info($this -> input -> post(), $user['user_id']);
			
			redirect(base_url('users/profile'));
			exit;
		}

		if(empty($error['email']) && empty($error['firstname']) && empty($error['lastname']))
		{
			$user['email'] = $this -> input -> post('email');

			$this -> User -> update_user_info($this -> input -> post(), $user['user_id']);
			$this -> session -> set_userdata('user', $user);
			
			redirect(base_url('users/profile'));
			exit;
		}

		$this -> session -> set_flashdata('error', $error);

		redirect(base_url('users/profile'));
	}

	public function change_password()
	{
		$error = $this -> User -> validate_change_pass_input();
		$user = $this -> session -> userdata('user');

		if(empty($error['new_password']) && empty($error['old_password']) && empty($error['confirm_password']))
		{
			$this -> User -> update_user_password($this -> input -> post('new_password'), $user['user_id']);
			redirect(base_url('users/profile'));
			exit;
		}

		$this -> session -> set_flashdata('error', $error);
		redirect(base_url('users/profile'));
	}

	public function process_login()
	{
		$error = $this -> User -> validate_login_input();	

		if(empty($error))
		{
			$user = $this -> User -> get_user($this -> input -> post('log_email'));
			$this -> set_user($user);
			redirect(base_url('products/dashboard'));
			exit;
		}

		$this -> session -> set_flashdata('error', $error);
		$this -> session -> set_flashdata('input', $this -> input -> post());

		redirect(base_url('users/login'));
	}

	public function process_signup()
	{
		$error = $this -> User -> validate_signup_input();	

		if(empty($error))
		{
			$user = $this -> User -> create_user($this -> input -> post());
			$this -> session -> set_flashdata('isRegistered', TRUE);

			redirect(base_url('users/signup'));
			exit;
		}
		
		$this -> session -> set_flashdata('error', $error);
		$this -> session -> set_flashdata('input', $this -> input -> post());

		redirect(base_url('users/signup'));
	}

	private function set_user($user)
	{
		$user_session = [
			'user_id' => $user -> id,
			'user_name' => ucfirst($user -> firstname),
			'isAdmin' => $user -> admin === '0'? false: true,
			'email' => $user -> email,
		];

		$this -> session -> set_userdata('user', $user_session);
	}
}