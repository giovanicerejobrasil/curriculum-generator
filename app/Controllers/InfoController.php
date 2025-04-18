<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Flash;
use App\Models\InfoModel;

class InfoController extends Controller
{
    public function index()
    {
        $this->loadView("modals/info-modal");
    }

    public function store($data)
    {
        $pInfo = new InfoModel();

        $data['created_at'] = date('Y-m-d H:i:s');

        $pInfo->fill($data);

        if ($pInfo->save()) {
            Flash::set('success', 'Saved successfully');
        } else {
            Flash::set('error', 'An error occurred while saving');
        }

        header('Location: /generate');
        exit;
    }

    public function edit(?int $id)
    {
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Error while editing']);
            return;
        }

        http_response_code(200);
        $pInfo = InfoModel::findById($id);

        $data = [
            'pInfo' => $pInfo
        ];

        $this->loadView("modals/info-modal", $data);
    }

    public function update($data)
    {
        $pInfo = new InfoModel();

        $data['updated_at'] = date('Y-m-d H:i:s');

        $pInfo->fill($data);

        if ($pInfo->save()) {
            Flash::set('success', 'Saved successfully');
        } else {
            Flash::set('error', 'An error occurred while saving');
        }

        header('Location: /generate');
        exit;
    }

    public function delete($data)
    {
        $id = $data['id'];

        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Error while editing']);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            http_response_code(200);
            $pInfo = InfoModel::findById($id);

            $data = [
                'pInfo' => $pInfo
            ];

            $this->loadView("modals/info-modal-delete", $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pInfo = new InfoModel();

            $data['deleted_at'] = date('Y-m-d H:i:s');

            $pInfo->fill($data);

            if ($pInfo->save()) {
                Flash::set('success', 'Saved successfully');
            } else {
                Flash::set('error', 'An error occurred while saving');
            }

            header('Location: /generate');
            exit;
        }
    }
}
