<h1><?php echo $username;?> subs</h1>
<?php echo SiteHelper::share_links($username,$username.' subs','/mysub/'); ?>
<?php
$dataProvider=$model->search();
$dataProvider->pagination->pageSize=5;
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
	