<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//TODO: add user authentication check and restrict access in products CRUD functions

class products extends CI_Controller 
{
    public function __construct()
    {
        parent :: __construct();
        $this -> load -> model('Product');
    }

	public function dashboard()
	{
        $user = $this -> session -> userdata('user');

        if(!$user)
        {
            redirect(base_url('/users/login'));
            exit;
        }

        $data = [
            'title' => 'Dashboard',
            'user' => $user ,
            'products' => $this -> Product -> all_product(),
        ];

        $this -> load -> view('templates/header', $data);
        $this -> load -> view('products/nav_bar');
		$user['isAdmin'] ? $this -> load -> view('admins/dashboard') : $this -> load -> view('users/dashboard');
		$this -> load -> view('templates/footer');
	}

    public function new_product()
    {
        $data = [
            'title' => 'Add new product',
            'url' => '/products/add_product',
            'action' => 'Add',
        ];

        $this -> load -> view('templates/header', $data);
        $this -> load -> view('products/nav_bar');
		$this -> load -> view('admins/product_action');
		$this -> load -> view('templates/footer');
    }

    public function edit_product($product_id)
    {
        $data = [
            'title' => 'Edit product',
            'url' => '/products/edit_process',
            'action' => 'Save',
            'product' => $this -> Product -> get_product($product_id),
        ];

        $this -> load -> view('templates/header', $data);
        $this -> load -> view('products/nav_bar');
		$this -> load -> view('admins/product_action');
		$this -> load -> view('templates/footer');
    }

    public function edit_process()
    {
        $this -> Product -> update_product($this -> input -> post());

        redirect(base_url('products/dashboard'));
    }

    public function add_product()
    {
        if(!empty($this -> input -> post('name')) && !empty($this -> input -> post('price')));
        {
            $this -> Product -> insert_product($this -> input -> post());
        }

        redirect(base_url('products/new_product'));
    }

    public function remove_product($id)
    {
        $this -> Product -> delete_product($id);

        redirect(base_url('products/dashboard'));
    }

    public function show($id)
    {
        $data = [
            'title' => 'Product',
            'product' => $this -> Product -> get_product($id),
            'feedback' => $feedback ?? null,
            'comments' => $this -> Product -> get_reviews($id),
        ];

        $this -> load -> view('templates/header', $data);
        $this -> load -> view('products/nav_bar');
		$this -> load -> view('products/show');
		$this -> load -> view('templates/footer');
    }

    public function comment() 
    {
        $user = $this -> session -> userdata('user');

        if(empty($this -> input -> post('comment')) || empty($this -> input -> post('product_id')))
        {
            redirect(base_url('products/show/') . $this -> input -> post('product_id'));
            exit;
        }

        $comment_input = [
            'product_id' => $this -> input -> post('product_id'),
            'user_id' => $user['user_id'],
            'comment' => $this -> input -> post('comment'),
        ];
        $this -> Product -> add_comment($comment_input);
        
        redirect(base_url('products/show/') . $this -> input -> post('product_id'));
    }

    public function reply()
    {
        $user = $this -> session -> userdata('user');

        if(empty($this -> input -> post('reply')) || empty($this -> input -> post('product_id')))
        {
            redirect(base_url('products/show/') . $this -> input -> post('product_id'));
            exit;
        }
        
        $reply_input = [
            'product_id' => $this -> input -> post('product_id'),
            'user_id' => $user['user_id'],
            'comment_id' => $this -> input -> post('comment_id'),
            'reply' => $this -> input -> post('reply'),
        ];

        $this -> Product -> add_reply($reply_input);

        redirect(base_url('products/show/') . $this -> input -> post('product_id'));
    }
}
