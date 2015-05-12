<?php

namespace Navarr\Materialii;

use yii\helpers\Url;
use yii\web\AssetBundle;
use yii\web\View;

class HTMLImportAssetBundle extends AssetBundle
{
    public $imports = [];

    /**
     * @param View $view
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
        $manager = $view->getAssetManager();

        foreach ($this->imports as $import) {
            $view->registerLinkTag(['rel' => 'import', 'href' => Url::to($manager->getAssetUrl($this, $import))]);
        }
    }
}
