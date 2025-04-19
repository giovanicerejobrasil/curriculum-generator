<?php require_once __DIR__ . "/partials/header.php"; ?>

<main class="flex flex-col items-center bg-(--white) py-5">
    <article class="w-[50%] text-justify my-5">
        <h1 class="text-center text-6xl font-bold my-8">Curriculum Generator</h1>
        <p class="text-lg mb-5">
            This project was created to generate a custom curriculum information for a specifc job vacancy for you used the perfect keywords and experiences for the vacancy. Of course, this project is not a magic, but it can help you to generate a curriculum with a good quality. Enjoy it!
        </p>

        <p class="text-lg">
            This project initially just generete a curriculum in brazilian portuguese. But, in the future, I will add more languages, and you can selected the language you want to use.
        </p>
    </article>

    <a
        href="/generate"
        class="my-5 px-4 py-2 text-2xl opacity-80 flex justify-center items-center rounded-lg bg-(--thistle) text-(--black) transition-all delay-50 duration-150 ease-in-out hover:bg-(--french-rose) hover:text-(--white) hover:opacity-100 shadow-lg">
        <span class="material-symbols-outlined">settings</span>
        <span>Generate</span>
    </a>
</main>

<?php require_once __DIR__ . "/partials/footer.php"; ?>