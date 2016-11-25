<?php

namespace DOSBox\Filesystem;

date_default_timezone_set('Asia/Jakarta');

use DOSBox\Filesystem\FileSystemItem;

class File extends FileSystemItem {
    private $content;

    public function __construct($name, $content){
        parent::__construct($name, NULL, NULL);
        $this->content = $content;
    }

    public function getFileContent() {
        return $this->content;
    }

    public function isDirectory() {
        return false;
    }

    public function getSize() {
        return strlen($this->content);
    }  
    
    public function getTimeCreation($file){
        return date("d/m/Y H:i A", filectime($file));
    }

    public function getNumberOfContainedFiles() {
        return 0;  // A file does not contain any other files
    }

    public function getNumberOfContainedDirectories() {
        return 0;  // A file does not contain any sub-directories
    }
}