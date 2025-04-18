<dialog id="course-certification-modal" class="w-[50%] m-auto p-5 rounded-md">
    <form action="<?= '/' . (isset($course_certification->id) ? 'course-certification-update' : 'course-certification-store') ?>" method="post" class="p-3 border-2 border-(--french-rose) rounded-md">
        <div class="w-lg m-auto text-center text-4xl my-2 text-(--french-rose) border-b-3 py-2 border-w-[30%]">
            <h1>New Course or Certification</h1>
        </div>
        <div class="px-3">
            <label for="course-certification" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Course or Certification</span>
                <input type="text" name="course_certification" id="course_certification"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $course_certification->course_certification ?? ''; ?>">
            </label>

            <label for="institute" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Institute</span>
                <input type="text" name="institute" id="institute"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $course_certification->institute ?? ''; ?>">
            </label>

            <label for="conclusion-year" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Conclusion Year</span>
                <input type="text" name="conclusion_year" id="conclusion-year"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $course_certification->conclusion_year ?? ''; ?>">
            </label>
        </div>

        <?php if (isset($course_certification->id)): ?>
            <input type="hidden" name="id" value="<?= ($course_certification->id); ?>">
        <?php endif; ?>

        <div class="w-full flex flex-row gap-2 justify-end">
            <button type="submit" class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                Submit
            </button>
            <button type="button" class="flex items-center bg-red-500 text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="closeModal('course-certification-modal')">
                Close
            </button>
        </div>
    </form>
</dialog>