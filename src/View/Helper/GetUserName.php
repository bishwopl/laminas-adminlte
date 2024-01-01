<?php
namespace LaminasAdminLTE\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use CirclicalUser\Service\AuthenticationService;

class GetUserName extends AbstractHelper
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
    public function __invoke() : ?string {
        $ret = null;
        $user = $this->authService->getIdentity();
        if($user instanceof \CirclicalUser\Provider\UserInterface){
            $ret = $user->getEmail();
        }
        return $ret;
    }
}

