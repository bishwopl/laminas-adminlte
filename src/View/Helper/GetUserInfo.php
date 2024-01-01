<?php
namespace LaminasAdminLTE\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use CirclicalUser\Service\AuthenticationService;

class GetUserInfo extends AbstractHelper
{
    /**
     * @var \CirclicalUser\Service\AuthenticationService 
     */
    protected $authService;

    public function __construct(AuthenticationService $authService) {
        $this->authService = $authService;
    }

    /**
     * @return null|array
     */
    public function __invoke() : string {
        $ret = '';
        $user = $this->authService->getIdentity();
        
        if($user instanceof \CirclicalUser\Provider\UserInterface){
            $ret .= "<strong class=\"pull-left text-light\">".$user->getEmail()."</strong><br/>";
            $roles = $user->getRoles();
            foreach($roles as $r){
                $ret .= "<small class=\"badge pull-left bg-green\">".$r->getName()."</small><br>";
            }
        }
        
        return $ret;
    }
}

