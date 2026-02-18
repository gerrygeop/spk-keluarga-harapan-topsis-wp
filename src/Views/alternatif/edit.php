<?php if (!isset($_SESSION['user_id'])) {
    header('Location: '. BASEURL .'/middleware');
} ?>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="space-y-6">
        <div>
            <a href="<?= BASEURL; ?>/alternatif" class="text-sm text-slate-500 hover:text-primary flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
            <h2 class="text-3xl font-bold text-slate-900"><?= $data['judul']; ?></h2>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8">
                <form action="<?= BASEURL; ?>/alternatif/update" method="POST">
                    <input type="hidden" name="id_alt" value="<?= $data['alt']['id_alt'] ?>" >
                    
                    <div class="space-y-8">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-slate-700 mb-1">Nama</label>
                            <input type="text" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50" id="nama" name="nama" value="<?= $data['alt']['nama'] ?>" required>
                        </div>

                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Ibu Hamil [C1]</label>
                            <div class="space-y-2">
                                <?php foreach ($data['c1'] as $key) : ?>
                                    <div class="flex items-center">
                                        <input 
                                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500" 
                                            type="radio" 
                                            name="c1" 
                                            id="c1_<?=$key['id_sub'];?>" 
                                            value="<?= $key['id_sub']; ?>" 
                                            <?= $key['id_sub'] == $data['alt']['c1'] ? 'checked' : '' ?>
                                            required
                                        >
                                        <label class="ml-2 block text-sm text-slate-700" for="c1_<?=$key['id_sub'];?>">
                                            <?= $key['nama_sub']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Balita [C2]</label>
                            <div class="space-y-2">
                                <?php foreach ($data['c2'] as $key) : ?>
                                    <div class="flex items-center">
                                        <input 
                                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500" 
                                            type="radio" 
                                            name="c2" 
                                            id="c2_<?=$key['id_sub'];?>" 
                                            value="<?=$key['id_sub'];?>" 
                                            <?= $key['id_sub'] == $data['alt']['c2'] ? 'checked' : '' ?>
                                            required
                                        >
                                        <label class="ml-2 block text-sm text-slate-700" for="c2_<?=$key['id_sub'];?>">
                                            <?= $key['nama_sub']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Lansia [C3]</label>
                            <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50" name="c3">
                                <?php foreach ($data['c3'] as $key) : ?>
                                    <option 
                                        value="<?= $key['id_sub'] ?>" 
                                        <?= $key['id_sub'] == $data['alt']['c3'] ? 'selected' : '' ?> 
                                    >
                                        <?= $key['nama_sub']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Anak SD [C4]</label>
                            <div class="space-y-2">
                                <?php foreach ($data['c4'] as $key) : ?>
                                    <div class="flex items-center">
                                        <input 
                                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500" 
                                            type="radio" 
                                            name="c4" 
                                            id="c4_<?=$key['id_sub'];?>" 
                                            value="<?= $key['id_sub']; ?>" 
                                            <?= $key['id_sub'] == $data['alt']['c4'] ? 'checked' : '' ?>
                                            required
                                        >
                                        <label class="ml-2 block text-sm text-slate-700" for="c4_<?=$key['id_sub'];?>">
                                            <?= $key['nama_sub']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Anak SMP [C5]</label>
                            <div class="space-y-2">
                                <?php foreach ($data['c5'] as $key) : ?>
                                    <div class="flex items-center">
                                        <input 
                                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500" 
                                            type="radio" 
                                            name="c5" 
                                            id="c5_<?=$key['id_sub'];?>" 
                                            value="<?= $key['id_sub']; ?>" 
                                            <?= $key['id_sub'] == $data['alt']['c5'] ? 'checked' : '' ?>
                                            required
                                        >
                                        <label class="ml-2 block text-sm text-slate-700" for="c5_<?=$key['id_sub'];?>">
                                            <?= $key['nama_sub']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Anak SMA [C6]</label>
                            <div class="space-y-2">
                                <?php foreach ($data['c6'] as $key) : ?>
                                    <div class="flex items-center">
                                        <input 
                                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500" 
                                            type="radio" 
                                            name="c6" 
                                            id="c6_<?=$key['id_sub'];?>" 
                                            value="<?= $key['id_sub'] ?>" 
                                            <?= $key['id_sub'] == $data['alt']['c6'] ? 'checked' : '' ?>
                                            required
                                        >
                                        <label class="ml-2 block text-sm text-slate-700" for="c6_<?=$key['id_sub'];?>">
                                            <?= $key['nama_sub']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Penyandang Disabilitas [C7]</label>
                            <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50" name="c7">
                                <?php foreach ($data['c7'] as $key) : ?>
                                    <option 
                                        value="<?= $key['id_sub'] ?>" 
                                        <?= $key['id_sub'] == $data['alt']['c7'] ? 'selected' : '' ?> 
                                    >
                                        <?= $key['nama_sub']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Pekerjaan [C8]</label>
                            <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50" name="c8">
                                <?php foreach ($data['c8'] as $key) : ?>
                                    <option 
                                        value="<?= $key['id_sub'] ?>" 
                                        <?= $key['id_sub'] == $data['alt']['c8'] ? 'selected' : '' ?> 
                                    >
                                        <?= $key['nama_sub'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Status Rumah [C9]</label>
                            <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50" name="c9">
                                <?php foreach ($data['c9'] as $key) : ?>
                                    <option 
                                        value="<?= $key['id_sub']; ?>" 
                                        <?= $key['id_sub'] == $data['alt']['c9'] ? 'selected' : '' ?> 
                                    >
                                        <?= $key['nama_sub']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Jumlah Anggota Keluarga [C10]</label>
                            <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50" name="c10">
                                <?php foreach ($data['c10'] as $key) : ?>
                                    <option 
                                        value="<?= $key['id_sub'] ?>"
                                        <?= $key['id_sub'] == $data['alt']['c10'] ? 'selected' : '' ?>
                                    >
                                        <?= $key['nama_sub'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="border-t border-slate-100 pt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-3">Aset Kepemilikan [C11]</label>
                            <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50" name="c11">
                                <?php foreach ($data['c11'] as $key) : ?>
                                    <option 
                                        value="<?= $key['id_sub'] ?>"
                                        <?= $key['id_sub'] == $data['alt']['c11'] ? 'selected' : '' ?>
                                    >
                                        <?= $key['nama_sub']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
            
                    <div class="mt-8 flex justify-end gap-3">
                         <a href="<?= BASEURL; ?>/alternatif" class="px-6 py-2.5 bg-white text-slate-700 border border-slate-300 rounded-lg hover:bg-slate-50 font-medium transition-colors">Batal</a>
                        <button type="submit" class="px-6 py-2.5 bg-primary text-white rounded-lg hover:bg-blue-700 font-medium shadow-sm shadow-blue-200 transition-colors">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>