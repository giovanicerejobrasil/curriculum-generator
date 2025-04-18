<?php use App\Helpers\Assets; ?>

<script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<?= Assets::js('script') ?>

        <footer class="h-[15dvh] flex flex-col items-center text-white bg-(--black) py-3">
            <div class="w-full flex flex-row mt-3 items-center justify-center-safe gap-5">
                <div>
                    <h3 class="flex-auto text-2xl font-bold">Curriculum Generator</h3>
                </div>
    
                <span class="border-1 h-20"></span>
    
                <div>
                    <ul class="flex flex-col gap-1">
                        <li><a href="/" class="hover:border-b-1 hover:border-pink-500">Home</a></li>
                        <li><a href="/generate" class="hover:border-b-1 hover:border-pink-500">Generate</a></li>
                        <li><a href="/author" class="hover:border-b-1 hover:border-pink-500">Author</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-3">
                <p class="text-sm">
                    All rights reserved<span class="material-symbols-outlined text-pink-500 font-size-1">copyright</span> | Coded with <span class="material-symbols-outlined text-pink-500 font-size-1 fill">favorite</span> by <a href="https://github.com/giovanicerejobrasil" target="_blank" class="hover:border-b-1">Giovani Cerejo Brasil</a>
                </p>
            </div>
        </footer>
    </div>
</body>
</html>