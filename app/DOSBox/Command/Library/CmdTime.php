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
        if ($this->getParameterCount() == 0){
            $outputter->printLine(date("H:i:s A"));
        }elseif ($this->getParameterCount() == 1){
            if(!preg_match("/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/", $this->params[0])){
                $outputter->printLine("Params error");
            }
        }

    }

}