<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->categoryId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Categories', 'url'=>array('create')),
	array('label'=>'View Categories', 'url'=>array('view', 'id'=>$model->categoryId)),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('admin','Update Categories'); ?> <?php echo $model->categoryId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'parentCategory'=>$parentCategory)); ?>