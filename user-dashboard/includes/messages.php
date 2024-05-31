<?php if(isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger txt">
        <strong>Error</strong> : <?php echo htmlentities($_SESSION['error']); ?> 
    </div>
<?php endif; unset($_SESSION['error']) ?>

<?php if(isset($_SESSION['success'])) : ?>
    <div class="alert alert-success txt">
        <strong>Success</strong> : <?php echo htmlentities($_SESSION['success']); ?> 
    </div>
<?php endif; unset($_SESSION['success']) ?>

<?php if(isset($_SESSION['warning'])) : ?>
    <div class="alert alert-warning txt">
        <strong>Warning</strong> : <?php echo htmlentities($_SESSION['warning']); ?> 
    </div>
<?php endif; unset($_SESSION['warning']) ?>