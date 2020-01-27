<?php 

class GoogleSearchCest
{
	public function _before(AcceptanceTester $I)
	{
	}

    // tests
	public function tryToTest(AcceptanceTester $I)
	{
		$I->amOnPage('/');
		$I->seeInTitle('Google');

        $I->fillField('q', 'Codeception');
        $I->click('btnI');

        $I->seeInCurrentUrl('/');
        $I->see('Codeception');
	}

}
