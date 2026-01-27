<div id="content">
    <fieldset>
        <legend>Mascota list</legend>
        <?php
            if (isset($content)) {
                echo <<<EOT
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Propietari Id</th>
        
                        </tr>
EOT;
                foreach ($content as $mascota) {
                    echo <<<EOT
                        <tr>
                            <td>{$mascota->getId()}</td>
                            <td>{$mascota->getNom()}</td>
                            <td>{$mascota->getPropietari_id()}</td>
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