<?php
namespace Navarr\Materialii\Tests;

use Navarr\Materialii\assets\NavBarAsset;
use Navarr\Materialii\HTMLImportAssetBundle;
use Yii;
use yii\web\AssetBundle;
use yii\web\AssetManager;
use yii\web\View;

class HTMLAssetBundleTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->mockApplication();

        Yii::setAlias('@testWeb', '/');
        Yii::setAlias('@testWebRoot', '@yiiunit/extensions/polymer');
    }

    public function getView()
    {
        $view = new View();
        $view->setAssetManager(new AssetManager([
            'basePath' => '@testWebRoot/assets',
            'baseUrl' => '@testWeb/assets'
        ]));

        return $view;
    }

    public function testRegister()
    {
        $view = $this->getView();

        $this->assertEmpty($view->assetBundles);
        TestSimpleAsset::register($view);
        $this->assertEquals(1, count($view->assetBundles));
        $this->assertArrayHasKey('Navarr\\Materialii\\Tests\\TestSimpleAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['Navarr\\Materialii\\Tests\\TestSimpleAsset'] instanceof HTMLImportAssetBundle);

        $expected = <<<EOF
1<link href="/html/test.html" rel="import">234
EOF;

        $this->assertEquals($expected, $view->renderFile('@yiiunit/extensions/polymer/views/rawlayout.php'));
    }

    public function testNav()
    {
        $view = $this->getView();
        NavBarAsset::register($view);

        var_dump($view->renderFile('@yiiunit/extensions/polymer/views/rawlayout.php'));
    }
}

class TestSimpleAsset extends HTMLImportAssetBundle
{
    public $basePath = '@testWebRoot/html';
    public $baseUrl = '@testWeb/html';

    public $imports = [
        'test.html',
    ];
}
