<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>Add category</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) { echo $content->getId(); } ?>" />
            <label>Name *:</label>
            <input type="text" placeholder="Name" name="name" value="<?php if (isset($content)) { echo $content->getName(); } ?>" />
            <label>Price *:</label>
            <input type="number" placeholder="Price" name="Price" value="<?php if (isset($content)) { echo $content->getPrice(); } ?>" />
            <label>Description *:</label>
            <input type="description" placeholder="Price" name="Price" value="<?php if (isset($content)) { echo $content->getDescription(); } ?>" />
            <label>Category:</label>
            <select name="category">
                <option value="">Select category</option>

                <?php foreach ($categories as $cat): ?>
                    <option 
                        value="<?= $cat['id'] ?>" 
                        <?php if (isset($content) && $content->getCategory() == $cat['id']) echo "selected"; ?>
                    >
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>* Required fields</label>
            <input type="submit" name="action" value="add" />
            <input type="submit" name="reset" value="reset" onClick="form_reset(this.form.id);" />
        </fieldset>
    </form>
</div>