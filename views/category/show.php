<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <h1>VIEW CATEGORY - <?php echo $category->id ?></h1>

    <div class="body-content">
    	<ul class="list-group">
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?php echo $category->title ?>
		  </li>
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <?php echo $category->description ?>
		  </li>
		  <li class="list-group-item d-flex justify-content-between align-items-center">
		    <img src="<?php echo $category->image ?>">
		  </li>
		</ul>

		<div class="row">
			<a href="<?php echo yii::$app->homeUrl; ?>" class="btn btn-primary">< Go Back</a>
		</div>
    </div>
</div>
