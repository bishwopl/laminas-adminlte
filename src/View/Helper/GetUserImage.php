<?php
namespace LaminasAdminLTE\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use CirclicalUser\Service\AuthenticationService;

class GetUserImage extends AbstractHelper
{
    /**
     * @var \CirclicalUser\Service\AuthenticationService 
     */
    protected $authService;

    public function __construct(AuthenticationService $authService) {
        $this->authService = $authService;
    }

    /**
     * @return bool
     */
    public function __invoke(\CirclicalUser\Provider\UserInterface $user = null) : string {
        if(is_null($user)){
            $user  = $this->authService->getIdentity();
        }
        if(is_null($user)){
            return "";
        }
        $avatar = $user->getAvatar();
        if(!is_null($avatar) && is_file($avatar)){
            $mime = mime_content_type($avatar);
            return "data:$mime;base64,".base64_encode(file_get_contents($avatar));
        }
        return 'https://www.gravatar.com/avatar/f86386cee03f4f2fa6885c794cb34d5f?s=80&d=mm&r=g';
    }
}

