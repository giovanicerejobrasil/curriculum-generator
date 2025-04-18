<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\AdditionalModel;
use App\Models\CourseCertificationModel;
use App\Models\EducationModel;
use App\Models\ExperienceModel;
use App\Models\InfoModel;
use App\Models\LanguageModel;
use App\Models\ResumeModel;
use App\Models\SoftModel;
use App\Models\TechnicalModel;

class GenerateController extends Controller
{
    public function index()
    {
        $pInfo = InfoModel::where([['deleted_at', 'IS NULL']]);
        $pResume = ResumeModel::where([['deleted_at', 'IS NULL']]);
        $education = EducationModel::where([['deleted_at', 'IS NULL']]);
        $soft = SoftModel::where([['deleted_at', 'IS NULL']]);
        $technical = TechnicalModel::where([['deleted_at', 'IS NULL']]);
        $experience = ExperienceModel::where([['deleted_at', 'IS NULL']]);
        $language = LanguageModel::where([['deleted_at', 'IS NULL']]);
        $course_certification = CourseCertificationModel::where([['deleted_at', 'IS NULL']]);
        $additional = AdditionalModel::where([['deleted_at', 'IS NULL']]);

        $data = ['title' => PROJECT_NAME . ' - Generate',];

        if ($pInfo) $data['pInfo'] = $pInfo;
        if ($pResume) $data['pResume'] = $pResume;
        if ($pResume) $data['education'] = $education;
        if ($soft) $data['soft'] = $soft;
        if ($technical) $data['technical'] = $technical;
        if ($experience) $data['experience'] = $experience;
        if ($language) $data['language'] = $language;
        if ($course_certification) $data['course_certification'] = $course_certification;
        if ($additional) $data['additional'] = $additional;

        $this->loadView('generate', $data);
    }
}
