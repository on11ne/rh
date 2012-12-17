<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php
    Yii::app()->clientScript->registerCoreScript('jquery');
    Yii::app()->clientScript->registerPackage('fancybox');
    Yii::app()->clientScript->registerPackage('carousel');
    Yii::app()->clientScript->registerPackage('mask');
    ?>

</head>
<body>
<table id="wrapper">

    <?php echo $content; ?>

    <tr>
        <td id="footer">
            <div id="footer-inner">
                <img src="images/mapping/copy.png" alt="© 2012 SPECTRUM BRANDS , INC., ALL RIGHTS RESERVED" />
            </div>
        </td>
    </tr>
</table>
<div style="display: none;">
    <div id="login">
        <h1>Авторизация <br> пользователя</h1>
        <div class="clear"></div>
        <?php

        $model = new LoginForm;

        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            )));
        ?>
        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model, 'email', array('class' => ($model->getError('email')  ? 'error' : ''))); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => ($model->getError('email')  ? 'error' : ''))); ?>
        </div>
        <div class="row buttons">
        <?php echo CHtml::ajaxSubmitButton('',
            Yii::app()->createUrl('site/login'),
            array('update' => '#register')
        );
        ?>
        </div>

        <?php $this->endWidget(); ?>
        <div class="clear"></div>
    </div>

    <div id="register">
        <h1>Регистрация <br> пользователя</h1>
        <div class="clear"></div>
        <div class="row required-text">
            Все поля обязательны для заполнения
        </div>
        <div class="clear"></div>
        <?php

        $model = new User;

        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'register-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            )));
        ?>
            <div class="row">
                <?php echo $form->labelEx($model,'name'); ?>
                <?php echo $form->textField($model, 'name', array('class' => ($model->getError('name')  ? 'error' : ''))); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model, 'email', array('class' => ($model->getError('email')  ? 'error' : ''))); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'phone'); ?>
                <?php echo $form->textField($model, 'phone', array('class' => ($model->getError('phone')  ? 'phone error' : 'phone'))); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->passwordField($model, 'password', array('class' => ($model->getError('email')  ? 'error' : ''))); ?>
            </div>
            <div class="row buttons">
                <?php echo CHtml::ajaxSubmitButton('',
                Yii::app()->createUrl('site/register'),
                array('update' => '#register')
            ); ?>
            </div>
        <?php $this->endWidget(); ?>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>