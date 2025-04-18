<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\PrintF;
use App\Models\AdditionalModel;
use App\Models\CourseCertificationModel;
use App\Models\EducationModel;
use App\Models\ExperienceModel;
use App\Models\InfoModel;
use App\Models\LanguageModel;
use App\Models\ResumeModel;
use App\Models\SoftModel;
use App\Models\TechnicalModel;
use Dompdf\Dompdf;

class CurriculumGenerateController extends Controller
{
  public function generate($data)
  {
    $newData = $this->getAllData($data);

    $html = $this->renderHTML('templates/curriculum_ptbr', $newData);

    $domPdf = new Dompdf();
    $domPdf->loadHtml($html);
    $domPdf->setPaper('A4', 'portrait');
    $domPdf->render();

    $pdfOutput = $domPdf->output();
    $pdfName = $this->nameGenerate();
    file_put_contents(__DIR__ . '/../../public/files/curriculums/' . $pdfName . '.pdf', $pdfOutput);

    header("Location: /files/" . $pdfName . ".pdf");
  }

  private function getAllData($data)
  {
    $newData = [];

    $info = InfoModel::where([
      ['id', '=', $data['info'], 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);
    $resume = ResumeModel::where([
      ['id', '=', $data['resume'], 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);
    $education = EducationModel::where([
      ['id', 'IN', '(' . implode(',', $data['education']) . ')', 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);
    $soft = SoftModel::where([
      ['id', 'IN', '(' . implode(',', $data['soft']) . ')', 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);
    $technical = TechnicalModel::where([
      ['id', 'IN', '(' . implode(',', $data['technical']) . ')', 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);
    $expirience = ExperienceModel::where([
      ['id', 'IN', '(' . implode(',', $data['experience']) . ')', 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);
    $language = LanguageModel::where([
      ['id', 'IN', '(' . implode(',', $data['language']) . ')', 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);
    $course_certification = CourseCertificationModel::where([
      ['id', 'IN', '(' . implode(',', $data['course_certification']) . ')', 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);
    $additional = AdditionalModel::where([
      ['id', 'IN', '(' . implode(',', $data['additional']) . ')', 'AND'],
      ['deleted_at', 'IS NULL'],
    ]);

    $newData['info'] = $info ?? [];
    $newData['resume'] = $resume ?? [];
    $newData['education'] = $education ?? [];
    $newData['soft'] = $soft ?? [];
    $newData['technical'] = $technical ?? [];
    $newData['experience'] = $expirience ?? [];
    $newData['language'] = $language ?? [];
    $newData['course_certification'] = $course_certification ?? [];
    $newData['additional'] = $additional ?? [];

    return $newData;
  }

  private function renderHTML($fileName, $data)
  {
    extract($data);
    $soft = $this->adjustSoft($soft);
    $technical = $this->adjustTechnical($technical);

    ob_start();

    require __DIR__ . "/../../public/files/{$fileName}.php";

    return ob_get_clean();
  }

  private function adjustSoft($soft)
  {
    $newSoft = [];
    foreach ($soft as $s) {
      $newSoft[] = $s->skill;
    }

    return $newSoft;
  }

  private function adjustTechnical($technical)
  {
    $newTechnical = [];
    foreach ($technical as $t) {
      $newTechnical[] = $t->skill;
    }

    return $newTechnical;
  }

  private function nameGenerate()
  {
    return "Curriculum-" . date('dmYHis');
  }
}
