<?php

Yii::import('zii.widgets.CPortlet');

class ExternalMenu extends CPortlet
{
    protected function renderContent() {
        $this->render('externalMenu');
    }
}