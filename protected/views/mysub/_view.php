<div style="padding-bottom:25px;">

	<div class="row">
		<a style="font-size: 20px;color: #blue;font-weight: bold;font-family: arial;" href="<?php echo Yii::app()->createUrl('sub/'.$data->urn);?>"><?php echo CHtml::encode($data->title); ?></a>
	</div>
	
	<div class="row">
		<?php echo $data->country->name . " | "; ?>
		<?php echo CHtml::encode(date("Y/m/d H:i", $data->show_time)." UTC"); ?>
	</div>

	<div class="row">
		<?php echo SiteHelper::subject_content($data); ?>
	</div>

	<div class="row">
		<?php echo SiteHelper::formatted($data->user_comment); ?>
	</div>
	
	<div class="row">
		<?php echo SiteHelper::share_links($data->urn,$data->title); ?>
	</div>
	
	<h4>Last 5 Comments:</h4>

	<?php foreach($data->comments as $comment): $i++; if($i==6) break;?>
	<div class="comment" id="c<?php echo $comment->id; ?>">

		<div class="time">
			<?php echo date("Y/m/d H:i",$comment->time)." UTC"; ?>
		</div>

		<div class="content">
			<?php echo nl2br(CHtml::encode($comment->comment)); ?>
		</div>

	</div><!-- comment -->
	<?php endforeach; ?>

</div>