<?php 
require 'functions.php'; 
$folderName = getFolderName();
$folderFiles = getFiles($folderName);
?>
<!doctype html>
<html lang="en">
    <head>
        <?php head('Failų sistema'); ?>
    </head>
<body>
    
    <main role="main" class="container">        
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">
                <?php echo $folderName; ?>
            </h6>
            <?php foreach ($folderFiles as $file) { ?>
            <div class="media text-muted pt-3">
                <img class="mr-3" style="width: 32px; height: 32px;" src="<?php echo getFileIcon($file); ?>" />
                <?php
                    if ($file['isDir']) {
                        generateFolderLink($file);
                    } elseif (isImage($file)) {
                        generateImageLink($file);
                    } elseif (isPHPFile($file)) {
                        generatePHPPreview($file);
                    } else {
                        generateDownloadLink($file);
                    }
                ?>
            </div>
            <?php } ?>
            <?php if (count($folderFiles) == 0) { ?>
            <p>Katalogas tuščias.</p>
            <?php } ?>
        </div>
    </main>
      
    <?php footer(); ?>
</body>
</html>