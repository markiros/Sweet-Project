<?php
$this->breadcrumbs=array(
    'Catalog',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="category">
<?php
    $level=0;
    foreach ($categories as $n=>$category) {
        if ($category->level==$level)
            echo CHtml::closeTag('li')."\n";
        else if ($category->level>$level)
            echo CHtml::openTag('ul')."\n";
        else {
            echo CHtml::closeTag('li')."\n";
            for ($i=$level-$category->level;$i;$i--) {
                echo CHtml::closeTag('ul')."\n";
                echo CHtml::closeTag('li')."\n";
            }
        }
        echo CHtml::openTag('li');
        echo CHtml::encode($category->title).' ('.$category->id.')';
        $level=$category->level;
    }
    for ($i=$level;$i;$i--) {
        echo CHtml::closeTag('li')."\n";
        echo CHtml::closeTag('ul')."\n";
    }
?>
</div>

<p>You may change the content of this page by modifying the file <tt><?php echo __FILE__; ?></tt>.</p>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_itemView',
)); ?>
