<?php

use App\Helpers\Assets;

require_once __DIR__ . "/partials/header.php"; ?>

<main class="flex flex-col items-center bg-(--white) py-5">
  <div class="w-[50%] my-5 flex flex-col items-center gap-5">
    <img src="<?= Assets::img('giovani_brasil.png') ?>" alt="Giovani Brasil"
      class="max-w-[25%] rounded-[50%]">
    <h1 class="text-6xl">&lt;&#47;Giovani Brasil&gt;</h1>
    <span class="w-full">&lt;resume&gt;</span>
    <div class="text-left text-lg">
      <p class="text-justify ml-5 mb-5">
        Hey everyone, are you ok?
      </p>
      <p class="text-left ml-5 mb-5">
        My name is Giovani Brasil, I'm 27 years old, I'm from Pará, Brazil.
        <br>
        I'm a Full-Stack Web Developer and I've been working on this area for over 4 years. My backend skills are better than the frontend ones LOL.
        <br>
        During these 4 years I've worked for 3 companies and now I'm a freelancer.
        <br>
        Nowadays I work with HTML5, CCS3, JavaScript, PHP, Laravel, VueJS, SQL and NoSQL databases and etc.
        <br>
        I love programming, this is my passion.
        <br>
        I always want to learn more and more about it.
      </p>
      <p class="text-justify ml-5 mb-5">
        So, if you're reading this it means you fell into one of my projects. I hope you enjoy it and in case it's a public repository one, feel free to use it to help on your project in some way.
      </p>
      <p class="text-justify ml-5">
        Well, good bye. See you on the next project.
      </p>
      <p class="text-justify ml-5">
        <?php if (isset($project) && is_object($project)): ?>
          This project was made with love and it's on
          <a target="_blank" href="<?= $project->link ?? '#' ?>" class="text-(--french-rose) transition-all duration-250 hover:border-b"><?= $project->name ?? 'Projeto' ?></a> GitHub.
        <?php endif; ?>
      </p>
    </div>
    <span class="w-full">&lt;&#47;resume&gt;</span>
</main>

<?php require_once __DIR__ . "/partials/footer.php"; ?>