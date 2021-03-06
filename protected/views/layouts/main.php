<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language;?>" />
	<?php if( isset ($this->ogtags) ) echo $this->ogtags; ?>
	<?php 
	if( strtolower($this->id) == 'site' and strtolower($this->action->Id) == 'index'){
	?>
	<meta name="description" content="<?php echo Yii::t('site','Samesub is a space where only one subject is transmitted at a time in a synchronous manner, thus, everyone connected to the site interact with that same subject');?>">
	<?php } ?>
	<meta name="keywords" content="<?php echo  str_replace(" ", ",", str_replace(",", "", $this->pageTitle));?>">
	<script type="text/javascript">
	var ssBaseUrl = '<?php echo Yii::app()->getRequest()->getBaseUrl(true);?>';
	var ssRequestInterval = <?php echo Yii::app()->params['request_interval'];?>;
	var ssAddThisLinkUrl = '<?php echo Yii::app()->params['addthis_link_url'];?>';
	var ssAddThisImgUrl = '<?php echo Yii::app()->params['addthis_img_url'];?>';
	var ssLang=new Object();
	
	ssLang.site={'liveNowTitle':'<?php echo Yii::t('site','LIVE NOW: {1}',array('{1}'=>'{0}'));?>', 'errorGettingData':'<?php echo Yii::t('site','LIVE: There was an error getting data from the server to your device. Please check your internet connection. Retrying in 15 seconds.');?>','myAccount':'<?php echo Yii::t('site','My Account');?>','profile':'<?php echo Yii::t('site','Profile');?>','mySub':'<?php echo Yii::t('site','Mysub');?>','logout':'<?php echo Yii::t('site','Logout');?>','writeYourComments':'<?php echo Yii::t('site','Write your comments here!');?>','commentSentChat':'<?php echo Yii::t('site','Sent, wait few seconds');?>','errorSendingComment':'<?php echo Yii::t('site','Error: check connection');?>','waitingForComments':'<?php echo Yii::t('site','Waiting for comments');?>','commentsClosing':'<?php echo Yii::t('site','Comments closing...');?>','commentsClosed':'<?php echo Yii::t('site','Comments CLOSED');?>','changingToNextSubject':'<?php echo Yii::t('site','Changing to next subject, get ready!');?>','uploadSubject':'<?php echo Yii::t('site','Add Subject');?>','history':'<?php echo Yii::t('site','History');?>'}
	</script>
	<?php
	$filepath = Yii::app()->params['webdir'];
	if(strtolower($this->id) != 'site' or strtolower($this->action->Id) != 'index'){	?>
		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen-<?php echo filemtime($filepath.'/css/screen.css'); ?>.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print-<?php echo filemtime($filepath.'/css/print.css'); ?>.css" media="print" />
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie-<?php echo filemtime($filepath.'/css/ie.css'); ?>.css" media="screen, projection" />
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main-<?php echo filemtime($filepath.'/css/main.css'); ?>.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form-<?php echo filemtime($filepath.'/css/form.css'); ?>.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/core-<?php echo filemtime($filepath.'/css/core.css'); ?>.css" />
	<?php
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/site-'.filemtime($filepath.'/js/site.js').'.js');
	}else{
	?>
		<script type="text/javascript">				
		var element1 = document.createElement("link");
		element1.type="text/css";
		element1.rel = "stylesheet";
		element1.href = "<?php echo Yii::app()->getRequest()->getBaseUrl(true);?>/css/core-<?php echo filemtime($filepath.'/css/core.css'); ?>.css";
		document.getElementsByTagName("head")[0].appendChild(element1);

		<?php $time = SiteLibrary::utc_time(); ?>

		var utc_time = <?php echo $time;?>;
		var utc_hour = <?php echo date("H",$time); ?>;
		var utc_min = <?php echo date("i",$time); ?>;
		var utc_sec = <?php echo date("s",$time); ?>;

		var element2 = document.createElement("script");
		element2.src = "<?php echo Yii::app()->getRequest()->getBaseUrl(true);?>/js/core-<?php echo filemtime($filepath.'/js/core.js'); ?>.js";
		element2.type="text/javascript";
		document.getElementsByTagName("head")[0].appendChild(element2);
		</script>
		<style>
		.comment_dislike_button, .sub_dislike_button {
			background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/dislike-<?php echo filemtime($filepath.'/images/dislike.png'); ?>.png);
		}
		.comment_like_button, .sub_like_button{
			background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/like-<?php echo filemtime($filepath.'/images/like.png'); ?>.png);
		}
		</style>
	<?php		
	}
	?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<noscript>Your browser does NOT support javascript or has it disabled. Please click <?php echo CHtml::link('here',Yii::app()->getRequest()->getBaseUrl(true).'/index'); ?> if you want to use this site without javascript or enable the javascript feature in your browser and reload the page.</noscript>
<?php 
if( (strtolower($this->id) == 'site' and strtolower($this->action->Id) == 'index')){
?>
<div id="preload" style="position:absolute;width: 100%; top:50%; height:50px; margin-top:-50px; text-align:center; font-weight:bold; font-size: 40px; color:#D6D6D6;font-family: Trebuchet MS, Arial, Helvetica, sans-serif;"><p><?php echo Yii::t('site','ssBackgroundMessageDescription');?></p>
</div>
<?php 
}
?>
<div id="top_page">
	<div id="top_page_menu_left">		
		
	</div>
	
	<div id="top_page_menu_right2" class="top_page_menu">
		<ul id="nav" class="drop"><li><a href="<?php echo Yii::app()->request->baseUrl.'/site/index';?>"><img src="<?php echo Yii::app()->request->baseUrl.'/images/menu_icon.png';?>"></a><ul><li><a href="<?php echo Yii::app()->request->baseUrl.'/site/index';?>">Home</a></li><li><a href="<?php echo Yii::app()->request->baseUrl.'/subject/index';?>"><?php echo Yii::t('site','History');?></a></li><li><a href="<?php echo Yii::app()->request->baseUrl.'/site/contact';?>"><?php echo Yii::t('site','Contact us');?></a></li></ul></li></ul>
	</div>
	<div class="top_page_menu">
		<span><a href="javascript:void(0)" id="search_icon" title="<?php echo Yii::t('site','Search');?>"><img src="<?php echo Yii::app()->request->baseUrl.'/images/search_icon.png';?>"></a></span>
	</div>
	<div class="top_page_menu" style="padding:0">
		<form method="get" action="<?php echo Yii::app()->request->baseUrl.'/subject/index';?>" id="search">
			<input id="search_box" name="Subject[title]" type="text" size="5" value="" style="display:none; width:1px; margin:0"/>
		</form>
	</div>
	<div id="top_page_menu_right1" class="top_page_menu">
		<span><?php echo '<a href="'. Yii::app()->createUrl('site/login').'">'.Yii::t('site','Login').'</a>';?></span>
		<span> | <?php echo '<a href="'. Yii::app()->createUrl('subject/add').'">'.Yii::t('site','Add Subject').'</a>';?> |</span>		
	</div>
	

</div>
<div id="page" class="container" <?php echo ((strtolower($this->id) == 'site' and strtolower($this->action->Id) == 'index')) ? 'style="display:none;"' : '';?>>
	<div id="header" class="bounded">

		<?php if(strtolower(Yii::app()->controller->action->id) == 'index' and strtolower(Yii::app()->controller->id) == 'site'){
				
		} else { ?>
		<div id="header_top">
			<iframe src="<?php echo Yii::app()->getRequest()->getBaseUrl(true).'/empty.html';?>" width="800" height="20" id="header_top_frame" frameBorder="0" scrolling="no" style="background-color:white; z-index:9000;"></iframe>
		</div>
		<div class="clear_both" style="margin-bottom:30px"></div>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
              'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		<?php } ?>
		

	</div>
	<div id="main_body" class="bounded">
	<?php if (Yii::app()->user->hasFlash('layout_flash_success')):?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('layout_flash_success'); ?>
		</div>
	<?php endif; ?>
	<?php if (Yii::app()->user->hasFlash('layout_flash_error')):?>
		<div class="flash-error">
			<?php echo Yii::app()->user->getFlash('layout_flash_error'); ?>
		</div>
	<?php endif; ?>
	<?php if (Yii::app()->user->hasFlash('layout_flash_notice')):?>
		<div class="flash-notice">
			<?php echo Yii::app()->user->getFlash('layout_flash_notice'); ?>
		</div>
	<?php endif; ?>
	
	<?php echo $content; ?>
	
	</div>
	<br class="clear_both">
	<hr class="page_hrline" style="margin-top:100px;">
	<div id="footer" class="bounded">
		
			<span style="margin-right:20px">&copy; <?php echo date('Y'); ?> Samesub</span>
			<span><a href="<? echo Yii::app()->getRequest()->getBaseUrl(true);?>/site/contact"><?php echo Yii::t('site','Contact us');?></a></span>
			<span><b> | </b><a href="<? echo Yii::app()->getRequest()->getBaseUrl(true);?>/site/page/view/about"><?php echo Yii::t('site','About');?></a></span>
			<span><b> | </b><a href="<? echo Yii::app()->getRequest()->getBaseUrl(true);?>/site/page/view/faq"><?php echo Yii::t('site','FAQ');?></a></span>
			<span><b> | </b><a href="<? echo Yii::app()->getRequest()->getBaseUrl(true);?>/developers"><?php echo Yii::t('site','Developers/API');?></a></span>
			<span><b> | </b><a href="<? echo Yii::app()->getRequest()->getBaseUrl(true);?>/site/page/view/terms"><?php echo Yii::t('site','Terms of Use');?></a></span>
			<span><b> | </b><a href="<? echo Yii::app()->getRequest()->getBaseUrl(true);?>/site/page/view/privacy"><?php echo Yii::t('site','Privacy Statement');?></a></span>
			<?php if(strtolower(Yii::app()->controller->action->id) == 'index' and strtolower(Yii::app()->controller->id) == 'site') echo '<span><b> | '.Yii::t('site','UTC NOW:').' </b></span><span id="utc_clock"></span><br />'; ?>
		<br/>
	</div>

</div>
<?php echo Yii::app()->params['webanalytics_html'];?>
</body>
</html>