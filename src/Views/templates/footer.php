    </main>

    <footer class="bg-white border-t border-slate-200 mt-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-slate-500 text-sm">
                    &copy; <?= date('Y'); ?> SPK Keluarga Harapan. All rights reserved.
                </div>
                <div class="flex space-x-6">
                    <a href="<?= BASEURL; ?>/home" class="text-slate-400 hover:text-slate-600 transition-colors text-sm">Home</a>
                    <a href="<?= BASEURL; ?>/home/help" class="text-slate-400 hover:text-slate-600 transition-colors text-sm">Bantuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Initialize Tooltips (if needed, though Tailwind doesn't use BS tooltips by default) -->
    <!-- Scripts can go here -->
</body>
</html>