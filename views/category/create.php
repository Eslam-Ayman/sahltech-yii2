<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <h1>Create Category</h1>

    <div class="body-content">
    	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($category, 'title');?>
            	</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($category, 'description')->textarea(['rows'=>6]);?>
            	</div>
            </div>
        </div>        
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($category, 'image')->fileInput();?>
            	</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
            	<!-- <div class="col-lg-6"> -->
            		<div class="col-lg-3">
            			<a href="<?php echo yii::$app->homeUrl; ?>" class="btn btn-primary">< Go Back</a>
            		</div>
            		<div class="col-lg-3">
            			<?= Html::submitButton('Create Category >', ['class'=>'btn btn-primary']);?>
            		</div>
            	</div>
            <!-- </div> -->
        </div>
    	<?php ActiveForm::end(); ?>

    </div>
</div>
