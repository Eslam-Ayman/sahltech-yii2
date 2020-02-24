<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <h1>VIEW PRODUCT - <?php echo $product->id ?></h1>

    <div class="body-content">
    	<ul class="list-group">
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?php echo $product->title ?>
		  </li>
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?php echo $product->description ?>
		  </li>
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?php echo $product->color ?>
		  </li>
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?php echo $product->price ?>
		  </li>
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <img src="<?php echo $product->image ?>">
		  </li>
		</ul>

		<div class="row">
			<?= Html::a('< Go Back', ['/product/index'], ['class'=>'btn btn-primary']) ?>
		</div>
    </div>
</div>
