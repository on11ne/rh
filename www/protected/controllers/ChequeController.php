<?php

class ChequeController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }


    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('create','index'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


	public function actionCreate()
	{

        $model = new Cheque();

        if(isset($_POST['ajax']) && $_POST['ajax']==='cheque-form') {

            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Cheque']))
        {
            $model->attributes = $_POST['Cheque'];
            $model->user_id = Yii::app()->user->id;
            $model->status = 0;

            $model->image = CUploadedFile::getInstance($model, 'image');

            if($model->image) {
                $image_name = uniqid() . "." . pathinfo($model->image->name, PATHINFO_EXTENSION);

                $upload_directory = Yii::getPathOfAlias('webroot') . '/images/cheques/' . $image_name;

                if(!$model->image->saveAs($upload_directory))
                    $model->addError('image', 'Фотография не может быть сохранена');

                $model->image = $image_name;

            } else {
                $model->addError('image', "Не возможно сохранить изображение");
                Yii::app()->user->setFlash('success', "Ошибка<br/>Не возможно сохранить изображение");
            }

            if($model->save()) {

                $message = $this->renderPartial('//messages/new_cheque', array('data' => $model), true);

                Mailer::sendToModerator(
                    Yii::app()->params['adminEmail'],
                    Yii::app()->user->name,
                    "Добавлен новый чек на модерацию",
                    $message);

                $message = $this->renderPartial('//messages/new_cheque_user', array(
                    'data' => $model), true);

                Mailer::sendToUser(
                    $model->user->email,
                    $model->user->name,
                    "Добавлен новый чек на модерацию",
                    $message);

                Yii::app()->user->setFlash('success', "Спасибо!<br/>Ваша чек отправлен на модерацию");
                $this->redirect(array('site/index'));

            } else {
                Yii::app()->user->setFlash('success', "Ошибка<br/>Не возможно сохранить чек");
            }
        }


		$this->render('create', array('model' => $model));
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}