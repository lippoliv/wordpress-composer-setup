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
        $orgDir = "$prefix/$name";

        $oldDir = "$orgDir-old";
        $newDir = "$orgDir-new";

        rename($orgDir, $oldDir);
        rename($newDir, $orgDir);
        passthru("rm -rf $oldDir");
    }

    $responseCode = 400;
    startMaintenanceMode();

    $zipArchive = new ZipArchive();
    if ($zipArchive->open('wordpress.zip')) {
        $zipArchive->extractTo('.');
        $zipArchive->close();

        replaceFolder('muplugins');
        replaceFolder('plugins');
        replaceFolder('themes');

        $responseCode = 200;
    }

    endMaintenanceMode();
    unlink('wordpress.zip');
    unlink(__FILE__);

    http_response_code($responseCode);
