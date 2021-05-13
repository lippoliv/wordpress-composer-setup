<?php
    function startMaintenanceMode() {
        $maintenanceFileContent = '<?php $upgrading = ' . time() . '; ?>';
        file_put_contents('.maintenance', $maintenanceFileContent);
    }

    function endMaintenanceMode() {
        unlink('.maintenance');
    }

    function replaceFolder(
        $name,
        $prefix = 'wp-content'
    ) {
        $targetDirectoryPath = "$prefix/$name";
        $newDirectoryPath    = "$targetDirectoryPath-new";

        if (is_dir($targetDirectoryPath)) {
            passthru("rm -rf $targetDirectoryPath");
        }

        rename($newDirectoryPath, $targetDirectoryPath);
    }

    $responseCode = 500;
    startMaintenanceMode();

    $zipArchive = new ZipArchive();
    if ($zipArchive->open('wordpress.zip')) {
        $zipArchive->extractTo('.');
        $zipArchive->close();

        replaceFolder('mu-plugins');
        replaceFolder('plugins');
        replaceFolder('themes');

        $responseCode = 200;
    }

    endMaintenanceMode();
    unlink('wordpress.zip');
    unlink(__FILE__);

    http_response_code($responseCode);
