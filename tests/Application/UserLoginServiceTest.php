<?php

declare(strict_types=1);

namespace UserLoginService\Tests\Application;

use Exception;
use PHPUnit\Framework\TestCase;
use UserLoginService\Application\UserLoginService;
use UserLoginService\Domain\User;

final class UserLoginServiceTest extends TestCase
{
    /**
     * @test
     */

    public function errorWhileManuallyLoginUserIfIsAlreadyLogged()
    {
        $userLoginService = new UserLoginService();
        $user = new User("username");

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('User already logged in');

        $userLoginService->manualLogin($user);
        $userLoginService->manualLogin($user);
    }

    /**
     * @test
     * @throws Exception
     */

    public function userIsManuallyLoggedIn()
    {
        $userLoginService = new UserLoginService();
        $user = new User("name");

        $userLoginService->manualLogin($user);

        $this->assertContains($user,$userLoginService->getLoggedUsers());
    }

    /**
     * @test
     */

    public function returnTheNumberOfActiveSessions()
    {
        $userLoginService = new UserLoginService();
        $user = new User("name");

        $userLoginService->manualLogin($user);

        $this->assertEquals(1,$userLoginService->getExternalSessions()); //Realizar un stub y un dummy
        /*
         * Como crear stub, en vez de crear un session manager crearemos un stubFacebookSessionManager.php, con los mismos metodos
         * necesitaremos un stub y un dummy para la sessionManager
         */
    }

}
