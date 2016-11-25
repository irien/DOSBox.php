<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdMkFile extends Command {
    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return true;
    }

    public function checkParameterValues(IOutputter $outputter) {
        return true;
    }

    public function execute(IOutputter $outputter){
        $fileName = $this->params[0];
        
        $directoryContent = $this->getDrive()->getCurrentDirectory()->getContent();
        $is_exist = false;
        foreach ($directoryContent as $item) {
            if (!$item->isDirectory() and $item->getName()==$this->params[0]) $is_exist = true;
        }
        
        if($is_exist == true){
            $outputter->printLine("Nama file sudah ada");
        } else {
            if(!isset($this->params[1])){
                $this->params[1]=null;
            }
            $fileContent = $this->params[1];
            $newFile = new File($fileName, $fileContent);
            $this->getDrive()->getCurrentDirectory()->add($newFile);
        }     
    }

}