<div id="content">
    <fieldset>
        <legend>Category list</legend>
        <?php
            if (isset($content)) {
                echo <<<EOT
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                        </tr>
EOT;
                foreach ($content as $category) {
                    echo <<<EOT
                        <tr>
                            <td>{$category->getId()}</td>
                            <td>{$category->getNom()}</td>
                            <td>{$category->getEmail()}</td>
                            <td>{$category->getMobil()}</td>
                        </tr>
EOT;
                }
                echo <<<EOT
                    </table>
EOT;
            }
        ?>
    </fieldset>
</div>