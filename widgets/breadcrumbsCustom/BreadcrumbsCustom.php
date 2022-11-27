<?php

namespace app\widgets\breadcrumbsCustom;

use app\widgets\breadcrumbsCustom\BreadcrumbsCustomAssets;
use yii\base\Widget;

class BreadcrumbsCustom extends Widget
{
    public $links;
    public function run()
    {
        BreadcrumbsCustomAssets::register($this->view);

        if ($this->links) {
            return $this->render('index', ['links' => $this->links]);
        }
    }
}
