<?php
    session_start();
?>

<div class="row admin-header">
    <span class="span-1-of-2 admin-header-label">THE HELPING HAND</span>
    <span class="span-1-of-2 admin-header-username">
        <?php echo $_SESSION['name']?>
    </span>
</div>