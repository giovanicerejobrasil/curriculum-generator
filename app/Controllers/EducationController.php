<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Helpers\PrintF;
use App\Models\EducationModel;

class EducationController extends Controller {
    public function index() {
        return $this->loadView("modals/education-modal");
    }

    public function store($data) {
        if (!isset($data['in_progress']) && !isset($data['date_end'])) {
            Flash::set('error', 'An error occurred while saving');
            header('Location: /generate');
            exit;
        }

        if (isset($data['in_progress']) && isset($data['date_end'])) {
            Flash::set('error', 'An error occurred while saving');
            header('Location: /generate');
            exit;
        }

        if (isset($data['in_progress'])) $data['in_progress'] = 'y';
        if (!isset($data['in_progress'])) $data['in_progress'] = 'n';

        $data['created_at'] = date('Y-m-d H:i:s');

        $education = new EducationModel();
        $education->fill($data);

        if ($education->save()) {
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
        $education = EducationModel::findById($id);
        
        $data = [
            'education'=> $education
        ];

        $this->loadView("modals/education-modal", $data);
    }

    public function update($data) {
        if (!isset($data['in_progress']) && !isset($data['date_end'])) {
            Flash::set('error', 'An error occurred while saving');
            header('Location: /generate');
            exit;
        }

        if (isset($data['in_progress']) && isset($data['date_end'])) {
            Flash::set('error', 'An error occurred while saving');
            header('Location: /generate');
            exit;
        }

        if (isset($data['in_progress'])) {
            $data['in_progress'] = 'y';
            $data['date_end'] = '';
        }
        if (!isset($data['in_progress'])) $data['in_progress'] = 'n';

        $education = new EducationModel();

        $data['updated_at'] = date('Y-m-d H:i:s');

        $education->fill($data);
        
        if ($education->save()) {
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
            $education = EducationModel::findById($id);
            
            $data = [
                'education'=> $education
            ];

            $this->loadView("modals/education-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $education = new EducationModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $education->fill($data);
            
            if ($education->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error','An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}