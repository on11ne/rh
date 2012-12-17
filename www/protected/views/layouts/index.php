<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>



    <tr>
        <td id="header">
            <div id="header-inner">
                <a href="/">
                    <img src="images/mapping/logo.jpg" alt="Russell Hobbs">
                </a>
            </div>
        </td>
    </tr>
    <tr>
        <td id="promo">
            <div id="promo-inner">

                <?php echo $content; ?>

            </div>
        </td>
    </tr>
    <tr>
        <td id="content">
            <div id="content-inner">
                <div class="clear"></div>
                <div id="menu-top">
                    <div class="auth">
                        <?php if(Yii::app()->user->isGuest) : ?>
                        <a class="fancybox register" href="#register"></a>
                        <a class="fancybox login" href="#login"></a>
                        <?php endif; ?>
                    </div>
                    <div class="help">
                        <ul>
                            <?php if(!Yii::app()->user->isGuest) : ?>
                            <li>
                                <a class="purchase" href="<?php echo Yii::app()->createUrl('cheque/create'); ?>">Регистрация покупки</a>
                            </li>
                            <?php endif; ?>

                            <li>
                                <a class="regulations" href="<?php echo Yii::app()->createUrl("site/regulations"); ?>">Правила акции</a>
                            </li>
                            <li>
                                <a class="feedback" href="<?php echo Yii::app()->createUrl("feedback/create"); ?>">Обратная связь</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="separator-big"></div>
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
<?php $this->endContent(); ?>