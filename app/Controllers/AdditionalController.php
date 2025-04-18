<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Models\AdditionalModel;

class AdditionalController extends Controller {
    public function index() {
        return $this->loadView("modals/additional-modal");
    }

    public function store($data) {
        $data['created_at'] = date('Y-m-d H:i:s');

        $additional = new AdditionalModel();
        $additional->fill($data);

        if ($additional->save()) {
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
        $additional = AdditionalModel::findById($id);
        
        $data = [
            'additional'=> $additional
        ];

        $this->loadView("modals/additional-modal", $data);
    }

    public function update($data) {
        if (!$data['id']) {
            http_response_code(400);
            Flash::set('error','An error occurred while saving');
        }

        $additional = new AdditionalModel();

        $data['updated_at'] = date('Y-m-d H:i:s');

        $additional->fill($data);
        
        if ($additional->save()) {
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
            $additional = AdditionalModel::findById($id);
            
            $data = [
                'additional'=> $additional
            ];

            $this->loadView("modals/additional-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $additional = new AdditionalModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $additional->fill($data);
            
            if ($additional->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error','An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}