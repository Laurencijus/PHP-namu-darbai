<?php 
require 'functions.php';
$fileName = getFileName();
?>
<!doctype html>
<html lang="en">
    <head>
        <?php head('Peržiūra'); ?>
    </head>
<body>
    
    <main role="main" class="container">        
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">
                <?php echo $fileName; ?>
            </h6>
            <div class="media text-muted pt-3">
                <?php highlight_file($fileName); ?>
            </div>
        </div>
    </main>
      
    <?php footer(); ?>
</body>
</html>