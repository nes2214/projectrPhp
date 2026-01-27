<div id="content">
    <form method="post" action="" id="propietariForm">
        <fieldset>
            <legend>Add category</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" id="input_id"
                value="<?php if (isset($content)) { echo $content->getId(); } ?>"
                <?php if (isset($content)) { echo 'readonly'; } ?> />
            <label>Nom *:</label>
            <input type="text" placeholder="Name" name="nom"
                value="<?php if (isset($content)) { echo $content->getNom(); } ?>" readonly />
            <label>Email *:</label>
            <input type="text" placeholder="Email" name="email"
                value="<?php if (isset($content)) { echo $content->getEmail(); } ?>" />
            <label>Movil *:</label>
            <input type="text" placeholder="Mobile" name="mobil"
                value="<?php if (isset($content)) { echo $content->getMobil(); } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="search" />
            <input type="submit" name="action" value="modify" />
            <input type="submit" name="reset" value="reset" onClick="form_reset(this.form.id);" />
        </fieldset>
    </form>
</div>