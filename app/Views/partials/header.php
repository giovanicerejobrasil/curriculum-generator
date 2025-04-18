<?php 
    use App\Helpers\Assets;
    use App\Helpers\Flash;
    
    Flash::display();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <?= Assets::css("build/style.min") ?>
</head>
<body class="w-full h-[100dvh] bg-(--white)">
    <div class="min-h-[100%] mx-auto flex flex-col justify-between">
        <header class="h-35 flex items-center justify-between bg-(--space-cadet)">
            <h1 class="text-5xl text-(--french-rose) mx-8 text-shadow-lg font-bold">Curriculum Generator</h1>
            <nav class="">
                <ul class="flex gap-4 justify-center mx-5">
                    <li>
                        <a href="/"
                            class="text-lg px-2 py-1 flex justify-center items-center rounded-lg bg-(--thistle) text-(--black) opacity-80 transition-all delay-50 duration-150 ease-in-out hover:bg-(--french-rose) hover:text-(--white) hover:opacity-100 shadow-lg">
                            <span class="material-symbols-outlined">home</span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/generate"
                            class="text-lg px-2 py-1 flex justify-center items-center rounded-lg bg-(--thistle) text-(--black) opacity-80 transition-all delay-50 duration-150 ease-in-out hover:bg-(--french-rose) hover:text-(--white) hover:opacity-100 shadow-lg">
                            <span class="material-symbols-outlined">settings</span>
                            <span>Generate</span>
                        </a>
                    </li>
                    <li>
                        <a href="/author"
                            class="text-lg px-2 py-1 flex justify-center items-center rounded-lg bg-(--thistle) text-(--black) opacity-80 transition-all delay-50 duration-150 ease-in-out hover:bg-(--french-rose) hover:text-(--white) hover:opacity-100 shadow-lg">
                            <span class="material-symbols-outlined">person</span>
                            <span>Author</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>