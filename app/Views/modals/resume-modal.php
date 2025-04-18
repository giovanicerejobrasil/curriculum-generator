<dialog id="resume-modal" class="w-[50%] m-auto p-5 rounded-md">
    <form action="<?= '/' . (isset($pResume->id) ? 'resume-update' : 'resume-store') ?>" method="post" class="p-3 border-2 border-(--french-rose) rounded-md">
        <div class="w-lg m-auto text-center text-4xl my-2 text-(--french-rose) border-b-3 py-2 border-w-[30%]">
            <h1>New Professional Resume</h1>
        </div>
        <div class="px-3">
            <label for="resume-text" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">
                    Resume&nbsp;<span class="required">*</span>
                </span>
                <textarea name="resume" id="resume-text" class="text-xl outline-2 outline-(--thistle) px-2 py-2 w-full h-[20rem] rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose) resize-none"><?= ($pResume->resume ?? ''); ?></textarea>
            </label>
        </div>

        <?php if (isset($pResume->id)): ?>
            <input type="hidden" name="id" value="<?= ($pResume->id); ?>">
        <?php endif; ?>

        <div class="w-full flex flex-row gap-2 justify-end">
            <button type="submit" class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                Submit
            </button>
            <button type="button" class="flex items-center bg-red-500 text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="closeModal('resume-modal')">
                Close
            </button>
        </div>
    </form>
</dialog>