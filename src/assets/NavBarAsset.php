<?php

namespace Navarr\Materialii\assets;

use Navarr\Materialii\HTMLImportAssetBundle;

class NavBarAsset extends HTMLImportAssetBundle
{
    public $sourcePath = '@bower';

    public $imports = [
        'core-toolbar/core-toolbar.html',
    ];
}
