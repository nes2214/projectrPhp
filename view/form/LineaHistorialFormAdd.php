<div class="flex flex-col justify-center items-center w-full min-h-[200px] p-6">
    <div class="w-full max-w-md overflow-hidden rounded-xl border border-gray-800 shadow-2xl bg-gray-200">

        <div class="bg-gray-800 p-4">
            <h2 class="text-xl font-bold text-gray-300 text-center uppercase tracking-wider">Afegir Línia Historial</h2>
        </div>

        <form method="post" action="index.php?menu=lineaHistorial" id="historialForm" class="p-6 text-black">
            <fieldset class="space-y-4">
                <legend class="sr-only">Formulari d'Historial</legend>

                <div>
                    <label class="block text-sm font-bold mb-1" for="id">Id *:</label>
                    <input type="text" name="id" id="id" placeholder="ID de la línia"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?= (isset($content->id)) ? htmlspecialchars($content->id) : (isset($content) && method_exists($content, 'getId') ? htmlspecialchars($content->getId()) : '') ?>"
                        required />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1" for="data">Data *:</label>
                    <input type="date" name="data" id="data"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?= (isset($content)) ? htmlspecialchars($content->getData()) : '' ?>" required />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1" for="motiu_visita">Motiu visita *:</label>
                    <input type="text" name="motiu_visita" id="motiu_visita" placeholder="Ex: Vacunació"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?= (isset($content)) ? htmlspecialchars($content->getMotiuVisita()) : '' ?>" required />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1" for="descripcio">Descripció *:</label>
                    <textarea name="descripcio" id="descripcio" rows="3" placeholder="Detalls de la visita..."
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"><?= (isset($content)) ? htmlspecialchars($content->getDescripcio()) : '' ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1" for="mascota_id">Mascota ID *:</label>
                    <input type="text" name="mascota_id" id="mascota_id" placeholder="ID de la mascota"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?= (isset($content)) ? htmlspecialchars($content->getMascotaId()) : '' ?>" required />
                </div>

                <p class="text-xs text-gray-600 font-semibold">* Required fields</p>

                <div class="grid grid-cols-2 gap-2 mt-6">
                    <button type="submit" name="action" value="add"
                        class="bg-gray-800 text-white p-2 rounded hover:bg-gray-700 transition font-bold uppercase text-xs cursor-pointer">
                        Afegir Línia
                    </button>

                    <button type="button" onClick="window.location.href='index.php?menu=lineaHistorial&option=list_all'"
                        class="border border-gray-800 text-gray-800 p-2 rounded hover:bg-gray-800 hover:text-white transition font-bold uppercase text-xs cursor-pointer">
                        Cancel·lar
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>