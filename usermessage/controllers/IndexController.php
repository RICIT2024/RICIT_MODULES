<?php
namespace ricit\humhub\modules\usermessage\controllers;

use humhub\components\Controller;
use ricit\humhub\modules\usermessage\models\Forms;

use Yii;

class IndexController extends Controller
{

    public $subLayout = "@usermessage/views/layouts/default";

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Forms();
        /**
        * Primero checamos que la solicitud es post y luego almacena los datos en la tabla
        * de la BD.
        */
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        /**
        *Checamos que el formulario fue admitido y se despliega su vista junto 
        *con los datos del model
        */  
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->render('index', [
                'model' => $model,
            ]);
        /**
        *Si la solicitud no fue un post, solo se despliega la vista y el model.
        *Se regresa el model para que el usuario pueda corregir los errores.
        */     
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

}

