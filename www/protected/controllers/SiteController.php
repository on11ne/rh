<?php

class SiteController extends Controller
{

    public $layout='//layouts/index';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {

                if($model->email == 'admin')
                    $this->redirect(array('admin/default'));
                else
                    $this->redirect(array('site/index'));
            }
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

    public function actionRegister() {

        $user = new User;

        $raw_password = '';

        if(isset($_POST['ajax']) && $_POST['ajax']==='register-form') {

            echo CActiveForm::validate($user);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['User']))
        {
            $user->attributes = $_POST['User'];
            $user->activation_key = sha1(mt_rand(10000, 99999) . time() . $user->email);
            $user->status = User::NOT_ACTIVATED;

            if($user->save()) {

                $message = $this->renderPartial('//messages/registration', array('data' => array(
                    'name' => $user->name,
                    'activationLink' => Yii::app()->createAbsoluteUrl('site/activate', array('activation_key' => $user->activation_key))
                )), true);

                if(Mailer::sendToUser($user->email, "Активация учётной записи", $message)) {

                    Yii::app()->user->setFlash('success', "<h1>Спасибо!</h1><div class='row required-text'>На ваш адрес электронной почты отправлено сообщение с деталями активации</div>");
                    $this->redirect(array('site/index'));
                } else {

                    $user->addError('email', "Сообщение об активации не может быть отправлено на указанный адрес");
                    Yii::app()->user->setFlash('success', "<h1>Ошибка</h1><div class='row required-text'>Сообщение об активации не может быть отправлено на указанный адрес</div>");
                }
            }
        }

        $user->password = $raw_password;

        $this->redirect(array('site/index'));

    }

    public function actionActivate() {

        if(empty($_GET['activation_key']))
            throw new CHttpException(404, 'Активационный ключ не найден');
        else
            $activation = $_GET['activation_key'];

        $model = User::model()->findByAttributes(array(
            'activation_key' => $activation
        ));

        if ($model === null)
            throw new CHttpException(404, 'Активационный ключ не найден');
        else
            $model->status = User::NOT_MODERATED;

        if($model->save()) {

            Yii::app()->user->setFlash('success', "<h1>Спасибо!</h1><div class='row required-text'>Учётная запись успешно активирована</div>");

            $message = $this->renderPartial('//messages/new_user', array('data' => $model), true);
            if(!Mailer::sendToModerator($model->email, $model->name, "Регистрация нового пользователя", $message)) {
                Yii::app()->user->setFlash('success', "<h1>Спасибо!</h1><div class='row required-text'>Не возможно отправить сообщение об активации<br/>Просьба связаться с администратором " . Yii::app()->params['adminEmail'] . "</div>");
            }
        }
        else
            Yii::app()->user->setFlash('success', "<h1>Ошибка</h1><div class='row required-text'>Ошибка активации учётной записи</div>");

        $this->redirect(array('site/index', '#'=>'login')); // TODO: autologin
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}