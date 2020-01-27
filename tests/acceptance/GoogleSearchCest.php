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
		$I->seeInTitle('The Kathmandu Post | Read online latest news and articles from Nepal');

        $I->fillField('q', 'Codeception');
        $I->click('btnK');

        $I->seeInCurrentUrl('/search?');
        $I->see('PHP TESTING FOR');
        $I->see('Codeception - PHP Testing framework');

        $I->click('submit');
	}

}
