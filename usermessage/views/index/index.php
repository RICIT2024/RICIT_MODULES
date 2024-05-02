<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use humhub\widgets\Button;
$this->title = 'Contact Form';

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\usermessage\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('UsermessageModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("usermessage", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('UsermessageModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
    ]);
?>

<div class="panel-heading"><strong>User Contact</strong> <?= Yii::t('UsermessageModule.base', 'overview') ?></div>

<div class="panel-body">    
<h1><?= Html::encode($this->title) ?></h1>
<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
<div class="row">
   <div class="col-lg-5">
       <div class="panel panel-default">
           <div class="panel-heading">Message Sent</div>
           <div class="panel-body">
               <p><b>Nombre:</b> <?=$model->name?> </p>
               <p><b>Email:</b> <?=$model->email?> </p>
               <p><b>Tema:</b> <?=$model->content?> </p>
           </div>
       </div>
       <div class="alert alert-success">
           Gracias por Contactarnos, te responderemos lo más pronto posible!
       </div>
   </div>
</div>
<!-- 
    A continuacion se agrega un formulario a llenar en caso que el formulario esta vacio
-->
<?php else: ?>
<div class="row">
           <div class="col-lg-5">
               <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                   <?= $form->field($model, 'name')->label($label="Nombre") ?>
                   <?= $form->field($model, 'email')->label($label="Correo") ?>
                   <?= $form->field($model, 'title')->label($label="Titulo") ?>
                   <?= $form->field($model, 'content')->label($label="Contenido")->dropDownList(
                   $options = [
                                'Multimedia' => ['Multimedia' => 'Videos, Infografias, Podcast'],
                                'Noticia' => ['Noticia' => 'Noticias, Articulos, Reportes'],
                                'Evento' => ['Evento' => 'Conferencias, Talleres, Congresos, etc'],
                                'Otro' => ['Otro' => 'Dudas']
                            ])?>

                   <div class="form-group">
                       <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                   </div>
               <?php ActiveForm::end(); ?>
           </div>
       </div>
<?php endif; ?>

</div>
