<div id="content" class="flex items-center justify-center">
    <form method="get" action="" class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <fieldset>
            <legend>Buscar Mascotes per ID</legend>

            <input type="hidden" name="menu" value="mascota" />
            <input type="hidden" name="option" value="cercar_mascota" />

            <label class="block text-sm font-medium text-gray-700">ID mascota*:</label>
            <input
                class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                type="number" placeholder="Introdueix l'ID de la mascota" name="mascota_id" required />

            <label>* Camps obligatoris</label>
            <button type="submit"
                class="w-full bg-black hover:bg-gray-700 transition-all cursor-pointer text-white font-semibold p-3 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                Buscar
            </button>
        </fieldset>
    </form>
</div>