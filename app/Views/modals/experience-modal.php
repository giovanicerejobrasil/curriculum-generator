<dialog id="experience-modal" class="w-[50%] m-auto p-5 rounded-md">
    <?php
    if (isset($experience)) {
        $experience->resume = implode(
            PHP_EOL,
            json_decode(
                $experience->resume, 
                true
            )
        );
    }
    ?>
    <form action="<?= '/' . (isset($experience->id) ? 'experience-update' : 'experience-store') ?>" method="post" class="p-3 border-2 border-(--french-rose) rounded-md">
        <div class="w-lg m-auto text-center text-4xl my-2 text-(--french-rose) border-b-3 py-2 border-w-[30%]">
            <h1>New Professional Experience</h1>
        </div>
        <div class="px-3">
            <label for="job_position" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Job Position<span class="required">&nbsp;*</span></span>
                <input type="text" name="job_position" id="job_position"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $experience->job_position ?? ''; ?>">
            </label>

            <label for="company_name" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Company Name<span class="required">&nbsp;*</span></span>
                <input type="text" name="company_name" id="company_name"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $experience->company_name ?? ''; ?>">
            </label>

            <label for="observation" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Observation</span>
                <input type="text" name="observation" id="observation"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $experience->observation ?? ''; ?>">
            </label>

            <label for="date_start" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Date Start<span class="required">&nbsp;*</span></span>
                <input type="month" name="date_start" id="date_start"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $experience->date_start ?? ''; ?>">
            </label>

            <label for="in_progress" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">In progress</span>
                <input type="checkbox" name="in_progress" id="in_progress" class="size-4 accent-(--french-rose) cursor-pointer" onclick="inProgress(this)" <?= (isset($experience->in_progress) && $experience->in_progress == 'y' ? 'checked' : '') ?>>
            </label>

            <label for="date_end" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Date End</span>
                <input type="month" name="date_end" id="date_end"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose) disabled:bg-gray-300 disabled:opacity-60" value="<?= $experience->date_end ?? ''; ?>">
            </label>

            <label for="resume" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">
                    Resume<span class="required">&nbsp;*</span>
                </span>
                <textarea name="resume" id="resume" class="text-xl outline-2 outline-(--thistle) px-2 py-2 w-full h-[20rem] rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose) resize-none"><?= ($experience->resume ?? ''); ?></textarea>
            </label>
        </div>

        <?php if (isset($experience->id)): ?>
            <input type="hidden" name="id" value="<?= ($experience->id); ?>">
        <?php endif; ?>

        <div class="w-full flex flex-row gap-2 justify-end">
            <button type="submit" class="flex items-center bg-(--cerulean) text-(--white) opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                Submit
            </button>
            <button type="button" class="flex items-center bg-red-500 text-(--white) opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="closeModal('experience-modal')">
                Close
            </button>
        </div>
    </form>
</dialog>