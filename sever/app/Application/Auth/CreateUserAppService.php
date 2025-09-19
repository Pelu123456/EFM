<?php
namespace App\Application\Auth\Services;

use App\Domain\Auth\Services\AuthDomainService;
use App\Application\Base\AbstractAppService;

class CreateUserAppService extends AbstractAppService
{
    public function __construct(
        private AuthDomainService $domainService
    ) {}

    public function execute(): string
    {
        $msgBase = $this->helloFromBase();
        $msgDomain = $this->domainService->sayHello();

        return $msgBase . ' | ' . $msgDomain;
    }
}
