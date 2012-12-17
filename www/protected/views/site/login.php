<h1>Авторизация <br> пользователя</h1>
<div class="clear"></div>
<?php

$model = new LoginForm();

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
    <?php echo $model->getError('email'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'password'); ?>
    <?php echo $form->passwordField($model, 'password', array('class' => ($model->getError('password')  ? 'error' : ''))); ?>
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