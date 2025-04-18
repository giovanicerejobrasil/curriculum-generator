<style type="text/css">
  body {
    font-family: serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-size: 12pt;
  }

  h1 {
    font-size: 14pt;
    text-transform: uppercase;
  }

  #content {
    width: 90%;
    margin-top: 2rem;
    margin-left: 2.5rem;
  }

  a:link {
    color: #1155CC;
  }

  .m-b-1rem {
    margin-bottom: 1rem;
  }

  .m-l-1rem {
    margin-left: 1rem;
  }

  .text-justify {
    text-align: justify;
  }
</style>

<body>
  <div id="content">
    <!-- Personal Information -->
    <?php if (isset($info)): ?>
      <?php foreach ($info as $i): ?>
        <div>
          <h1><?= $i->fullname; ?></h1>
          <p>
            <?= $i->city; ?>, <?= $i->state; ?> | <?= $i->phone; ?> |
            <a href="mailto:<?= $i->email; ?>"><?= $i->email; ?></a>
            |
            <a href="https://www.linkedin.com/in/<?= $i->linkedin; ?>/"
              target="_blank">https://www.linkedin.com/in/<?= $i->linkedin; ?>/</a>
            |
            <a href="<?= $i->portfolio; ?>" target="_blank"><?= $i->portfolio; ?></a>
            |
            <a href="<?= $i->website; ?>" target="_blank"><?= $i->website; ?></a>
          </p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <!-- Professional Resume -->
    <?php if (isset($resume)): ?>
      <div>
        <h1>Resumo Profissional</h1>
        <?php foreach ($resume as $r): ?>
          <p class="text-justify">
            <?= $r->resume; ?>
          </p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- Education -->
    <?php if (isset($education)): ?>
      <div>
        <h1>Formação Acadêmica</h1>
        <ul>
          <?php foreach ($education as $edu): ?>
            <li>
              <b><?= $edu->graduation; ?></b> - <?= $edu->institute; ?> | <?= $edu->date_start; ?> -
              <?php if ($edu->in_progress == 'y'): ?>
                Em andamento
              <?php else: ?>
                <?= $edu->date_end; ?>
              <?php endif; ?>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif; ?>

    <!-- Soft Skills -->
    <?php if (isset($soft)): ?>
      <div>
        <h1>Competências Comportamentais</h1>
        <p class="text-justify">
          <?= implode(' | ', $soft); ?>
        </p>
      </div>
    <?php endif; ?>

    <!-- Technical Skills -->
    <?php if (isset($technical)): ?>
      <div>
        <h1>Competências Técnicas</h1>
        <p class="text-justify">
          <?= implode(' | ', $technical); ?>
        </p>
      </div>
    <?php endif; ?>

    <!-- Professional Experience -->
    <?php if (isset($experience)): ?>
      <div>
        <h1>Experiência Profissional</h1>
        <?php foreach ($experience as $xp): ?>
          <div>
            <p>
              <b><?= $xp->job_position; ?></b> - <?= $xp->company_name; ?> |
              <?= $xp->date_start; ?> -
              <?php if ($xp->in_progress == 'y'): ?>
                Em andamento
              <?php else: ?>
                <?= $xp->date_end; ?>
              <?php endif; ?>
            </p>
            <ul>
              <?php foreach (json_decode($xp->resume, true) as $resume): ?>
                <li><?= $resume; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- Languages -->
    <?php if (isset($language)): ?>
      <div>
        <h1>Idiomas</h1>
        <ul>
          <?php foreach ($language as $lang): ?>
            <li>
              <b><?= $lang->language ?></b> - <?= $lang->proficiency; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <!-- Courses and Certifications -->
    <?php if (isset($course_certification)): ?>
      <div>
        <h1>Cursos e Certificações</h1>
        <ul>
          <?php foreach ($course_certification as $cc): ?>
            <li>
              <b><?= $cc->course_certification; ?></b> - <?= $cc->institute; ?> | <?= $cc->conclusion_year; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <!-- Additional Information -->
    <?php if (isset($additional)): ?>
      <div>
        <h1>Informações Adicionais</h1>
        <ul>
          <?php foreach ($additional as $add): ?>
            <li><?= $add->information; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</body>