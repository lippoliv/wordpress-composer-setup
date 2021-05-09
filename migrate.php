<?php
    $zipArchive = new ZipArchive();
    if ($zipArchive->open('wordpress.zip')) {
        $zipArchive->extractTo('.');
        $zipArchive->close();

        unlink('wordpress.zip');
    }

    unlink(__FILE__);
