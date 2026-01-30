<div class="flex flex-col justify-center items-center w-full min-h-[200px] p-6">
    <div class="w-full max-w-md overflow-hidden rounded-xl border border-gray-800 shadow-2xl bg-gray-200">

        <div class="bg-gray-800 p-4">
            <h2 class="text-xl font-bold text-gray-300 text-center uppercase tracking-wider">Gestió de Mascotes</h2>
        </div>

        <form method="post" action="index.php?menu=mascota" id="mascotaForm" class="p-6 text-black">
            <fieldset class="space-y-4">
                <legend class="sr-only">Formulari de Mascotes</legend>

                <div>
                    <label class="block text-sm font-bold mb-1">Id *:</label>
                    <input type="text" name="id" id="input_id"
                        class="w-full border border-gray-400 p-2 rounded bg-gray-300 cursor-not-allowed"
                        value="<?= (isset($content)) ? htmlspecialchars($content->getId()) : '' ?>" readonly />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">Nom de la Mascota *:</label>
                    <input type="text" placeholder="Nom" name="nom"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?= (isset($content)) ? htmlspecialchars($content->getNom()) : '' ?>" />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">ID Propietari *:</label>
                    <input type="text" placeholder="ID del amo" name="propietari_id"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?= (isset($content)) ? htmlspecialchars($content->getPropietari_id()) : '' ?>" />
                </div>

                <p class="text-xs text-gray-600 font-semibold">* Required fields</p>

                <div class="grid grid-cols-2 gap-2 mt-6">
                    <button type="submit" name="action" value="modify"
                        class="bg-gray-800 text-white p-2 rounded hover:bg-gray-700 transition font-bold uppercase text-xs cursor-pointer">
                        Modify
                    </button>

                    <button type="button" onClick="window.location.href='index.php?menu=mascota&option=list_all'"
                        class="border border-gray-800 text-gray-800 p-2 rounded hover:bg-gray-800 hover:text-white transition font-bold uppercase text-xs cursor-pointer">
                        Back to List
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>