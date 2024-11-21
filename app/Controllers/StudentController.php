<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Student;

class StudentController extends BaseController
{
    public function index()
{
    $studentModel = new Student();

    // Pagination setup
    $perPage = 10; // Show 10 records per page

    // Fetch students with pagination, ordered by the most recent (descending order)
    $data['students'] = $studentModel->orderBy('id', 'DESC')->paginate($perPage);
    
    // Provide the pagination links
    $data['pager'] = $studentModel->pager;

    return view('students/index', $data);
}


    

    public function create()
    {
        return view('students/create');
    }

    public function store()
    {
        $studentModel = new Student();

        $studentModel->save([
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/students')->with('message', 'Student added successfully.');
    }

    public function edit($id)
    {
        $studentModel = new Student();
        $data['student'] = $studentModel->find($id);

        return view('students/edit', $data);
    }

    public function update($id)
    {
        $studentModel = new Student();

        $studentModel->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/students')->with('message', 'Student updated successfully.');
    }

    public function delete($id)
    {
        $studentModel = new Student();

        $studentModel->delete($id);

        return redirect()->to('/students')->with('message', 'Student deleted successfully.');
    }

    public function check_email()
{
    $email = $this->request->getPost('email');
    $studentModel = new \App\Models\Student();

    // Check if the email exists in the database
    $exists = $studentModel->where('email', $email)->countAllResults() > 0;

    // Return JSON response
    return $this->response->setJSON(['exists' => $exists]);
}

}