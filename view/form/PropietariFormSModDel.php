<div class="flex flex-col justify-center items-center w-full min-h-[200px] p-6">
    <div class="w-full max-w-md overflow-hidden rounded-xl border border-gray-800 shadow-2xl bg-gray-200">

        <div class="bg-gray-800 p-4">
            <h2 class="text-xl font-bold text-gray-300 text-center uppercase tracking-wider">Gestió de Propietaris</h2>
        </div>

        <form method="post" action="" id="propietariForm" class="p-6 text-black">
            <fieldset class="space-y-4">
                <legend class="sr-only">Add category</legend>

                <div>
                    <label class="block text-sm font-bold mb-1">Id *:</label>
                    <input type="text" placeholder="Id" name="id" id="input_id"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400 <?php if (isset($content)) echo 'bg-gray-300 cursor-not-allowed'; ?>"
                        value="<?php if (isset($content)) { echo htmlspecialchars($content->getId()); } ?>"
                        <?php if (isset($content)) { echo 'readonly'; } ?> />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">Nom *:</label>
                    <input type="text" placeholder="Name" name="nom"
                        class="w-full border border-gray-400 p-2 rounded bg-gray-300 cursor-not-allowed focus:outline-none"
                        value="<?php if (isset($content)) { echo htmlspecialchars($content->getNom()); } ?>" readonly />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">Email *:</label>
                    <input type="text" placeholder="Email" name="email"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?php if (isset($content)) { echo htmlspecialchars($content->getEmail()); } ?>" />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1">Movil *:</label>
                    <input type="text" placeholder="Mobile" name="mobil"
                        class="w-full border border-gray-400 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                        value="<?php if (isset($content)) { echo htmlspecialchars($content->getMobil()); } ?>" />
                </div>

                <p class="text-xs text-gray-600 font-semibold">* Required fields</p>

                <div class="grid grid-cols-3 gap-2 mt-6">
                    <button type="submit" name="action" value="search"
                        class="bg-gray-800 text-white p-2 rounded hover:bg-gray-700 transition font-bold uppercase text-xs">Search</button>

                    <button type="submit" name="action" value="modify"
                        class="bg-gray-800 text-white p-2 rounded hover:bg-gray-700 transition font-bold uppercase text-xs">Modify</button>

                    <button type="button" name="reset" value="reset" onClick="form_reset(this.form.id);"
                        class="border border-gray-800 text-gray-800 p-2 rounded hover:bg-gray-800 hover:text-white transition font-bold uppercase text-xs">Reset</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>