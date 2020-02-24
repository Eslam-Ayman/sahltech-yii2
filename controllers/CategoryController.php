<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category;
use yii\web\UploadedFile;

class CategoryController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $categories = Category::find()->all();
        
        return $this->render('index', ['categories' => $categories]);
    }

    public function actionCreate()
    {
        $category = new Category();

        if (Yii::$app->request->isPost) {

	        $category->image = UploadedFile::getInstance($category, 'image');
	        if ($category->upload()) {
	            // file is uploaded successfully
	            return;
	        }

	        $formData = Yii::$app->request->post();
	        if ($category->load($formData)) {


	        	if ($category->save()) {
	        		Yii::$app->getSession()->setFlash('message', 'Category added successfully');
	        		return $this->redirect(['index']);
	        	}
	        	else{
	        		Yii::$app->getSession()->setFlash('message', 'Failed to Save');
	        	}
	        }
        }

        
        return $this->render('create', ['category' => $category]);
    }


    public function actionShow($id)
    {
        $category = Category::findOne($id);
        
        return $this->render('show', ['category' => $category]);
    }

    public function actionEdit($id)
    {
        $category = Category::findOne($id);
        
        if (Yii::$app->request->isPost && $category->save()) {

	        /*$category->image = UploadedFile::getInstance($category, 'image');
	        if ($category->upload()) {
	            // file is uploaded successfully
	            return;
	        }*/

	        $formData = Yii::$app->request->post();
	        if ($category->load($formData)) {
	        	if ($category->save()) {
	        		Yii::$app->getSession()->setFlash('message', 'Category updated successfully');
					return $this->redirect(['index', 'id' => $category->id]);
	        	}
	        	else{
	        		Yii::$app->getSession()->setFlash('message', 'Failed to Save');
	        	}
	        }
        }

        return $this->render('edit', ['category' => $category]);
    }

    public function actionDelete($id)
    {
        $category = Category::findOne($id)->delete();
        
        if ($category) 
        	Yii::$app->getSession()->setFlash('message', 'Category deleted successfully');

		return $this->redirect(['index']);
    }
}
