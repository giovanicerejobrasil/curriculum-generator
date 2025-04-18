<?php
use App\Helpers\PrintF;
?>
<dialog id="education-modal" class="w-[50%] m-auto p-5 rounded-md">
    <form action="education-delete" method="post" class="p-3 border-2 border-(--french-rose) rounded-md">
        
        <div class="w-lg m-auto text-center text-4xl my-2 text-(--french-rose) border-b-3 py-2 border-w-[30%]">
            <h1>DELETE?</h1>
        </div>
        <div class="mt-5 px-3">
            <span class="block text-2xl">Are you sure you want to delete this item?</span>
            <span class="block my-2 bg-gray-200 p-2 rounded-md">
                <?php
                    $item = "<b>{$education->graduation}</b> - {$education->institute} | " .
                    PrintF::dateFormat($education->date_start, 'm/Y') . " - " . 
                    ($education->in_progress == 'y' 
                        ? 'In Progress' 
                        : PrintF::dateFormat($education->date_end, 'm/Y'));
                    
                    echo PrintF::withSize($item, 100);
                ?>
            </span>
        </div>

        <?php if (isset($education->id)): ?>
            <input type="hidden" name="id" value="<?= ($education->id); ?>">
        <?php endif; ?>

        <div class="w-full flex flex-row gap-2 justify-end">
            <button type="submit" class="flex items-center bg-(--russian-violet) text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100">
                Delete
            </button>
            <button type="button" class="flex items-center bg-red-500 text-white opacity-80 font-semibold py-2 px-4 mt-3 rounded-md cursor-pointer transition duration-150 ease-in-out hover:scale-105 hover:opacity-100" onclick="closeModal('education-modal')">
                Close
            </button>
        </div>
    </form>
</dialog>