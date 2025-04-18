<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Models\TechnicalModel;

class TechnicalController extends Controller {
    public function index() {
        return $this->loadView("modals/technical-modal");
    }

    public function store($data) {
        $data['created_at'] = date('Y-m-d H:i:s');

        $technical = new TechnicalModel();
        $technical->fill($data);

        if ($technical->save()) {
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
        $technical = TechnicalModel::findById($id);
        
        $data = [
            'technical'=> $technical
        ];

        $this->loadView("modals/technical-modal", $data);
    }

    public function update($data) {
        if (!$data['id']) {
            http_response_code(400);
            Flash::set('error','An error occurred while saving');
        }

        $technical = new TechnicalModel();

        $data['updated_at'] = date('Y-m-d H:i:s');

        $technical->fill($data);
        
        if ($technical->save()) {
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
            $technical = TechnicalModel::findById($id);
            
            $data = [
                'technical'=> $technical
            ];

            $this->loadView("modals/technical-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $technical = new TechnicalModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $technical->fill($data);
            
            if ($technical->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error','An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}