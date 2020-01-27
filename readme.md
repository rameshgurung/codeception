# Topics
1. What is Codeception?
2. When to use?
3. How to use it?
4. Benefits.
5. Limitations
6. Misc

# Detail
1. What is Codeception?
	- PHP based testing tool for a unit, functional and acceptance testing.
	- Built on top of wonderful PHPUnit, but with an aim for acceptance, and functional scenario-driven tests.
2. When to use?
	- When test needs to be automated.
	- Best suited for acceptance testing
3. How to use it?
	- Use with our without a framework (Laravel, Symfony, Yii)
		a. Installation (with composer or codecept.phar)
        ```sh
        composer require "codeception/codeception" --dev
        ```
		b. Setup
        ```sh
		php vendor/bin/codecept bootstrap
        ```
		c. Create Test
        ```sh
		php vendor/bin/codecept generate:cest acceptance First
        ```
		d. Configure Acceptance Tests
		tests/acceptance.suite.yml 
        ```sh
		actor: AcceptanceTester
		modules:
		    enabled:
		        - PhpBrowser:
		            url: {YOUR APP'S URL}
		        - \Helper\Acceptance
        ```
		e. Write a Basic Test
		tests/acceptance/FirstCest.php
        ```sh
		<?php
		class FirstCest 
		{
		    public function frontpageWorks(AcceptanceTester $I)
		    {
		        $I->amOnPage('/');
		        $I->see('Home');
		    }
		}
        ```
		f. Run!
        ```sh
		php vendor/bin/codecept run --steps
        ```

	**NOTE: For more complex tests that require a browser use Selenium with WebDriver module.**

4. Benefits.
	- PHP!
	- SIMPLICITY
	- MULTI-FRAMEWORK AND MULTI-BACKEND
		- All web-based software built with any framework or any backend
		- PHP (Core, Symfony, Laravel, etc), Asp.net, Java
	- COMPLEX TESTS
		- You can also test your SOAP and REST Webservices, pragmatical use XMLs (defined in jQuery-like style) and JSONs (as PHP arrays)
	- DATA
		- Db module you can repopulate database (MySQL, PostgreSQL, …), after each run, use SQLite (for faster testing), or just run all tests inside a transaction (in functional or unit testing). Also, Codeception has modules for using and cleaning Memcache and AMQP storage.

5. Limitations
	- Since the framework emulates a browser, chances of getting false-positive result increases.
	- It requires a framework to start testing.
	- Cannot test AJAX and JavaScript

6. How codeception works?
	- Perform acceptance Testing either by emulating (copy) or simulating (real) the web browsers (chrome, firefox etc)
	- Emulate browsers with phpbrowser (Codeception default module)
	- Or simulate browser with webdriver "php-webdriver/php-webdriver" (PHP client for Selenium/WebDriver protocol)
	- phpbrowser vs webdriver
		- phpbrowser 
			- Emulate browser
			- Does not open chrome or firefox
			- use Guzzle (HTTP Client) + Symfony BrowserKit
			- Symfony BrowserKit
				- The BrowserKit component simulates the behavior of a web browser, allowing you to make requests, click on links and submit forms programmatically.
		- webdriver
			- Simulate browser
			- open chrome or firefox
			- open browser (either headless or headful)
			- use PHP library along with other dependices for Selenium/WebDriver protocol
	- other programming languages (ruby, python, .net, java etc) also have library client for Selenium/WebDriver protocol
		- ruby = selenium-webdriver
		- python = selenium, testingbotclient
		- .net = selenium-dotnet
	ref: https://testingbot.com/support/getting-started/csharp.html	