<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>Add category</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id"
                value="<?php if (isset($content)) { echo $content->getId(); } ?>" />
            <label>Nom *:</label>
            <input type="text" placeholder="Name" name="nom"
                value="<?php if (isset($content)) { echo $content->getNom(); } ?>" />
            <label>Email *:</label>
            <input type="text" placeholder="Email" name="email"
                value="<?php if (isset($content)) { echo $content->getEmail(); } ?>" />
            <label>Movil *:</label>
            <input type="text" placeholder="Movil" name="mobil"
                value="<?php if (isset($content)) { echo $content->getMobil(); } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="add" />
            <input type="submit" name="reset" value="reset" onClick="form_reset(this.form.id);" />
        </fieldset>
    </form>
</div>