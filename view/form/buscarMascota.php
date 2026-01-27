<h2>Llistat de Mascotes</h2>

<?php if (empty($content)) : ?>
<p>No s'han trobat mascotes.</p>
<?php else : ?>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>ID Propietari</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($content as $mascota): ?>
        <tr>
            <td><?= htmlspecialchars($mascota->getId()) ?></td>
            <td><?= htmlspecialchars($mascota->getNom()) ?></td>
            <td><?= htmlspecialchars($mascota->getPropietari_id()) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>