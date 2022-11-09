<?php
if(isset($_SESSION['message'])):?>
    <div class="alert alert-success">
        <p class="text-center h4"><?=$_SESSION['message']?></p>
    </div>
<?php endif;
unset($_SESSION['message']);
?>
