<?php require_once __DIR__ . '/header.php'; ?>

<h2>Liste des Randonnées</h2>
<div class="hikes-list">
    <?php foreach ($hikes as $hike): ?>
        <div class="hike-item">
            <h3><?php echo htmlspecialchars($hike['name']); ?></h3>
            <p>Distance: <?php echo htmlspecialchars($hike['distance']); ?> km</p>
            <p>Durée: <?php echo htmlspecialchars($hike['duration']); ?></p>
            <p>Dénivelé: <?php echo htmlspecialchars($hike['elevation_gain']); ?> m</p>
            <p>Tags: <?php echo htmlspecialchars($hike['tags']); ?></p>
            <?php if (!empty($hike['image'])): ?>
                <img src="<?php echo htmlspecialchars($hike['image']); ?>" alt="Image de la randonnée">
            <?php endif; ?>
            <a href="/hike/<?php echo htmlspecialchars($hike['id']); ?>">Voir les détails</a>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
