<?php if (isset($message)): ?>

    <div class="alert alert-<?php echo $type;?>">

        <?php echo $message; ?>

       <?php   unset($_SESSION['message'], $_SESSION['message']);?>	

    </div>
    <?php endif; ?>