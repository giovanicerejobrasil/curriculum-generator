<?php
require_once __DIR__ . "/partials/header.php";

use App\Helpers\PrintF;
?>

<main class="flex flex-col items-center bg-(--white) py-5">
    <form action="/curriculum-generate" method="post" class="w-full flex flex-col items-center">
        <!-- Personal Information -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">person</span>
                <span class="underline">Personal Information</span>
            </summary>

            <button type="button" id="resume-btn" onclick="openModal('info-modal')" class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2">
                <?php if (isset($pInfo)) : ?>
                    <?php foreach ($pInfo as $info): ?>
                        <label for="pi-<?= $info->id ?>" class="w-full flex flex-row items-start gap-2 mb-3">
                            <input type="radio" name="info" id="pi-<?= $info->id ?>" class="size-4 accent-(--french-rose) cursor-pointer" value="<?= $info->id ?>">
                            <div class="w-full flex gap-[1rem] border-2 border-(--space-cadet) rounded-md p-2">
                                <span class="w-full cursor-text text-justify">
                                    <h1 class="text-lg font-bold">
                                        <?= $info->fullname ?>
                                    </h1>
                                    <p>
                                        <?= "{$info->city}, {$info->state} | {$info->phone}" ?>
                                    </p>
                                    <p>
                                        <?= "{$info->email} | " ?>
                                        <?= "https://linkedin.com/in/{$info->linkedin} | " ?>
                                        <?= "{$info->portfolio} | {$info->website}" ?>
                                    </p>
                                </span>

                                <div class="flex flex-col">
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('info-modal', <?= $info->id ?>)">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold">
                                        <span class="material-symbols-outlined" onclick="openModalEdit('info-modal', <?= $info->id ?>)">border_color</span>
                                    </button>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <!-- Professional Resume -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">description</span>
                <span class="underline">Professional Resume</span>
            </summary>

            <button type="button" id="resume-btn" onclick="openModal('resume-modal')" class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2">
                <?php if (isset($pResume)): ?>
                    <?php foreach ($pResume as $resume): ?>
                        <label for="pr-<?= $resume->id ?>" class="w-full flex flex-row items-start gap-2 mb-3">
                            <input type="radio" name="resume" id="pr-<?= $resume->id ?>" class="size-4 accent-(--french-rose) cursor-pointer" value="<?= $resume->id ?>">
                            <div class="w-full flex gap-[1rem] border-2 border-(--space-cadet) rounded-md p-2">
                                <span class="w-full cursor-text text-justify">
                                    <p class="text-lg">
                                        <?= nl2br(htmlspecialchars($resume->resume)); ?>
                                    </p>
                                </span>

                                <div class="flex flex-col">
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('resume-modal', <?= $resume->id ?>)">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold">
                                        <span class="material-symbols-outlined" onclick="openModalEdit('resume-modal', <?= $resume->id ?>)">border_color</span>
                                    </button>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <!-- Education -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">school</span>
                <span class="underline">Education</span>
            </summary>

            <button type="button" id="education-btn"
                class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="openModal('education-modal')">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2">
                <?php if (isset($education)): ?>
                    <?php foreach ($education as $edu): ?>
                        <label for="ed-<?= $edu->id ?>" class="w-full flex flex-row items-center gap-2 mb-3">
                            <input type="checkbox" name="education[]" id="ed-<?= $edu->id ?>"
                                class="size-4 accent-(--french-rose) cursor-pointer" value="<?= $edu->id ?>">
                            <div class="w-full flex gap-[1rem] border-2 border-(--space-cadet) rounded-md p-2">
                                <span class="w-full cursor-text">
                                    <b><?= $edu->graduation ?></b> - <?= $edu->institute ?> |
                                    <?= PrintF::dateFormat($edu->date_start, 'm/Y') ?> - <?= ($edu->in_progress == 'y') ? 'In Progress' : PrintF::dateFormat($edu->date_end, 'm/Y') ?>
                                </span>

                                <div class="flex flex-row">
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('education-modal', <?= $edu->id ?>)">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold">
                                        <span class="material-symbols-outlined" onclick="openModalEdit('education-modal', <?= $edu->id ?>)">
                                            <span class="material-symbols-outlined">border_color</span>
                                    </button>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <!-- Soft Skills -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">mindfulness</span>
                <span class="underline">Soft Skills</span>
            </summary>

            <button type="button" id="behavioral-btn"
                class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="openModal('soft-modal')">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2 grid grid-cols-4 auto-cols-max gap-2">
                <?php if (isset($soft)): ?>
                    <?php foreach ($soft as $ss): ?>
                        <label for="ss-<?= $ss->id ?>"
                            class="w-full flex items-center justify-between border-2 border-(--space-cadet) p-2 rounded-md cursor-pointer transition duration-300 ease-in-out hover:bg-(--thistle)">
                            <input type="checkbox" name="soft[]" id="ss-<?= $ss->id ?>"
                                class="size-4 accent-(--french-rose) absolute top-0 right-0" hidden value="<?= $ss->id ?>"
                                onclick="checkAndUncheck(this)">
                            <span class="w-full text-center select-none">
                                <b><?= $ss->skill ?></b>
                            </span>

                            <div class="flex flex-col">
                                <button type="button"
                                    class="flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('soft-modal', <?= $ss->id ?>)">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                                <button type="button"
                                    class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold">
                                    <span class="material-symbols-outlined" onclick="openModalEdit('soft-modal', <?= $ss->id ?>)">
                                        <span class="material-symbols-outlined">border_color</span>
                                </button>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <!-- Technical Skills -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">psychology</span>
                <span class="underline">Technical Skills</span>
            </summary>

            <button type="button" id="technical-btn"
                class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="openModal('technical-modal')">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2 grid grid-cols-4 auto-cols-max gap-2">
                <?php if (isset($technical)): ?>
                    <?php foreach ($technical as $tec): ?>
                        <label for="ts-<?= $tec->id ?>" class="w-full flex items-center justify-between border-2 border-(--space-cadet) p-2 rounded-md cursor-pointer transition duration-300 ease-in-out hover:bg-(--thistle)">
                            <input type="checkbox" name="technical[]" id="ts-<?= $tec->id ?>"
                                class="size-4 accent-(--french-rose) absolute top-0 right-0" hidden value="<?= $tec->id ?>"
                                onclick="checkAndUncheck(this)">
                            <span class="w-full text-center select-none">
                                <b><?= $tec->skill; ?></b>
                            </span>

                            <div class="flex flex-col">
                                <button type="button"
                                    class="flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('technical-modal', <?= $tec->id ?>)">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                                <button type="button"
                                    class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold">
                                    <span class="material-symbols-outlined" onclick="openModalEdit('technical-modal', <?= $tec->id ?>)">
                                        <span class="material-symbols-outlined">border_color</span>
                                </button>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <!-- Professional Experiences -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">work</span>
                <span class="underline">Professional Experiences</span>
            </summary>

            <button type="button" id="professional-btn"
                class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="openModal('experience-modal')">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2">
                <?php if (isset($experience)): ?>
                    <?php foreach ($experience as $xp): ?>
                        <label for="pe-<?= $xp->id ?>" class="w-full flex flex-row items-start gap-2 mb-3">
                            <input type="checkbox" name="experience[]" id="pe-<?= $xp->id ?>"
                                class="size-4 accent-(--french-rose) cursor-pointer" value="<?= $xp->id ?>">
                            <div class="w-full flex flex-row border-2 border-(--space-cadet) rounded-md p-2">
                                <span class="w-full cursor-text">
                                    <p class="text-lg">
                                        <b><?= $xp->job_position ?></b> - <?= $xp->company_name ?> | <?= PrintF::dateFormat($xp->date_start, 'm/Y') ?> - <?= ($xp->in_progress == 'y') ? "In Progress" : PrintF::dateFormat($xp->date_end, 'm/Y') ?>
                                        (<?= $xp->observation ?>)
                                    </p>
                                    <ul class="list-disc list-inside pl-2">
                                        <?php
                                        $xp->resume = json_decode($xp->resume, true);
                                        ?>
                                        <?php foreach ($xp->resume as $resume): ?>
                                            <?php if (!empty($resume)): ?>
                                                <li>
                                                    <?= $resume ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </span>

                                <div class="flex flex-col">
                                    <button type="button"
                                        class="w-full flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('experience-modal', <?= $xp->id ?>)">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold">
                                        <span class="material-symbols-outlined" onclick="openModalEdit('experience-modal', <?= $xp->id ?>)">
                                            <span class="material-symbols-outlined">border_color</span>
                                    </button>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <!-- Languages -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">language</span>
                <span class="underline">Languages</span>
            </summary>

            <button type="button" id="languages-btn"
                class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="openModal('language-modal')">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2">
                <?php if (isset($language)): ?>
                    <?php foreach ($language as $lang): ?>
                        <label for="lg-<?= $lang->id ?>" class="w-full flex flex-row items-center gap-2 mb-3">
                            <input type="checkbox" name="language[]" id="lg-<?= $lang->id ?>"
                                class="size-4 accent-(--french-rose) cursor-pointer" value="<?= $lang->id ?>">
                            <div
                                class="w-full flex gap-[1rem] border-2 border-(--space-cadet) rounded-md p-2">
                                <span class="w-full cursor-text">
                                    <b><?= $lang->language ?></b> - <?= $lang->proficiency ?>
                                </span>

                                <div class="flex flex-row">
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('language-modal', <?= $lang->id ?>)">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold"
                                        onclick="openModalEdit('language-modal', <?= $lang->id ?>)">
                                        <span class="material-symbols-outlined">border_color</span>
                                    </button>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <!-- Courses and Certifications -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">badge</span>
                <span class="underline">Courses and Certifications</span>
            </summary>

            <button type="button" id="courses-btn"
                class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="openModal('course-certification-modal')">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2">
                <?php if (isset($course_certification)): ?>
                    <?php foreach ($course_certification as $cc): ?>
                        <label for="cc-<?= $cc->id ?>" class="w-full flex flex-row items-center gap-2 mb-3">
                            <input type="checkbox" name="course_certification[]" id="cc-<?= $cc->id ?>"
                                class="size-4 accent-(--french-rose) cursor-pointer" value="<?= $cc->id ?>">
                            <div
                                class="w-full flex gap-[1rem] border-2 border-(--space-cadet) rounded-md p-2">
                                <span class="w-full cursor-text">
                                    <b><?= $cc->course_certification ?></b> - <?= $cc->institute ?> | <?= $cc->conclusion_year ?>
                                </span>

                                <div class="flex flex-row">
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('course-certification-modal', <?= $cc->id ?>)">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalEdit('course-certification-modal', <?= $cc->id ?>)">
                                        <span class="material-symbols-outlined">
                                            <span class="material-symbols-outlined">border_color</span>
                                    </button>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <!-- Additional Information -->
        <details class="w-[85dvw] p-4 rounded-sm border-2 border-(--space-cadet) mb-3 shadow-lg">
            <summary class="flex items-center gap-2 text-(--french-rose) cursor-pointer uppercase select-none font-bold">
                <span class="material-symbols-outlined">info</span>
                <span class="underline">Additional Information</span>
            </summary>

            <button type="button" id="additional-btn"
                class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-3 my-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="openModal('additional-modal')">
                <span class="material-symbols-outlined">add</span>New Item
            </button>

            <div class="my-2">
                <?php if (isset($additional)): ?>
                    <?php foreach ($additional as $add): ?>
                        <label for="ai-<?= $add->id ?>" class="w-full flex flex-row items-center gap-2 mb-3">
                            <input type="checkbox" name="additional[]" id="ai-<?= $add->id ?>"
                                class="size-4 accent-(--french-rose) cursor-pointer" value="<?= $add->id ?>">
                            <div class="w-full flex gap-[1rem] border-2 border-(--space-cadet) rounded-md p-2">
                                <span class="w-full cursor-text">
                                    <?= $add->information ?>
                                </span>

                                <div class="flex flex-row">
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:bg-red-500 hover:text-(--white) p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalDelete('additional-modal', <?= $add->id ?>)">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <button type="button"
                                        class="flex items-center text-(--space-cadet) hover:text-black hover:bg-yellow-300 p-1 rounded-md text-lg cursor-pointer font-bold" onclick="openModalEdit('additional-modal', <?= $add->id ?>)">
                                        <span class="material-symbols-outlined">
                                            <span class="material-symbols-outlined">border_color</span>
                                    </button>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </details>

        <div class="py-5">
            <button type="submit" class="text-3xl text-(--french-rose) border-2 border-(--french-rose) rounded-lg px-3 py-1 transition delay-50 duration-300 ease-in-out hover:bg-(--french-rose) hover:text-(--white) cursor-pointer shadow-lg">
                <span class="material-symbols-outlined animate-[spin_2.5s_linear_infinite]">settings</span>Generate
            </button>
        </div>
    </form>

    <div id="modal-container"></div>
</main>

<?php require_once __DIR__ . "/partials/footer.php"; ?>