<?php

namespace backend\tests\api;

use backend\tests\ApiTester;
use Codeception\Example;
use Codeception\Util\HttpCode;

/**
 * Prueba funcional del api para la ruta `/oauth2/token`
 *
 * @author Angel (Faryshta) Guevara <aguevara@tecnocen.com>
 */
class AccessTokenCest
{
    /**
     *
     * @param ApiTester $I
     *
     * @depends backend\tests\api\UserCest:fixtures
     */
    public function generateToken(ApiTester $I)
    {
        $I->wantTo('Generar token de acceso.');
        $I->amHttpAuthenticated('testclient', 'testpass');
        $I->sendPOST('oauth2/token', [
            'grant_type' => 'password',
            'username' => 'erau',
            'password' => 'password_0',
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);
    }
}