<?php
/* @var $this SiteController */
/* @var $loginFormModel LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::t("app", "page.login.title");
$this->breadcrumbs = array(
    Yii::t("app", "page.login.breadcrumb.label"),
);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));

$redirectUrlField['input'] = $form->hiddenField($loginFormModel, "redirect_url", array("value" => $loginFormModel->redirect_url));

$emailField['label'] = $form->labelEx($loginFormModel,'email_address');
$emailField['input'] = $form->textField($loginFormModel,'email_address');
$emailField['error'] = $form->error($loginFormModel,'email_address');

?>

<h1><?php echo Yii::t("app", "page.login.header"); ?></h1>

<p><?php echo Yii::t("app", "page.login.description"); ?></p>



<div class="form">
    <p class="note"><?php echo str_replace("{asterisk}", "<span class=\"required\">*</span>", Yii::t("app", "page.login.required_text")); ?></p>

    <?php echo $form->errorSummary($loginFormModel); ?>

    <?php echo $redirectUrlField['input']; ?>

    <div class="row">
        <?php echo $emailField['label']; ?>
        <?php echo $emailField['input']; ?>
        <?php echo $emailField['error']; ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($loginFormModel,'password'); ?>
        <?php echo $form->passwordField($loginFormModel,'password'); ?>
        <?php echo $form->error($loginFormModel,'password'); ?>

    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($loginFormModel,'rememberMe'); ?>
        <?php echo $form->label($loginFormModel,'rememberMe'); ?>
        <?php echo $form->error($loginFormModel,'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
