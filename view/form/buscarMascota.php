<div class="flex flex-col justify-center items-center w-full min-h-[200px]">

    <h2 class="text-2xl font-bold mb-6 text-black text-center">Llistat de Mascotes</h2>

    <?php if (empty($content)) : ?>
    <p class="text-gray-400">No s'han trobat mascotes.</p>
    <?php else : ?>
    <div class="w-full max-w-4xl overflow-hidden rounded-xl border border-gray-800 shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead class=" bg-gray-800 text-gray-300">
                <tr>
                    <th class="p-4 border-b">ID</th>
                    <th class="p-4 border-b">Nom</th>
                    <th class="p-4 border-b text-center">ID Propietari</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                <?php foreach ($content as $mascota): ?>
                <tr class="hover:bg-gray-200 text-black transition-colors border-b border-gray-800 last:border-0">
                    <td class="p-4"><?= htmlspecialchars($mascota->getId()) ?></td>
                    <td class="p-4"><?= htmlspecialchars($mascota->getNom()) ?></td>
                    <td class="p-4 text-center"><?= htmlspecialchars($mascota->getPropietari_id()) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>