<div id="content" class="flex items-center justify-center">
    <form method="get" action="" class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <fieldset class="space-y-6">
            <legend class="text-2xl font-bold text-gray-800 mb-6">Buscar Mascotes per Propietari</legend>

            <input type="hidden" name="menu" value="mascota" />
            <input type="hidden" name="option" value="buscar_mascotes" />

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">ID Propietari *:</label>
                <input
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    type="number" placeholder="Introdueix l'ID del propietari" name="propietari_id" required />
            </div>

            <p class="text-xs text-gray-500">* Camps obligatoris</p>

            <button type="submit"
                class="w-full bg-black hover:bg-gray-700 transition-all cursor-pointer text-white font-semibold p-3 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                Buscar
            </button>
        </fieldset>
    </form>
</div>