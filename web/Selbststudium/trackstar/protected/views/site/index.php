<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?>.</i></h1>
<h3>Now kill yourself.</h3>

<?php if(!Yii::app()->user->isGuest):?>
    <p>
        You last logged in on <?php echo Yii::app()->user->lastLogin; ?>.
    </p>
<?php endif;?>