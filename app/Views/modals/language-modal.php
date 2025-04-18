<?php var_dump($language); ?>
<dialog id="language-modal" class="w-[50%] m-auto p-5 rounded-md">
    <form action="<?= '/' . (isset($language->id) ? 'language-update' : 'language-store') ?>" method="post" class="p-3 border-2 border-(--french-rose) rounded-md">
        <div class="w-lg m-auto text-center text-4xl my-2 text-(--french-rose) border-b-3 py-2 border-w-[30%]">
            <h1>New Language</h1>
        </div>
        <div class="px-3">
            <label for="language" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Language</span>
                <input type="text" name="language" id="language"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $language->language ?? ''; ?>">
            </label>

            <label for="proficiency" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Proficiency</span>
                <input type="text" name="proficiency" id="proficiency"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $language->proficiency ?? ''; ?>">
            </label>
        </div>

        <?php if (isset($language->id)): ?>
            <input type="hidden" name="id" value="<?= ($language->id); ?>">
        <?php endif; ?>

        <div class="w-full flex flex-row gap-2 justify-end">
            <button type="submit" class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                Submit
            </button>
            <button type="button" class="flex items-center bg-red-500 text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="closeModal('language-modal')">
                Close
            </button>
        </div>
    </form>
</dialog>