<?php


namespace App\Controllers;

use App\Models\MessageModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $model = new MessageModel();
        $data['messages'] = $model->findAll();

        return view('home', $data);
    }

    public function submit()
    {
        $model = new MessageModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
        ];

        $model->save($data);

        return redirect()->to('/home');
    }
}
