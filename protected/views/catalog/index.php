<?php
$this->breadcrumbs=array(
    'Catalog',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>You may change the content of this page by modifying the file <tt><?php echo __FILE__; ?></tt>.</p>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_itemView',
)); ?>
