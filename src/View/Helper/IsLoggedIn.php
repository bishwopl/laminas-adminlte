<?php
namespace LaminasAdminLTE\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use CirclicalUser\Service\AuthenticationService;

class IsLoggedIn extends AbstractHelper
{
    /**
     * @var \CirclicalUser\Service\AuthenticationService 
     */
    protected $authService;

    public function __construct(AuthenticationService $authService) {
        $this->authService = $authService;
    }

    /**
     * 
     * @return bool
     */
    public function __invoke() : bool {
        return $this->authService->getIdentity() instanceof \CirclicalUser\Provider\UserInterface;
    }
}

