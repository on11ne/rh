<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . " — Регистрация покупки";
Yii::app()->clientScript->registerPackage('inner');
Yii::app()->clientScript->registerPackage('scrollpane');
Yii::app()->clientScript->registerPackage('filestyle');

?>
<tr>
    <td id="promo">
        <img src="images/mapping/img1.jpg" />
    </td>
</tr>
<tr>
    <td id="content">
        <div id="content-inner">
            <div class="left">
                <h1>РЕГИСТРАЦИЯ ПОКУПКИ</h1>
                <div class="clear"></div>
                <div class="row required-text">
                    Пожалуйста, заполните форму ниже корректной информацией для участии в акции Moneyback.
                </div>
                <div class="clear"></div>
                <?php

                $form = $this->beginWidget('CActiveForm', array(
                    'id'=>'cheque-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    'clientOptions' => array(
                        'validateOnSubmit' => false,
                    )));
                ?>
                    <div class="row">
                        <?php echo $form->errorSummary($model); ?>
                        <?php echo $form->label($model,'image'); ?>
                        <?php echo $form->fileField($model, 'image'); ?>
                        <?php echo $form->error($model,'image'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model,'product_id'); ?>
                        <?php $this->widget('CAutoComplete',
                        array(
                            //name of the html field that will be generated
                            'name' => 'product_title',
                            'value' => 'введите первые буквы',
                            //replace controller/action with real ids
                            'url'=> array('product/autoCompleteLookup'),
                            'max' => 10, //specifies the max number of items to display

                            //specifies the number of chars that must be entered
                            //before autocomplete initiates a lookup
                            'minChars' => 2,
                            'delay' => 500, //number of milliseconds before lookup occurs
                            'matchCase' => false, //match case when performing a lookup?
                            'mustMatch' => true,

                            //any additional html attributes that go inside of
                            //the input field can be defined here
                            'htmlOptions'=>array(
                                'size' => '40',
                                'onfocus' => 'if(this.value=="введите первые буквы")this.value=""'
                            ),

                            'methodChain'=>".result(function(event,item){\$(\"#Cheque_product_id\").val(item[1]);})",
                        ));
                        ?>
                        <?php echo $form->hiddenField($model, 'product_id'); ?>
                        <?php echo $form->error($model,'product_id'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model,'store_title'); ?>
                        <?php echo $form->textField($model, 'store_title'); ?>
                        <?php echo $form->error($model,'store_title'); ?>
                    </div>
                    <div class="row">
                        <label>
                            Адрес магазина:
                            <div class="clear"></div>
                            <span>(необязательно)</span>
                            <div class="clear"></div>
                        </label>
                        <?php echo $form->textField($model, 'store_address'); ?>
                        <?php echo $form->error($model,'store_address'); ?>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label for="phone">
                            Мобильный телефон:
                            <div class="clear"></div>
                            <span>(для перевода денежных средств)</span>
                            <div class="clear"></div>
                        </label>
                        <?php echo $form->textField($model, 'phone', array('class'=>'phone')); ?>
                        <?php echo $form->error($model,'phone'); ?>
                    </div>
                    <div class="row buttons">
                        <?php echo CHtml::submitButton(''); ?>
                    </div>
                <?php $this->endWidget(); ?>
                <div class="clear"></div>
            </div>
            <div class="right">
                <h1>ТОВАРЫ <br> АКЦИИ</h1>
                <div class="clear"></div>
                <div id="scroller-outer" class="scrollpane">
                    <div class="top-shadow"></div>
                    <div id="scroller" class="scrollpane">
                        <div class="clear"></div>
                        <ul>
                            <li>
                                <table>
                                    <tr>
                                        <td class="scroller-image">
                                            <img src="images/scroller/img1.png" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="scroller-title">
                                            Тостер <br>
                                            Jungle Green <br>
                                            18338-56
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="scroller-description">
                                            Нержавеющая сталь с покрытием  зеленого цвета и блестящее хромированное покрытие — гармоничное
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            <li>
                                <table>
                                    <tr>
                                        <td class="scroller-image">
                                            <img src="images/scroller/img1.png" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="scroller-title">
                                            Тостер <br>
                                            Jungle Green <br>
                                            18338-56
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="scroller-description">
                                            Нержавеющая сталь с покрытием  зеленого цвета и блестящее хромированное покрытие — гармоничное
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            <li>
                                <table>
                                    <tr>
                                        <td class="scroller-image">
                                            <img src="images/scroller/img1.png" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="scroller-title">
                                            Тостер <br>
                                            Jungle Green <br>
                                            18338-56
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="scroller-description">
                                            Нержавеющая сталь с покрытием  зеленого цвета и блестящее хромированное покрытие — гармоничное
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            <li>
                                <table>
                                    <tr>
                                        <td class="scroller-image">
                                            <img src="images/scroller/img1.png" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="scroller-title">
                                            Тостер <br>
                                            Jungle Green <br>
                                            18338-56
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="scroller-description">
                                            Нержавеющая сталь с покрытием  зеленого цвета и блестящее хромированное покрытие — гармоничное
                                        </td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="bottom-shadow"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="separator-big">* В сердце вашего дома</div>
            <div class="clear"></div>
            <div id="menu-bottom">
                <?php $this->widget('ExternalMenu'); ?>
            </div>
            <div class="clear"></div>
            <div class="separator-small"></div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </td>
</tr>