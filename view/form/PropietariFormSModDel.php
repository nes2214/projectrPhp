<div class="flex flex-col justify-center items-center w-full min-h-[200px] p-6">
    <div class="w-full max-w-md overflow-hidden rounded-xl border border-gray-800 shadow-2xl bg-gray-200">

        <div class="bg-gray-800 p-4">
            <h2 class="text-xl font-bold text-gray-300 text-center uppercase tracking-wider">Afegir Línia Historial</h2>
        </div>

        <form method="post" action="index.php?menu=lineaHistorial" id="historialForm" class="p-6 text-black">
            <fieldset class="space-y-4">
                <legend class="sr-only">Formulari d'Historial</legend>

                <div>
                    <label class="block text-sm font-bold mb-1">Id *:</label>
                    <input type="text" placeholder="Id" name="id" id="input_id"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400 <?php if (isset($content)) echo 'bg-gray-300 cursor-not-allowed'; ?>"
                        value="<?php if (isset($content)) { echo htmlspecialchars($content->getId()); } ?>"
                        <?php if (isset($content)) { echo 'readonly'; } ?> />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">Data *:</label>
                    <input type="date" name="data" id="data"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?php if (isset($content)) { echo htmlspecialchars($content->getData()); } ?>" />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">Motiu Visita *:</label>
                    <input type="text" placeholder="Ex: Vacunació" name="motiu_visita" id="motiu_visita"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?php if (isset($content)) { echo htmlspecialchars($content->getMotiuVisita()); } ?>" />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">Descripció *:</label>
                    <textarea name="descripcio" id="descripcio" rows="3" placeholder="Detalls de la visita..."
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"><?php if (isset($content)) { echo htmlspecialchars($content->getDescripcio()); } ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">ID Mascota *:</label>
                    <input type="text" placeholder="ID de la mascota" name="mascota_id" id="mascota_id"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?php if (isset($content)) { echo htmlspecialchars($content->getMascotaId()); } ?>" />
                </div>

                <p class="text-xs text-gray-600 font-semibold">* Required fields</p>

                <div class="grid grid-cols-3 gap-2 mt-6">
                    <button type="submit" name="action" value="add"
                        class="bg-gray-800 text-white p-2 rounded hover:bg-gray-700 transition font-bold uppercase text-xs cursor-pointer">Add</button>

                    <button type="submit" name="action" value="modify"
                        class="bg-gray-800 text-white p-2 rounded hover:bg-gray-700 transition font-bold uppercase text-xs cursor-pointer">Modify</button>

                    <button type="button" onClick="document.getElementById('historialForm').reset();"
                        class="border border-gray-800 text-gray-800 p-2 rounded hover:bg-gray-800 hover:text-white transition font-bold uppercase text-xs cursor-pointer">Reset</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>