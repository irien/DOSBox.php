<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdVer extends Command {
    
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
        $outputter->printLine("Microsoft Windows XP [version 5.1.2600]");
        if (isset($this->params[0])&&($this->params[0]=="/w")) {
            $outputter->printLine("Irien Kamaratih Arsiani \t- irien@github.com");
            $outputter->printLine("Nugroho Puspito Yudho \t\t- nugrohopy@github.com");
            $outputter->printLine("Sawung Murdha Anggara \t\t- sawung@github.com");
            $outputter->printLine("Meidiana Rahmawati \t\t- rahmawatimei@github.com");
        }
    }

}