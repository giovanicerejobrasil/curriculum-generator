<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Models\LanguageModel;

class LanguageController extends Controller {
    public function index() {
        return $this->loadView("modals/language-modal");
    }

    public function store($data) {
        $data['created_at'] = date('Y-m-d H:i:s');

        $language = new LanguageModel();
        $language->fill($data);

        if ($language->save()) {
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
        $language = LanguageModel::findById($id);
        
        $data = [
            'language'=> $language
        ];

        $this->loadView("modals/language-modal", $data);
    }

    public function update($data) {
        $language = new LanguageModel();

        $data['updated_at'] = date('Y-m-d H:i:s');

        $language->fill($data);
        
        if ($language->save()) {
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
            $language = LanguageModel::findById($id);
            
            $data = [
                'language'=> $language
            ];

            $this->loadView("modals/language-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $language = new LanguageModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $language->fill($data);
            
            if ($language->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error','An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}