<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model 
{
    public function insert_product($product)
    {
        $product_data = [
            'name' => $product['name'],
            'description' => $product['descriptio']?? 'none',
            'price' => $product['price']?? '0',
            'sold' => 0,
            'stock' => (int)$product['quantity'],
            'created_at' => date('Y-m-d'),
        ];

        $this -> db -> insert('products', $product_data);
    }

    public function all_product()
    {
        $result = $this -> db -> select('*') -> from('products') -> get() -> result();
        return $result ?? 'Something went wrong when fetching all products';
    }

    public function get_product($id)
    {
        $result = $this -> db -> select('*') -> from('products') -> where('product_id', $id) -> get() -> result();
        return $result[0] ?? 'Something went wrong when fetching product: ' . $id;
    }

    public function update_product($product)
    {
        $this -> db -> set('name', $product['name']?? 'unknown') -> set('description', $product['description']?? 'none') -> set('price', $product['price']?? 0) -> set('stock', $product['quantity']?? 0) -> set('updated_at', date('Y-m-d')) -> where('product_id', $product['product_id']) -> update('products');
    }

    public function delete_product($id)
    {
        $this -> db -> where('product_id', $id) -> delete('products');
    }

    public function add_comment($input)
    {
        $insert_data = [
                'product_id' => $input['product_id'],
                'user_id' => $input['user_id'],
                'comment' => $input['comment'],
                'created_at' =>  date('Y-m-d'),
        ];

        $this -> db -> insert('comments', $insert_data);
    }

    public function add_reply($input)
    {
        $insert_data = [
            'product_id' => $input['product_id'],
            'user_id' => $input['user_id'],
            'comment_id' => $input['comment_id'],
            'reply' => $input['reply'],
            'created_at' =>  date('Y-m-d'),
        ];

        $this -> db -> insert('replies', $insert_data);
    }

    public function get_reviews($product_id)
    {
        $comments = $this -> get_comments($product_id);

        foreach($comments as $comment)
        {
            $comment -> replies = [];
            $replies = $this -> get_replies($comment -> comment_id);
            $comment -> replies = $replies;
        }

        return $comments;
    }

    public function get_comments($product_id)
    {
        $result = $this -> db -> select('comments.*, users.firstname AS firstname, users.lastname AS lastname') 
        -> from('comments') 
        -> join('users', 'users.id = comments.user_id')
        -> where('product_id', $product_id) 
        -> get() 
        -> result();  
        return $result ?? 'Something went wrong when fetching comment in product_id: ' . $id;
    }

    public function get_replies($comment_id)
    {
       $result = $this -> db -> select('replies.*, users.firstname AS firstname, users.lastname AS lastname') 
       -> from('replies') 
       -> join('users', 'users.id = replies.user_id')
       -> where('comment_id', $comment_id) 
       -> get() 
       -> result();
       return $result ?? 'Something went wrong when fetching replies in comment_id: ' . $comment_id;
    }
}