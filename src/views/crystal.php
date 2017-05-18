<div class="crystal-container">
    <p>Hi I'm <?php echo $name; ?></p>
    <p>I love playing <?php echo $game; ?></p>
    <p>My Favourite Foods are:</p>
    <ul>
<?php foreach ($foods as $food): ?>
        <li><?php echo $food; ?></li>
<?php endforeach; ?>
    </ul>
</div>