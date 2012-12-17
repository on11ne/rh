<?php

class ProductController extends Controller
{
	public function actionAutoCompleteLookup()
	{
        if(Yii::app()->request->isAjaxRequest && isset($_GET['q']))
        {
            /* q is the default GET variable name that is used by
            / the autocomplete widget to pass in user input
            */
            $title = $_GET['q'];

            // this was set with the "max" attribute of the CAutoComplete widget
            $limit = min($_GET['limit'], 50);

            $criteria = new CDbCriteria;
            $criteria->condition = "sku LIKE :title";
            $criteria->params = array(":title"=>"%$title%");
            $criteria->limit = $limit;

            $citiesArray = Product::model()->findAll($criteria);

            $returnVal = '';

            foreach($citiesArray as $city)
            {
                $returnVal .= $city->getAttribute('sku').'|'
                    .$city->getAttribute('id')."\n";
            }

            echo $returnVal;
        }
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