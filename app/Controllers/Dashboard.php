<?php

namespace App\Controllers;


use App\Models\UserModel;
class Dashboard extends BaseController
{

    public function dashboard()
    {
        if (!$this->session->has('user')) {
            return redirect()->to('/login');
        }
        $user_model = new UserModel();

        // Pagination setup
        $page = $this->request->getVar('page') ?? 1;  // Default to page 1 if no page is set
        $perPage = 2;  // Define how many users per page
        $offset = ($page - 1) * $perPage;  // Offset for the SQL query

        // Get search query from URL
        $searchQuery = $this->request->getVar('searchQuery') ?? '';

        // Apply search filter
        if ($searchQuery) {
            // If search query is set, filter by name (or other fields)
            $users = $user_model->like('name', $searchQuery)
                ->orderBy('id', 'ASC')
                ->findAll($perPage, $offset);
        } else {
            $users = $user_model->orderBy('id', 'ASC')
                ->findAll($perPage, $offset);
        }

        // Get the total number of users for pagination
        $totalUsers = $user_model->countAll();

        // Calculate the number of pages
        $totalPages = ceil($totalUsers / $perPage);


        // $users = $user_model->findAll();
        return view('Template', [
            'users' => $users,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'searchQuery' => $searchQuery
        ]);
    }


    public function updateUser()
    {
        $user_model = new UserModel();

        // Get the submitted data
        $id = $this->request->getPost('id');
        // print( $mongoId) ; die;// Get MongoDB ID from form
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        // Prepare data for update in MySQL
        $updatedData = [];
        if ($name) $updatedData['name'] = $name;
        if ($email) $updatedData['email'] = $email;

        // Step 1: Update the user in MySQL
        $user_model->update($id, $updatedData);
        return redirect()->to('/dashboard')->with('success', 'user details updated successfully');
    }


    public function deleteUser($id)
    {
        $user_model = new UserModel();

        // Delete the user from the relational database (MySQL, etc.)
        $result = $user_model->delete($id);

        return redirect()->to('/dashboard')->with('success', 'user deleted successfully');
    }
}
