<?php

namespace  humhub\modules\Reporte;

use Yii;
use yii\helpers\Url;

class Events
{
    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem([
            'label' => 'Reporte',
            'url' => Url::to(['/Reporte/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-file-archive-o"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'Reporte' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }

    public static function onDailyCronRun(){
		
		$TodaysDate=date("Y-m-d"); 
		
		// Logins, Posts, Comments, Likes, Follows
		
		$ReadLogins=Yii::$app->db->createCommand("SELECT COUNT(last_login) AS Logins 
				FROM user 
				WHERE (last_login >= (NOW() - INTERVAL 1 DAY));")->queryScalar(); 
		
		$ReadPosts=Yii::$app->db->createCommand("SELECT COUNT(updated_at) AS Posts 
				FROM post 
				WHERE (updated_at >= (NOW() - INTERVAL 1 DAY));")->queryScalar(); 
		
		$ReadComments=Yii::$app->db->createCommand("SELECT COUNT(updated_at) AS Comments 
				FROM comment 
				WHERE (updated_at >= (NOW() - INTERVAL 1 DAY));")->queryScalar(); 
		
		$ReadLikes=Yii::$app->db->createCommand("SELECT COUNT(updated_at) AS Likes 
				FROM `like` 
				WHERE (updated_at >= (NOW() - INTERVAL 1 DAY));")->queryScalar(); 
		
		$ReadFollows=Yii::$app->db->createCommand("SELECT COUNT(created_at) AS Follows 
				FROM notification 
				WHERE (created_at >= (NOW() - INTERVAL 1 DAY) AND source_class=\"humhub\\\\modules\\\\user\\\\models\\\\Follow\");")->queryScalar(); 
		
		/* {x:'2022-09-08', y:360}, */
		
		$DailyDataUpdate_cmd=Yii::$app->db->createCommand("INSERT INTO social_stats(x_value, y_value, category) VALUES 
			(:Xval,:Yval,:Categ);"); 
		
		/* Logins */
		$DailyDataUpdate_cmd->bindValues([':Xval'=>$TodaysDate,':Yval'=>$ReadLogins,':Categ'=>'Logins'])->query(); 
		
		/* Posts */
		$DailyDataUpdate_cmd->bindValues([':Xval'=>$TodaysDate,':Yval'=>$ReadPosts,':Categ'=>'Posts'])->query(); 
		
		/* Comments */
		$DailyDataUpdate_cmd->bindValues([':Xval'=>$TodaysDate,':Yval'=>$ReadComments,':Categ'=>'Comments'])->query(); 
		
		/* Likes */
		$DailyDataUpdate_cmd->bindValues([':Xval'=>$TodaysDate,':Yval'=>$ReadLikes,':Categ'=>'Likes'])->query(); 
		
		/* Follows */
		$DailyDataUpdate_cmd->bindValues([':Xval'=>$TodaysDate,':Yval'=>$ReadFollows,':Categ'=>'Follows'])->query(); 
		}
	
}
