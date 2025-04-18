<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Models\CourseCertificationModel;

class CourseCertificationController extends Controller {
    public function index() {
        return $this->loadView("modals/course-certification-modal");
    }

    public function store($data) {
        if ($data['conclusion_year'] < 1900 || $data['conclusion_year'] > date('Y')) {
            Flash::set('error','An error occurred while saving');
            return;
        }
        
        $data['created_at'] = date('Y-m-d H:i:s');

        $course_certification = new CourseCertificationModel();
        $course_certification->fill($data);

        if ($course_certification->save()) {
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
        $course_certification = CourseCertificationModel::findById($id);
        
        $data = [
            'course_certification'=> $course_certification
        ];
        
        $this->loadView("modals/course-certification-modal", $data);
    }

    public function update($data) {
        $course_certification = new CourseCertificationModel();

        $data['updated_at'] = date('Y-m-d H:i:s');

        $course_certification->fill($data);
        
        if ($course_certification->save()) {
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
            $course_certification = CourseCertificationModel::findById($id);
            
            $data = [
                'course_certification'=> $course_certification
            ];

            $this->loadView("modals/course-certification-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $course_certification = new CourseCertificationModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $course_certification->fill($data);
            
            if ($course_certification->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error','An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}