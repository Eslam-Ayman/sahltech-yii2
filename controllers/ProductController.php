<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;
use yii\web\UploadedFile;

class ProductController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $products = Product::find()->all();
        
        return $this->render('index', ['products' => $products]);
    }

    public function actionCreate()
    {
        $product = new Product();

        if (Yii::$app->request->isPost) {

	        /*$product->image = UploadedFile::getInstance($product, 'image');
	        if ($product->upload()) {
	            // file is uploaded successfully
	            return;
	        }*/

	        $formData = Yii::$app->request->post();
	        if ($product->load($formData)) {


	        	if ($product->save()) {
	        		Yii::$app->getSession()->setFlash('message', 'Product added successfully');
	        		return $this->redirect(['index']);
	        	}
	        	else{
	        		Yii::$app->getSession()->setFlash('message', 'Failed to Save');
	        	}
	        }
        }

        
        return $this->render('create', ['product' => $product]);
    }


    public function actionShow($id)
    {
        $product = Product::findOne($id);
        
        return $this->render('show', ['product' => $product]);
    }

    public function actionEdit($id)
    {
        $product = Product::findOne($id);
        
        if (Yii::$app->request->isPost && $product->save()) {

	        /*$product->image = UploadedFile::getInstance($product, 'image');
	        if ($product->upload()) {
	            // file is uploaded successfully
	            return;
	        }*/

	        $formData = Yii::$app->request->post();
	        if ($product->load($formData)) {
	        	if ($product->save()) {
	        		Yii::$app->getSession()->setFlash('message', 'Product updated successfully');
					return $this->redirect(['index', 'id' => $product->id]);
	        	}
	        	else{
	        		Yii::$app->getSession()->setFlash('message', 'Failed to Save');
	        	}
	        }
        }

        return $this->render('edit', ['product' => $product]);
    }

    public function actionDelete($id)
    {
        $product = Product::findOne($id)->delete();
        
        if ($product) 
        	Yii::$app->getSession()->setFlash('message', 'Product deleted successfully');
        
		return $this->redirect(['index']);
    }
}
