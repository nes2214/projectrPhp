<div class="flex flex-col justify-center items-center w-full min-h-[200px] p-6">
    <div class="w-full max-w-md overflow-hidden rounded-xl border border-gray-800 shadow-2xl bg-gray-200">

        <div class="bg-gray-800 p-4">
            <h2 class="text-xl font-bold text-gray-300 text-center uppercase tracking-wider">Buscar Mascota per ID</h2>
        </div>

        <form method="get" action="" class="p-6 text-black">
            <fieldset class="space-y-4">
                <legend class="sr-only">Formulari de cerca per ID</legend>

                <input type="hidden" name="menu" value="mascota" />
                <input type="hidden" name="option" value="cercar_mascota" />

                <div>
                    <label class="block text-sm font-bold mb-1">ID Mascota *:</label>
                    <input type="number" placeholder="Introdueix l'ID de la mascota" name="mascota_id"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        required />
                </div>

                <p class="text-xs text-gray-600 font-semibold">* Camps obligatoris</p>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-gray-800 text-white p-2 rounded hover:bg-gray-700 transition font-bold uppercase text-xs cursor-pointer">
                        Buscar
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>