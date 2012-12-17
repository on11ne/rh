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
    Yii::app()->clientScript->registerScriptFile('/js/flash-messages.js', CClientScript::POS_BEGIN);
    ?>

</head>
<body>

<?php
$flashMessages = Yii::app()->user->getFlashes();

if ($flashMessages)
    foreach($flashMessages as $key => $message)
        echo '<div class="' . $key . '" style="display:none;">' . $message . "</div>\n";

?>

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
            'enableAjaxValidation' => true,
            'action' => Yii::app()->createUrl('site/login'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            )));
        ?>
        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model, 'email', array('class' => ($model->getError('email')  ? 'error' : ''))); ?>
            <?php echo $form->error($model, 'email', array('hideErrorMessage' => true)); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => ($model->getError('email')  ? 'error' : ''))); ?>
            <?php echo $form->error($model, 'password', array('hideErrorMessage' => true)); ?>
        </div>
        <div class="row buttons">
            <?php echo CHtml::submitButton(''); ?>
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
            'enableAjaxValidation' => true,
            'action' => Yii::app()->createUrl('site/register'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            )));
        ?>
        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model, 'name', array('class' => ($model->getError('name')  ? 'error' : ''))); ?>
            <?php echo $form->error($model, 'name', array('hideErrorMessage' => true)); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model, 'email', array('class' => ($model->getError('email')  ? 'error' : ''))); ?>
            <?php echo $form->error($model, 'email', array('hideErrorMessage' => true)); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'phone'); ?>
            <?php echo $form->textField($model, 'phone', array('class' => ($model->getError('phone')  ? 'phone error' : 'phone'))); ?>
            <?php echo $form->error($model, 'phone', array('hideErrorMessage' => true)); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => ($model->getError('email')  ? 'error' : ''))); ?>
            <?php echo $form->error($model, 'password', array('hideErrorMessage' => true)); ?>
        </div>
        <div class="checkbox">
            <?php echo $form->checkBox($model, 'agree', array('value' => 1)); ?>
            <label for="User_agree">Принимаю <a href="<?php echo Yii::app()->createUrl('site/regulatuions'); ?>" title="условия акции">условия акции</a></label>
            <?php echo $form->error($model, 'agree', array('hideErrorMessage' => true)); ?>
            <div class="clr"></div>
        </div>
        <div class="row buttons">
            <?php echo CHtml::submitButton('') ?>
        </div>
        <?php $this->endWidget(); ?>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>