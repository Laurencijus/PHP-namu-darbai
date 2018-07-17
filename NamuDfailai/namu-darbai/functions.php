<?php

function head($title)
{
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title><?php echo $title; ?></title>
    <?php
}

function footer()
{
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <?php
}

function getFolderName()
{    
    if (isset($_GET['folder'])) {
        $folder = str_replace('../', '', $_GET['folder']);
        return basePath() . $folder;
    }
    
    return basePath();
}

function getFileName()
{    
    if (isset($_GET['file'])) {
        $fileName = str_replace('../', '', $_GET['file']);
        return basePath() . $fileName;
    }
    
    return false;
}


function getFiles($folderName)
{
    if (!file_exists($folderName)) {
        return [];
    }
    
    $resource = opendir($folderName);
    
    if ($resource == false) {
        return [];
    }
    
    $files = [];
    
    $fileName = readdir($resource);
    while ($fileName !== false) {
        if ($fileName != '.' && $fileName != '..') {
            $localPathToFile = $folderName . DIRECTORY_SEPARATOR . $fileName;
            
            $fileInfo = pathinfo($localPathToFile);
            $fileInfo['isDir'] = is_dir($localPathToFile);
            $fileInfo['isFile'] = is_file($localPathToFile);

            $files[] = $fileInfo;
        }
        
        $fileName = readdir($resource);
    }    
    closedir($resource);
    
    usort($files, function ($a, $b) {
        $preffix1 = 1;
        $preffix2 = 1;
        
        if ($a['isDir']) {
            $preffix1 = 0;
        }
        if ($b['isDir']) {
            $preffix2 = 0;
        }
        
        return $preffix1 . $a['basename'] <=> $preffix2 . $b['basename'];
    });
    
    return $files;
}

function generateFolderLink($folder)
{
    ?>
    <a href="?folder=<?php echo generateFilePath($folder); ?>">
        <?php echo $folder['basename']; ?>
    </a>
    <?php
}

function generateImageLink($imageFile)
{
    ?>
    <a href="<?php echo $imageFile['dirname'] . DIRECTORY_SEPARATOR . $imageFile['basename']; ?>">
        <?php echo $imageFile['basename']; ?>
    </a>
    <?php
}

function generateDownloadLink($imageFile)
{
    ?>
    <a href="<?php echo $imageFile['dirname'] . DIRECTORY_SEPARATOR . $imageFile['basename']; ?>" download>
        <?php echo $imageFile['basename']; ?>
    </a>
    <?php
}

function generateFilePath($folder)
{
    $dirname = $folder['dirname'] . DIRECTORY_SEPARATOR . $folder['basename'];        
    return str_replace(basePath(), '', $dirname);
}

function basePath()
{
    return '../failai/';
}

function getFileIcon($file)
{
    if ($file['isDir']) {
        return 'images/folder.png';
    }
    
    if (isImage($file)) {
        return 'images/image.png';
    }
    
    if (isPHPFile($file)) {
        return 'images/php.png';
    }
    
    return 'images/file.png';
}

function isImage($file)
{
    return in_array($file['extension'], ['jpg', 'png', 'gif']);
}

function isPHPFile($file)
{
    return $file['extension'] == 'php';
}

function generatePHPPreview($phpFile)
{
    ?>
    <a href="preview.php?file=<?php echo generateFilePath($phpFile); ?>">
        <?php echo $phpFile['basename']; ?>
    </a>
    <?php
}
