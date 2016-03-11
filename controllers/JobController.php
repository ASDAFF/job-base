<?php

namespace app\controllers;

class JobController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $title = 'job/create';
        return $this->render('create', ['title' => $title]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
