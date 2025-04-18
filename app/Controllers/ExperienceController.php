<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Models\ExperienceModel;

class ExperienceController extends Controller {
    public function index() {
        return $this->loadView("modals/experience-modal");
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

        if (isset($data['resume'])) {
            $data['resume'] = trim($data['resume']);
            
            $data['resume'] = json_encode(
                explode(PHP_EOL, $data['resume']),
                JSON_UNESCAPED_UNICODE
            );
        }
        
        $data['created_at'] = date('Y-m-d H:i:s');

        $experience = new ExperienceModel();
        $experience->fill($data);

        if ($experience->save()) {
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
        $experience = ExperienceModel::findById($id);

        // $experience->resume = json_decode($experience->resume);
        
        $data = [
            'experience'=> $experience
        ];

        $this->loadView("modals/experience-modal", $data);
    }

    public function update($data) {
        if (!$data['id']) {
            http_response_code(400);
            Flash::set('error','An error occurred while saving');
        }

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

        $experience = new ExperienceModel();

        if (isset($data['resume'])) {
            $data['resume'] = json_encode(
                explode('\r\n', $data['resume']), 
                JSON_UNESCAPED_UNICODE
            );
            var_dump($data['resume']);die;
        }

        $data['updated_at'] = date('Y-m-d H:i:s');

        $experience->fill($data);
        
        if ($experience->save()) {
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
            $experience = ExperienceModel::findById($id);
            
            $data = [
                'experience'=> $experience
            ];

            $this->loadView("modals/experience-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $experience = new ExperienceModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $experience->fill($data);
            
            if ($experience->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error','An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}