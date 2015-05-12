<?php

namespace Navarr\Materialii;

use yii\base\Widget;
use yii\helpers\Html;

class NavBar extends Widget
{
    public function init()
    {
        parent::init();
        Html::beginTag('core-toolbar');
    }

    public function run()
    {
        Html::endTag('core-toolbar');
    }
}
