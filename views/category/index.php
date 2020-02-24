<?php
use yii\helpers\html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php 
      if (yii::$app->session->hasFlash('message')): 
        echo '<div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                '.yii::$app->session->getFlash('message').'
              </div>';
      endif;
     ?>
    <div class="jumbotron">
        <h1>Categories</h1>

        <p class="lead">the list of all category.</p>

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="row">
        <?= Html::a('Create', ['/category/create'], ['class'=>'btn btn-primary']) ?>
    </div>

    <div class="body-content">

        <div class="row">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($categories) > 0): ?>
                    <?php foreach($categories as $category): ?>
                      <th scope="row"><?php echo $category->id; ?></th>
                      <td><?php echo $category->title; ?></td>
                      <td><?php echo $category->description; ?></td>
                      <td><img src="<?php echo $category->image; ?>"></td>
                      <td>
                          <?= Html::a('View', ['/category/show', 'id' => $category->id], ['class'=>'btn btn-primary']) ?>
                          <?= Html::a('Edit', ['/category/edit', 'id' => $category->id], ['class'=>'btn btn-primary']) ?>
                          <?= Html::a('Delete', ['/category/delete', 'id' => $category->id], ['class'=>'btn btn-primary']) ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                  <td>No Records Found !</td>
                <?php endif; ?>
              </tbody>
            </table>
        </div>

    </div>
</div>
