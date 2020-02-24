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
        <h1>PRODUCTS</h1>

        <p class="lead">the list of all Product.</p>

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="row">
        <?= Html::a('Create', ['/product/create'], ['class'=>'btn btn-primary']) ?>
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
                  <th scope="col">color</th>
                  <th scope="col">price</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($products) > 0): ?>
                    <?php foreach($products as $product): ?>
                      <th scope="row"><?php echo $product->id; ?></th>
                      <td><?php echo $product->title; ?></td>
                      <td><?php echo $product->description; ?></td>
                      <td><img src="<?php echo $product->image; ?>"></td>
                      <td><?php echo $product->color; ?></td>
                      <td><?php echo $product->price; ?></td>
                      <td>
                          <?= Html::a('View', ['/product/show', 'id' => $product->id], ['class'=>'btn btn-primary']) ?>
                          <?= Html::a('Edit', ['/product/edit', 'id' => $product->id], ['class'=>'btn btn-primary']) ?>
                          <?= Html::a('Delete', ['/product/delete', 'id' => $product->id], ['class'=>'btn btn-primary']) ?>
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
