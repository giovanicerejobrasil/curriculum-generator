<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Models\SoftModel;

class SoftController extends Controller {
    public function index() {
        return $this->loadView("modals/soft-modal");
    }

    public function store($data) {
        $data['created_at'] = date('Y-m-d H:i:s');

        $soft = new SoftModel();
        $soft->fill($data);

        if ($soft->save()) {
            Flash::set("success","Saved successfully");
        } else {
            Flash::set("error","An error occurred while saving");
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
        $soft = SoftModel::findById($id);
        
        $data = [
            'soft'=> $soft
        ];

        $this->loadView("modals/soft-modal", $data);
    }

    public function update($data) {
        if (!$data['id']) {
            http_response_code(400);
            Flash::set('error','An error occurred while saving');
        }

        $soft = new SoftModel();

        $data['updated_at'] = date('Y-m-d H:i:s');

        $soft->fill($data);
        
        if ($soft->save()) {
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
            $soft = SoftModel::findById($id);
            
            $data = [
                'soft'=> $soft
            ];

            $this->loadView("modals/soft-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $soft = new SoftModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $soft->fill($data);
            
            if ($soft->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error','An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}