<?php
    $responseCode = 400;

    $zipArchive = new ZipArchive();
    if ($zipArchive->open('wordpress.zip')) {
        $zipArchive->extractTo('.');
        $zipArchive->close();

        $responseCode = 200;
    }

    unlink('wordpress.zip');
    unlink(__FILE__);

    http_response_code($responseCode);
