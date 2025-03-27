<?php

namespace ricit\humhub\modules\profile\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use yii\web\Response;
use yii\db\Query;
use ricit\humhub\modules\profile\models\SearchPr;
use humhub\modules\user\components\BaseAccountController;
use ricit\humhub\modules\profile\models\Profile;



/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends BaseAccountController
{
    public function init()
    {
        $this->appendPageTitle(Yii::t('ProfileModule.base', 'Profile'));
        return parent::init();
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Profile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $User_id = Yii::$app->user->getId(); 
        $searchModel = new SearchPr();
        $sublayout = 'default';

        if(Yii::$app->user->isAdmin() ){
            $dataProvider = $searchModel->searchAll($this->request->queryParams);
            $this->subLayout = '@profile/views/layouts/' . $sublayout;
        } 
        
        else {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $User_id);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param int $user_id User ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id)
    {
        $sublayout = Yii::$app->user->isAdmin() ? 'default' : null;

        if(Yii::$app->user->isAdmin() ){
            $this->subLayout = '@profile/views/layouts/' . $sublayout;
        } 

        return $this->render('view', [
            'model' => $this->findModel($user_id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Profile();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'user_id' => $model->user_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $user_id User ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_id)
    {
        $model = $this->findModel($user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }

        else if (Yii::$app->user->isAdmin() ){
            $this->subLayout = '@profile/views/layouts/' . $sublayout;
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $user_id User ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_id)
    {
        $this->findModel($user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $user_id User ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id)
    {
        if (($model = Profile::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionExportExcel()
{
    $query = (new Query())
        ->select(['user_id', 'firstname', 'lastname', 'entidad', 'municipio', 'gender', 'rangoga', 'aniosexperiencias', 'sni'])
        ->from('profile');

    $data = $query->all();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Título principal
    $sheet->mergeCells('A1:K1');
    $sheet->setCellValue('A1', 'BASE DE DATOS DE USUARIOS  RICIT');
    $styleTitle = $sheet->getStyle('A1');
    $styleTitle->getFont()->setBold(true)->setItalic(true)->setSize(14)->setName('Noto Sans')->getColor()->setARGB('FFFFFF'); // Letra blanca
    $styleTitle->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $styleTitle->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('611232'); // Color vino

    // Encabezados
    $headers = [
        'No.', 'ID', 'Nombre', 'Apellidos', 'Entidad', 'Municipio', 'Sexo', 'Rango de edad', 'Años de experiencia como investigador', 'SNI: Sí/NO', 'NIVEL DE SNI'
    ];

    $col = 'A';
    foreach ($headers as $header) {
        $cell = $col . '2';
        $sheet->setCellValue($cell, $header);
        $style = $sheet->getStyle($cell);
        $style->getFont()->setBold(true)->setName('Noto Sans')->getColor()->setARGB('000000'); // Letra negra
        $style->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $style->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6D194'); // Color amarillo claro
        $col++;
    }

    // Llenar datos
    $row = 3;
    $count = 1;
    foreach ($data as $record) {
        $sheet->setCellValue('A' . $row, $count);
        $sheet->setCellValue('B' . $row, $record['user_id']);
        $sheet->setCellValue('C' . $row, $record['firstname']);
        $sheet->setCellValue('D' . $row, $record['lastname']);
        $sheet->setCellValue('E' . $row, $record['entidad']);
        $sheet->setCellValue('F' . $row, $record['municipio']);
        $sheet->setCellValue('G' . $row, $record['gender']);
        $sheet->setCellValue('H' . $row, $record['rangoga']);
        $sheet->setCellValue('I' . $row, $record['aniosexperiencias']);

        // Aplicar condición en SNI: Sí/No
        $sniValue = strtolower($record['sni']);
        $sniResult = (in_array($record['sni'], ['SNI_1', 'SNI_2', 'SNI_3'])) ? 'Sí' : 'No';

        $sheet->setCellValue('J' . $row, $sniResult);
        $sheet->setCellValue('K' . $row, $record['sni']); // Mantiene el valor original en Nivel de SNI

        $row++;
        $count++;
    }

    // Ajustar tamaño de columnas
    foreach (range('A', 'K') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'Base_de_Datos_Usuarios.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');

    ob_end_clean();
    $writer->save('php://output');
    exit;
}

}
