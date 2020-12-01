<?php


require_once  __DIR__ .'/../vendor/autoload.php';


# PHP Unit 
use PHPUnit\Framework\TestCase;

# PHP Selenium 
use OTPHP\TOTP;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverKeys;
use Facebook\WebDriver\WebDriverExpectedCondition;


class UnitTest extends TestCase {


	public function setup():void {

	}


 	function testPHPUnit() {

		$this->assertEquals(true, true);

	}


	function testSelenium () {
	
		$host = 'http://localhost:4444/wd/hub';

		$capabilities = DesiredCapabilities::chrome();
		$driver = RemoteWebDriver::create($host, $capabilities);
		$driver->get('https://www.google.com');

		$search_box = $driver->findElement(WebDriverBy::xpath('//*[@id="tsf"]/div[2]/div[1]/div[1]/div/div[2]/input'));
		$search_box->sendKeys("php");
		$driver->getKeyboard()->pressKey(WebDriverKeys::ENTER);

		$this->assertEquals(true, true);

		$search_box = $driver->findElement(WebDriverBy::xpath('//*[@id="tsf"]/div[2]/div[1]/div[2]/div/div[2]/input'));
		$search_box->getAttribute('value');
		
		$this->assertEquals("php", $search_box->getAttribute('value'));

		$driver->quit();

	}


}