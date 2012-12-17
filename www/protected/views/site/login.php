<?php

$this->pageTitle = Yii::app()->name . " — Вход";

?>

<style type="text/css">
    #wrapper {
        margin: 0 auto;
    }

    div.row label {
        display: block;
        width: 200px;
    }

    div.row input {
        display: block;
        width: 200px;
    }
</style>

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
    <?php echo $form->error($model, 'email'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'password'); ?>
    <?php echo $form->passwordField($model, 'password', array('class' => ($model->getError('password')  ? 'error' : ''))); ?>
    <?php echo $form->error($model, 'password'); ?>
</div>
<div class="row buttons">
    <?php echo CHtml::submitButton('Войти');
    ?>
</div>

<?php $this->endWidget(); ?>
<div class="clear"></div>