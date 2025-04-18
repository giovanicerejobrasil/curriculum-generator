<?php

use App\Core\Router;
use App\Controllers\AdditionalController;
use App\Controllers\CourseCertificationController;
use App\Controllers\CurriculumGenerateController;
use App\Controllers\EducationController;
use App\Controllers\ExperienceController;
use App\Controllers\FileController;
use App\Controllers\LanguageController;
use App\Controllers\ResumeController;
use App\Controllers\SoftController;
use App\Controllers\TechnicalController;
use App\Controllers\GenerateController;
use App\Controllers\HomeController;
use App\Controllers\InfoController;
use App\Helpers\CurriculumGenerate;

$router = new Router();

session_start();

// Define rotas: a chave é a rota e o valor é uma função callback
$router->add('', function () {
    $controller = new HomeController();
    $controller->index();
});

$router->add('/generate', function () {
    $controller = new GenerateController();
    $controller->index();
});

$router->add('/author', function () {
    $controller = new HomeController();
    $controller->index();
});

// INFO ROUTE START
$router->add('/info-modal-add', function () {
    $controller = new InfoController();
    $controller->index();
});

$router->add('/info-modal-edit', function () {
    $controller = new InfoController();
    $controller->edit($_GET['id'] ?? null);
});

$router->add('/info-store', function () {
    $controller = new InfoController();
    $controller->store($_POST);
});

$router->add('/info-update', function () {
    $controller = new InfoController();
    $controller->update($_POST);
});

$router->add('/info-modal-delete', function () {
    $controller = new InfoController();
    $controller->delete($_GET);
});

$router->add('/info-delete', function () {
    $controller = new InfoController();
    $controller->delete($_POST);
});
// INFO ROUTE END

// RESUME ROUTE START
$router->add('/resume-modal-add', function () {
    $controller = new ResumeController();
    $controller->index();
});

$router->add('/resume-modal-edit', function () {
    $controller = new ResumeController();
    $controller->edit($_GET['id'] ?? null);
});

$router->add('/resume-store', function () {
    $controller = new ResumeController();
    $controller->store($_POST);
});

$router->add('/resume-update', function () {
    $controller = new ResumeController();
    $controller->update($_POST);
});

$router->add('/resume-modal-delete', function () {
    $controller = new ResumeController();
    $controller->delete($_GET);
});

$router->add('/resume-delete', function () {
    $controller = new ResumeController();
    $controller->delete($_POST);
});
// RESUME ROUTE END

// EDUCATION ROUTE START
$router->add('/education-modal-add', function () {
    $controller = new EducationController();
    $controller->index();
});

$router->add('/education-modal-edit', function () {
    $controller = new EducationController();
    $controller->edit($_GET['id'] ?? '');
});

$router->add('/education-store', function () {
    $controller = new EducationController();
    $controller->store($_POST);
});

$router->add('/education-update', function () {
    $controller = new EducationController();
    $controller->update($_POST);
});

$router->add('/education-modal-delete', function () {
    $controller = new EducationController();
    $controller->delete($_GET);
});

$router->add('/education-delete', function () {
    $controller = new EducationController();
    $controller->delete($_POST);
});
// EDUCATION ROUTE END

// SOFT ROUTE START
$router->add('/soft-modal-add', function () {
    $controller = new SoftController();
    $controller->index();
});

$router->add('/soft-store', function () {
    $controller = new SoftController();
    $controller->store($_POST);
});

$router->add('/soft-modal-edit', function () {
    $controller = new SoftController();
    $controller->edit($_GET['id'] ?? null);
});

$router->add('/soft-update', function () {
    $controller = new SoftController();
    $controller->update($_POST);
});

$router->add('/soft-modal-delete', function () {
    $controller = new SoftController();
    $controller->delete($_GET);
});

$router->add('/soft-delete', function () {
    $controller = new SoftController();
    $controller->delete($_POST);
});
// SOFT ROUTE END

// TECHNICAL ROUTE START
$router->add('/technical-modal-add', function () {
    $controller = new TechnicalController();
    $controller->index();
});

$router->add('/technical-store', function () {
    $controller = new TechnicalController();
    $controller->store($_POST);
});

$router->add('/technical-modal-edit', function () {
    $controller = new TechnicalController();
    $controller->edit($_GET['id'] ?? null);
});

$router->add('/technical-update', function () {
    $controller = new TechnicalController();
    $controller->update($_POST);
});

$router->add('/technical-modal-delete', function () {
    $controller = new TechnicalController();
    $controller->delete($_GET);
});

$router->add('/technical-delete', function () {
    $controller = new TechnicalController();
    $controller->delete($_POST);
});
// TECHNICAL ROUTE END

// EXPERIENCE ROUTE START
$router->add('/experience-modal-add', function () {
    $controller = new ExperienceController();
    $controller->index();
});

$router->add('/experience-store', function () {
    $controller = new ExperienceController();
    $controller->store($_POST);
});

$router->add('/experience-modal-edit', function () {
    $controller = new ExperienceController();
    $controller->edit($_GET['id'] ?? null);
});

$router->add('/experience-update', function () {
    $controller = new ExperienceController();
    $controller->update($_POST);
});

$router->add('/experience-modal-delete', function () {
    $controller = new ExperienceController();
    $controller->delete($_GET);
});

$router->add('/experience-delete', function () {
    $controller = new ExperienceController();
    $controller->delete($_POST);
});
// EXPERIENCE ROUTE END

// LANGUAGE ROUTE START
$router->add('/language-modal-add', function () {
    $controller = new LanguageController();
    $controller->index();
});

$router->add('/language-store', function () {
    $controller = new LanguageController();
    $controller->store($_POST);
});

$router->add('/language-modal-edit', function () {
    $controller = new LanguageController();
    $controller->edit($_GET['id'] ?? null);
});

$router->add('/language-update', function () {
    $controller = new LanguageController();
    $controller->update($_POST);
});

$router->add('/language-modal-delete', function () {
    $controller = new LanguageController();
    $controller->delete($_GET);
});

$router->add('/language-delete', function () {
    $controller = new LanguageController();
    $controller->delete($_POST);
});
// LANGUAGE ROUTE END

// COURSE CERTIFICATION ROUTE START
$router->add('/course-certification-modal-add', function () {
    $controller = new CourseCertificationController();
    $controller->index();
});

$router->add('/course-certification-store', function () {
    $controller = new CourseCertificationController();
    $controller->store($_POST);
});

$router->add('/course-certification-modal-edit', function () {
    $controller = new CourseCertificationController();
    $controller->edit($_GET['id'] ?? null);
});

$router->add('/course-certification-update', function () {
    $controller = new CourseCertificationController();
    $controller->update($_POST);
});

$router->add('/course-certification-modal-delete', function () {
    $controller = new CourseCertificationController();
    $controller->delete($_GET);
});

$router->add('/course-certification-delete', function () {
    $controller = new CourseCertificationController();
    $controller->delete($_POST);
});
// COURSE CERTIFICATION ROUTE END

// ADDITIONAL ROUTE START
$router->add('/additional-modal-add', function () {
    $controller = new AdditionalController();
    $controller->index();
});

$router->add('/additional-store', function () {
    $controller = new AdditionalController();
    $controller->store($_POST);
});

$router->add('/additional-modal-edit', function () {
    $controller = new AdditionalController();
    $controller->edit($_GET['id'] ?? null);
});

$router->add('/additional-update', function () {
    $controller = new AdditionalController();
    $controller->update($_POST);
});

$router->add('/additional-modal-delete', function () {
    $controller = new AdditionalController();
    $controller->delete($_GET);
});

$router->add('/additional-delete', function () {
    $controller = new AdditionalController();
    $controller->delete($_POST);
});
// ADDITIONAL ROUTE END

// CURRICULUM GENERATE ROUTE START
$router->add('/curriculum-generate', function () {
    $controller = new CurriculumGenerateController();
    $controller->generate($_POST);
});
// CURRICULUM GENERATE ROUTE END

// FILES ROUTE START
$router->add('/files/{:filename}', function ($fileName) {
    $controller = new FileController();
    $controller->index($fileName);
});
// FILES ROUTE END

// Despacha a rota de acordo com a URL
$router->dispatch();
