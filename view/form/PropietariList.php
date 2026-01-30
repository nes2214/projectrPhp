<div class="flex flex-col justify-center items-center w-full min-h-[200px] p-6">

    <h2 class="text-2xl font-bold mb-6 text-white text-center">Llistat de Propietaris</h2>

    <?php if (empty($content)) : ?>
    <p class="text-gray-400">No s'han trobat propietaris.</p>
    <?php else : ?>
    <div class="w-full max-w-5xl overflow-hidden rounded-xl border border-gray-800 shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th class="p-4 border-b border-gray-700">Id</th>
                    <th class="p-4 border-b border-gray-700">Nom</th>
                    <th class="p-4 border-b border-gray-700">Email</th>
                    <th class="p-4 border-b border-gray-700 text-center">Mòbil</th>
                </tr>
            </thead>
            <tbody class="text-black bg-gray-200 ">
                <?php foreach ($content as $propietari): ?>
                <tr class="hover:bg-gray-300 transition-colors border-b border-gray-800 last:border-0">
                    <td class="p-4 font-mono ">
                        <?= htmlspecialchars($propietari->getId()) ?>
                    </td>
                    <td class="p-4 font-semibold">
                        <?= htmlspecialchars($propietari->getNom()) ?>
                    </td>
                    <td class="p-4 ">
                        <?= htmlspecialchars($propietari->getEmail()) ?>
                    </td>
                    <td class="p-4 text-center">
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-white border border-gray-700">
                            <?= htmlspecialchars($propietari->getMobil()) ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

</div>