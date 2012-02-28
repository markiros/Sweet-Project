<?php
$this->breadcrumbs=array(
    'Catalog'=>array('index'),
    $model->title,
);
?>

<h1>View Product</h1>

<p>id:  <?php echo CHtml::encode($model->id); ?></p>
<p>title: <?php echo CHtml::encode($model->title); ?></p>
<p>articul: <?php echo CHtml::encode($model->articul); ?></p>
<p>image_url: <?php echo CHtml::encode($model->image_url); ?></p>
<p>price: <?php echo CHtml::encode($model->price); ?></p>

