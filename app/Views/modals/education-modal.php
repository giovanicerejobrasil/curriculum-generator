<dialog id="education-modal" class="w-[50%] m-auto p-5 rounded-md">
    <form action="<?= '/' . (isset($education->id) ? 'education-update' : 'education-store') ?>" method="post" class="p-3 border-2 border-(--french-rose) rounded-md">
        <div class="w-lg m-auto text-center text-4xl my-2 text-(--french-rose) border-b-3 py-2 border-w-[30%]">
            <h1>New Education</h1>
        </div>
        <div class="px-3">
            <label for="graduation" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Graduation</span>
                <input type="text" name="graduation" id="graduation"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $education->graduation ?? ''; ?>">
            </label>

            <label for="institute" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Institute</span>
                <input type="text" name="institute" id="institute"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $education->institute ?? ''; ?>">
            </label>

            <label for="date_start" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Date Start</span>
                <input type="month" name="date_start" id="date_start"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $education->date_start ?? ''; ?>">
            </label>

            <label for="in_progress" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">In progress</span>
                <input type="checkbox" name="in_progress" id="in_progress" class="size-4 accent-(--french-rose) cursor-pointer" onclick="inProgress(this)" <?= (isset($education->in_progress) && $education->in_progress == 'y' ? 'checked' : '') ?>>
            </label>

            <label for="date_end" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Date End</span>
                <input type="month" name="date_end" id="date_end"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose) disabled:bg-gray-300 disabled:opacity-60" value="<?= $education->date_end ?? ''; ?>">
            </label>
        </div>

        <?php if (isset($education->id)): ?>
            <input type="hidden" name="id" value="<?= ($education->id); ?>">
        <?php endif; ?>

        <div class="w-full flex flex-row gap-2 justify-end">
            <button type="submit" class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                Submit
            </button>
            <button type="button" class="flex items-center bg-red-500 text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="closeModal('education-modal')">
                Close
            </button>
        </div>
    </form>
</dialog>