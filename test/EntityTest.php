<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Mono\Entity\Language;
use Mono\Entity\Reseller;
use Mono\Entity\Text;

class EntityTest extends \PHPUnit_Framework_TestCase
{
    private $langXId;
    private $langXCode;
    private $langXName;
    private $languageX;

    private $langYId;
    private $langYCode;
    private $langYName;
    private $languageY;

    private $resId;
    private $resName;
    private $resAddress;
    private $resPhone;
    private $resActive;
    private $reseller;

    private $textAKey;
    private $textAIDX;
    private $textAValueX;
    private $textAIDY;
    private $textAValueY;
    private $textAX;
    private $textAY;

    public function setUp()
    {
        $this->langXId = 1;
        $this->langXCode = 'xx';
        $this->langXName = 'LangX';
        $this->languageX = new Language($this->langXId, $this->langXName, $this->langXCode);

        $this->langYId = 1;
        $this->langYCode = 'yy';
        $this->langYName = 'LangY';
        $this->languageY = new Language($this->langYId, $this->langYName, $this->langYCode);


        $this->resId = 11;
        $this->resName = 'Reseller';
        $this->resAddress = 'Address 123';
        $this->resPhone = '555 555 555';
        $this->resActive = true;
        $this->reseller = new Reseller(
            $this->resId,
            $this->resName,
            $this->languageX,
            $this->resAddress,
            $this->resPhone,
            $this->resActive
        );


        $this->textAKey = 'example';
        $this->textAIDX = 111;
        $this->textAValueX = 'Example X';
        $this->textAIDY = 222;
        $this->textAValueY = 'Example Y';

        $this->textAX = new Text(
            $this->textAIDX,
            $this->textAKey,
            $this->textAValueX,
            $this->reseller,
            $this->languageX
        );
        $this->textAY = new Text(
            $this->textAIDY,
            $this->textAKey,
            $this->textAValueY,
            $this->reseller,
            $this->languageY
        );
    }


    public function testLanguageProperties() {
        $this->assertEquals($this->langXId, $this->languageX->getId());
        $this->assertEquals($this->langXCode, $this->languageX->getCode());
        $this->assertEquals($this->langXName, $this->languageX->getName());
    }

    public function testResellerProperties() {
        $this->assertEquals($this->resId, $this->reseller->getId());
        $this->assertEquals($this->resName, $this->reseller->getName());
        $this->assertEquals($this->resAddress, $this->reseller->getAddress());
        $this->assertEquals($this->resPhone, $this->reseller->getPhone());
        $this->assertEquals($this->resActive, $this->reseller->getActive());
        $this->assertEquals($this->languageX, $this->reseller->getDefaultLanguage());
    }

    public function testTextProperties() {
        $this->assertEquals($this->textAKey, $this->textAX->getKey());
        $this->assertEquals($this->textAIDX, $this->textAX->getId());
        $this->assertEquals($this->textAValueX, $this->textAX->getValue());
        $this->assertEquals($this->languageX, $this->textAX->getLanguage());
        $this->assertEquals($this->reseller, $this->textAX->getReseller());

        $this->assertEquals($this->textAKey, $this->textAY->getKey());
        $this->assertEquals($this->textAIDY, $this->textAY->getId());
        $this->assertEquals($this->textAValueY, $this->textAY->getValue());
        $this->assertEquals($this->languageY, $this->textAY->getLanguage());
        $this->assertEquals($this->reseller, $this->textAY->getReseller());
    }

    public function testLanguageResponse() {
        $response = $this->languageX->getResponse();

        $this->assertNotEmpty($response);
        $this->assertEquals($response['id'], $this->langXId);
        $this->assertEquals($response['code'], $this->langXCode);
        $this->assertEquals($response['name'], $this->langXName);
    }

    public function testResellerResponse() {
        $response = $this->reseller->getResponse();

        $this->assertNotEmpty($response);
        $this->assertEquals($response['id'], $this->resId);
        $this->assertEquals($response['name'], $this->resName);
        $this->assertEquals($response['address'], $this->resAddress);
        $this->assertEquals($response['phone'], $this->resPhone);
        $this->assertEquals($response['active'], $this->resActive);
        $this->assertEquals($response['default_language'], $this->languageX->getCode());
    }

    public function testTextResponse() {
        $response = $this->textAX->getResponse();

        $this->assertNotEmpty($response);
        $this->assertEquals($response['key'], $this->textAKey);
        $this->assertEquals($response['value'], $this->textAValueX);
        $this->assertEquals($response['id'], $this->textAIDX);
        $this->assertEquals($response['reseller'], $this->resName);
        $this->assertEquals($response['language'], $this->langXCode);
    }


    public function testLanguageCreateFromArray() {
        $newLanguage = [
            'id' => 2,
            'name' => 'NewLang',
            'code' => 'nl'
        ];

        $newCreated = Language::createFromArray($newLanguage);

        $this->assertNotEmpty($newCreated);
        $this->assertEquals($newLanguage['id'], $newCreated->getId());
        $this->assertEquals($newLanguage['code'], $newCreated->getCode());
        $this->assertEquals($newLanguage['name'], $newCreated->getName());
    }

    public function testResellerCreateFromArray() {
        $newReseller = [
            'id' => 22,
            'name' => 'New Reseller Fancy Name',
            'address' => '42 Wallaby Way, Sydney',
            'phone' => '123123123',
            'active' => true,
            'default_language' => $this->languageY
        ];

        $newCreated = Reseller::createFromArray($newReseller);

        $this->assertNotEmpty($newCreated);
        $this->assertEquals($newReseller['id'], $newCreated->getId());
        $this->assertEquals($newReseller['name'], $newCreated->getName());
        $this->assertEquals($newReseller['address'], $newCreated->getAddress());
        $this->assertEquals($newReseller['phone'], $newCreated->getPhone());
        $this->assertEquals($newReseller['active'], $newCreated->getActive());
        $this->assertEquals($newReseller['default_language'], $newCreated->getDefaultLanguage());
    }

    public function testTextCreateFromArray() {
        $newLanguage = [
            'id'    => 666,
            'key'   => 'test',
            'value' => 'aaaaaaaaaaaaaaaah!',
            'reseller' => $this->reseller,
            'language' => $this->languageY,
        ];

        $newCreated = Text::createFromArray($newLanguage);

        $this->assertNotEmpty($newCreated);
        $this->assertEquals($newLanguage['id'], $newCreated->getId());
        $this->assertEquals($newLanguage['key'], $newCreated->getKey());
        $this->assertEquals($newLanguage['value'], $newCreated->getValue());
        $this->assertEquals($newLanguage['reseller'], $newCreated->getReseller());
        $this->assertEquals($newLanguage['language'], $newCreated->getLanguage());
    }
}