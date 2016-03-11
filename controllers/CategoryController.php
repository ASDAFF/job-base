<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Category;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Category::find();

        $pagination = new Pagination([
        	'defaultPageSize' => 20,
        	'totalCount' => $query->count(),
        ]);

        $categories = $query->orderBy('name')
	        ->offset($pagination->offset)
	        ->limit($pagination->limit)
	        ->all();

        return $this->render('index', [
        	'categories' => $categories,
        	'pagination' => $pagination,
        ]);
    }   

    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
        	//  Validate
        	if ($model->validate()) {
        		$model->save();
        		// Send Message
        		Yii::$app->getSession()->setFlash('success', 'Category Added');
        		return $this->redirect('index.php?r=category');
        	}
        }
        return $this->render('create', [
        	'model' => $model,
        ]);
    }



}
