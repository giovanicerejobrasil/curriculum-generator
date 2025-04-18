<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Models\ResumeModel;

class ResumeController extends Controller {
    public function index() {
        $this->loadView("modals/resume-modal");
    }

    public function store($data) {
        $pResume = new ResumeModel();

        $data['created_at'] = date('Y-m-d H:i:s');

        $pResume->fill($data);
        
        if ($pResume->save()) {
            Flash::set('success', 'Saved successfully');
        } else {
            Flash::set('error','An error occurred while saving');
        }

        header('Location: /generate');
        exit;
    }

    public function edit(?int $id) {
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Error while editing']);
            return;
        }

        http_response_code(200);
        $pResume = ResumeModel::findById($id);
        
        $data = [
            'pResume'=> $pResume
        ];

        $this->loadView("modals/resume-modal", $data);
    }

    public function update($data) {
        $pResume = new ResumeModel();

        $data['updated_at'] = date('Y-m-d H:i:s');

        $pResume->fill($data);
        
        if ($pResume->save()) {
            Flash::set('success', 'Saved successfully');
        } else {
            Flash::set('error','An error occurred while saving');
        }

        header('Location: /generate');
        exit;
    }

    public function delete($data) {
        $id = $data['id'];

        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Error while editing']);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            http_response_code(200);
            $pResume = ResumeModel::findById($id);
            
            $data = [
                'pResume'=> $pResume
            ];

            $this->loadView("modals/resume-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pResume = new ResumeModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $pResume->fill($data);
            
            if ($pResume->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error','An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}