<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . " — Главная";
Yii::app()->clientScript->registerPackage('index');

?>

<div id="slider-outer">
    <div id="slider">
        <img src="images/slider/slide_1.png" />
        <img src="images/slider/slide_2.png" />
        <img src="images/slider/slide_3.png" />
    </div>
    <a id="slider-prev" href=""></a>
    <a id="slider-next" href=""></a>
</div>