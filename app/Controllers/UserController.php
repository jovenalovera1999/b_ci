<?php

namespace App\Controllers;

use App\Models\GenderModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function listUsers() {
        // Call user model and fetch all users from users table in database
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        // Return to user list module with users value
        return view('user/list', $data);
    }

    public function addUser() {
        // Declare array for data variable
        // Declare helper form for set value in form
        $data = array();
        helper(['form']);

        // When button save clicked
        if($this->request->getMethod() == 'post') {
            // Fetch all values from form
            $post = $this->request->getPost(['first_name', 'middle_name', 'last_name', 'age', 'gender_id', 'email', 'password']);

            // Validate each fields
            $rules = [
                'first_name' => ['label' => 'first name', 'rules' => 'required'],
                'middle_name' => ['label' => 'middle_name', 'rules' => 'permit_empty'],
                'last_name' => ['label' => 'last name', 'rules' => 'required'],
                'age' => ['label' => 'age', 'rules' => 'required|numeric'],
                'gender_id' => ['label' => 'gender', 'rules' => 'required'],
                'email' => ['label' => 'email', 'rules' => 'required|valid_email|is_unique[users.email]'],
                'password' => ['label' => 'password', 'rules' => 'required'],
                'confirm_password' => ['label' => 'confirm password', 'rules' => 'required_with[password]|matches[password]']
            ];

            // Check if there are invalid field. Otherwise, save user to users table in database
            if(! $this->validate($rules)) {
                // Validation to show list of errors in add user module
                $data['validation'] = $this->validator;
            } else {
                // Encrpyt password
                $post['password'] = sha1($post['password']);

                // Call user model to save the user in users table in database
                $userModel = new UserModel();
                $userModel->save($post);

                // Create, set and show the success message after user saved
                $session = session();
                $session->setflashdata('success_save_user', 'User successfully saved!');

                // Return to list of users module after user saved
                return redirect()->to('/');
            }
        }

        // Call gender model and fetch all genders value from genders table in database
        $genderModel = new GenderModel();
        $data['genders'] = $genderModel->findAll();

        // Return to add user module with genders value from genders table in database
        return view('/user/add', $data);
    }

    public function editUser($id) {
        // Declare array for data variable
        // Declare helper form for set value in form
        $data = array();
        helper(['form']);

        // When button save clicked
        if($this->request->getMethod() == 'put') {
            // Fetch all values from form
            $post = $this->request->getPost(['first_name', 'middle_name', 'last_name', 'age', 'gender_id', 'email', 'password']);

            // Validate each fields
            $rules = [
                    'first_name' => ['label' => 'first name', 'rules' => 'required'],
                    'middle_name' => ['label' => 'middle_name', 'rules' => 'permit_empty'],
                    'last_name' => ['label' => 'last name', 'rules' => 'required'],
                    'age' => ['label' => 'age', 'rules' => 'required|numeric'],
                    'gender_id' => ['label' => 'gender', 'rules' => 'required'],
                    'email' => ['label' => 'email', 'rules' => 'required|valid_email|is_unique[users.email, user_id, ' . $id . ']']
                ];

            // Check if there are invalid field. Otherwise, save user to users table in database
            if (!$this->validate($rules)) {
                // Validation to show list of errors in edit user module
                $data['validation'] = $this->validator;
            } else {
                // Encrpyt password
                $post['password'] = sha1($post['password']);

                // Call user model to save the user in users table in database
                $userModel = new UserModel();
                $userModel->update($id, $post);

                // Create, set and show the success message after user saved
                $session = session();
                $session->setflashdata('success_save_user', 'User successfully updated!');

                // Return to list of users module after user saved
                return redirect()->to('/');
            }
        }

        // Call gender model and fetch all genders value from genders table in database
        $genderModel = new GenderModel();
        $data['genders'] = $genderModel->findAll();

        // Call user model and fetch the selected user from users table in database
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        // Return to edit user module with genders and user value from genders and users table in database
        return view('user/edit', $data);
    }
}
