<dialog id="info-modal" class="w-[50%] m-auto p-5 rounded-md">
    <form action="<?= '/' . (isset($pInfo->id) ? 'info-update' : 'info-store') ?>" method="post" class="p-3 border-2 border-(--french-rose) rounded-md">
        <div class="w-lg m-auto text-center text-4xl my-2 text-(--french-rose) border-b-3 py-2 border-w-[30%]">
            <h1>New Personal Information</h1>
        </div>
        <div class="px-3">
            <label for="fullname" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Full Name</span>
                <input type="text" name="fullname" id="fullname"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $pInfo->fullname ?? ''; ?>">
            </label>

            <label for="city" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">City</span>
                <input type="text" name="city" id="city"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $pInfo->city ?? ''; ?>">
            </label>

            <label for="state" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">State</span>
                <input type="text" name="state" id="state"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $pInfo->state ?? ''; ?>">
            </label>

            <label for="phone" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Phone</span>
                <input type="text" name="phone" id="phone"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $pInfo->phone ?? ''; ?>">
            </label>

            <label for="email" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">E-mail</span>
                <input type="email" name="email" id="email"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $pInfo->email ?? ''; ?>">
            </label>

            <label for="linkedin" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">LinkedIn</span>
                <input type="text" name="linkedin" id="linkedin"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $pInfo->linkedin ?? ''; ?>">
            </label>

            <label for="portfolio" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Portfolio</span>
                <input type="text" name="portfolio" id="portfolio"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $pInfo->portfolio ?? ''; ?>">
            </label>

            <label for="website" class="block mt-3">
                <span class="text-lg text-(--french-rose) cursor-pointer">Website</span>
                <input type="text" name="website" id="website"
                    class="text-xl outline-2 outline-(--thistle) px-2 py-1 w-full rounded-sm focus:caret-(--french-rose) focus:outline-(--french-rose)" value="<?= $pInfo->website ?? ''; ?>">
            </label>
        </div>

        <?php if (isset($pInfo->id)): ?>
            <input type="hidden" name="id" value="<?= ($pInfo->id); ?>">
        <?php endif; ?>

        <div class="w-full flex flex-row gap-2 justify-end">
            <button type="submit" class="flex items-center bg-(--cerulean) text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                Submit
            </button>
            <button type="button" class="flex items-center bg-red-500 text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="closeModal('info-modal')">
                Close
            </button>
        </div>
    </form>
</dialog>