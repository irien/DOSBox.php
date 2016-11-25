<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
    
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
        if (!isset($this->params[1])) {
            $this->params[1] = null;
            }
        $fileContent = $this->params[1];
        $newFile = new File($fileName, $fileContent);
        $this->getDrive()->getCurrentDirectory()->add($newFile);
    }

}