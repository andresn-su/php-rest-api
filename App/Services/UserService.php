<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    public function get($id = null) {
        if($id) {
            return User::select($id);
        } else {
            return User::selectAll();
        }
    }

    public function post($id = null) {
        if($id==null) {
            return User::insert($_POST); // Insere no banco caso não haja id
        } else {
            return User::update($id, $_POST); // Atualiza caso haja uma id passada via url
        }
    }

    public function put($id = null) {
        parse_str(file_get_contents("php://input"), $data);
        return User::update($id, $data);
    }

    public function delete() {
        //
    }
}