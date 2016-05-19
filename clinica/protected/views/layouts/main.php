<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<?php 

	echo Yii::app()->bootstrap->registerAllCss();
	echo Yii::app()->bootstrap->registerCoreScripts();

	?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>



	<!-- <div class="navbar navbar-inverse navbar-fixed-top"> -->
	<div class="navbar navbar-default" role="navigation">
		<div class="navbar-inner">
			<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="colapse" data-target=".nav collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		<a class="brand" href="<?php echo Yii::app()->homeUrl;?>">
		<?php echo CHtml::encode(Yii::app()->name);?>

		</a>
		<div class="nav-collapse collapse">
		<?php $this->widget('bootstrap.widgets.TbMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contacto', 'url'=>array('/site/contact')),
				array('label'=>'Paciente', 'url'=>array('/Paciente/index')),
				array('label'=>'Registro', 'url'=>array('/site/registro'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Iniciar sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Panel', 'visible'=>!Yii::app()->user->isGuest,
						'items'=> array(
							array('label'=>'Configuración','url'=>array('/usuario/configuracion')),
							),
					),
				array('label'=>'Cerrar sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			'htmlOptions'=>array('class'=>'nav navbar-nav')
		)); ?>
		</div>
		</div>
		</div>
	</div><!-- mainmenu -->

	<div class="container" >
		<div class="page-header" >

			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
			<?php endif?>
		</div>
		<?php echo $content; ?>
	
	</div>


</body>
</html>
