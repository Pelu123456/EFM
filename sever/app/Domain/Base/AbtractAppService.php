<?php
namespace App\Application\Base;

abstract class AbstractAppService
{
    protected function helloFromBase(): string
    {
        return "Hello from BaseAppService";
    }
}
