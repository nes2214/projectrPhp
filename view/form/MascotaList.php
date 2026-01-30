<div class="flex flex-col justify-center items-center w-full min-h-[200px] p-6">

    <h2 class="text-2xl font-bold mb-6 text-black text-center">Llistat de Mascotes</h2>

    <?php if (empty($content)) : ?>
    <p class="text-gray-400">No s'han trobat mascotes.</p>
    <?php else : ?>
    <div class="w-full max-w-4xl overflow-hidden rounded-xl border border-gray-800 shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th class="p-4 border-b border-gray-700 uppercase text-sm tracking-wider">Id</th>
                    <th class="p-4 border-b border-gray-700 uppercase text-sm tracking-wider">Nom</th>
                    <th class="p-4 border-b border-gray-700 uppercase text-sm tracking-wider text-center">Propietari Id
                    </th>
                    <th class="p-4 border-b border-gray-700 uppercase text-sm tracking-wider text-center">Action</th>
                </tr>
            </thead>
            <tbody class=" bg-gray-200 text-black">
                <?php foreach ($content as $mascota): ?>
                <tr class="hover:bg-gray-300 transition-colors border-b border-gray-400 last:border-0">
                    <td class="p-4 font-mono font-semibold">
                        <?= htmlspecialchars($mascota->getId()) ?>
                    </td>
                    <td class="p-4">
                        <?= htmlspecialchars($mascota->getNom()) ?>
                    </td>
                    <td class="p-4 text-center">
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-white text-xs border border-gray-700">
                            <?= htmlspecialchars($mascota->getPropietari_id()) ?>
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <form method="post" action="index.php?menu=mascota">
                            <input type="hidden" name="action" value="form_modify">
                            <input type="hidden" name="id" value="<?= $mascota->getId() ?>">

                            <button type="submit"
                                class="bg-gray-800 px-4 py-1 rounded-full text-white text-xs border border-gray-700 hover:bg-gray-600 transition font-bold uppercase cursor-pointer">
                                Edit
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

</div>