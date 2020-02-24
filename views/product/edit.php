<?php
use yii\helpers\html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$models = app\models\Category::find()->asArray()->all();

$map = ArrayHelper::map($models, 'id', 'title'); // (where 'id' becomes the value and 'name' the name of the value which will be displayed)

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <h1>Create Product</h1>

    <div class="body-content">
    	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($product, 'title');?>
            	</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($product, 'description')->textarea(['rows'=>6]);?>
            	</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($product, 'category_id')->dropDownList($map) ?>
            	</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?php $color = ['red'=>'red', 'green'=>'green', 'blue'=>'blue', 'yellow'=>'yellow'] ?>
					<?= $form->field($product, 'color')->dropDownList($color);?>
            	</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?php $price = ['10'=>'10', '20'=>'20', '30'=>'30', '40'=>'40'] ?>
					<?= $form->field($product, 'price')->dropDownList($price);?>
            	</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($product, 'image')->fileInput();?>
            	</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            	<!-- <div class="col-lg-6"> -->
            		<div class="col-lg-3">
            			<?= Html::a('< Go Back', ['/product/index'], ['class'=>'btn btn-primary']) ?>
            		</div>
            		<div class="col-lg-3">
            			<?= Html::submitButton('Create Product >', ['class'=>'btn btn-primary']);?>
            		</div>
            	</div>
            <!-- </div> -->
        </div>
    	<?php ActiveForm::end(); ?>

    </div>
</div>
