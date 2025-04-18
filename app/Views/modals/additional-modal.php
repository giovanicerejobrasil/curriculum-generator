<dialog id="additional-modal" class="w-[50%] m-auto p-5 rounded-md">
    <form action="<?= '/' . (isset($additional->id) ? 'additional-update' : 'additional-store') ?>" method="post" class="p-3 border-2 border-(--french-rose) rounded-md">
        <div class="w-lg m-auto text-center text-4xl my-2 text-(--french-rose) border-b-3 py-2 border-w-[30%]">
            <h1>New Additional Information</h1>
        </div>
        <div class="px-3">
            <label for="information" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Information&nbsp;<span class="required">*</span></span>
                <input type="text" name="information" id="information"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $additional->information ?? ''; ?>">
            </label>
        </div>

        <?php if (isset($additional->id)): ?>
            <input type="hidden" name="id" value="<?= ($additional->id); ?>">
        <?php endif; ?>

        <div class="w-full flex flex-row gap-2 justify-end">
            <button type="submit" class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                Submit
            </button>
            <button type="button" class="flex items-center bg-red-500 text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="closeModal('additional-modal')">
                Close
            </button>
        </div>
    </form>
</dialog>