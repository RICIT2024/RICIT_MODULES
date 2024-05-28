<?php

/**
 * Peter Zieseniss
 * Copyright (C) 2022
 * 
 * Please consider making a donation using the button found on the main page of this module; it would help me greatly..
 *
 * This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 */


/* use Yii; */
use humhub\modules\admin\permissions\ManageModules;

use yii\helpers\Url;
use yii\helpers\Html;
use yii\base\Application;
use yii\db\Connection; 
/* use yii\base\Module;  */
use yii\web\AssetBundle;

$_SESSION['social_stats_sesh']='MySocialStatsSesh'; 


if (!\Yii::$app->user->can(ManageModules::class)) {
	return; 
	}

$MyBR='<br>'; 

?>
<div class="panel panel-default">
	<div class="panel-heading"><strong>Social Stats</strong></div>
	<div class="panel-body">
		<style>
			.myjustify {text-align: justify; }
			.mycentertext {text-align: center; }
			.myrighttext {text-align: right !important; }
			.myunderline {text-decoration: underline; }
			.nounderline {text-decoration: none; }
			.mybold {font-weight: bold; }
			.myita {font-style: italic; }
			.mynoita {font-style: normal; }
			.margbotfull {margin-bottom: 1em !important; }
			.margbothalf {margin-bottom: 0.5em !important; }
			.margbotquart {margin-bottom: 0.25em !important; }
			.myjustify {text-align: justify; }
			.mysixteenpix {font-size: 1.2em; line-height: 1.4em; }
			.myfifteenpix {font-size: 1.1em; line-height: 1.3em; }
			.mySmallerText {font-size: 0.8em; line-height: 1em; }
			.mySlightlySmallerText {font-size: 0.9em; line-height: 1.2em; }
			.myfont, .myfont div, .myfont span {font-family: "Open Sans", "Helvetica Neue", Helvetica Neue, "Helvetica", Helvetica, Verdana, sans serif !important; }
			.myturquoiseDark, .myturquoiseDark a, .myturquoiseDark a:visited, a.myturquoiseDark, a.myturquoiseDark:visited {color: #1a8285; } /* 0070C0 orig: 014539 */
			.myturquoiseDark a:hover, a.myturquoiseDark:hover {color: #215868; }
			.SlideyBlock {display: inline-block; margin: 0.5em 1em 0.5em 0em; min-width: 16em; vertical-align: top; }
			.PeriodSelect, .HourlyChartSelect, .dlInactiveUsers, .dlHistDataBU {cursor: pointer; }
			.myFullWidth{width: 100%; margin: 0 auto; min-height: 500px; height: 60%; }
			.MyDataLoading {
				text-shadow: 0px 0px 1px rgba(255,255,255,1), 0px 0px 7px rgba(90,255,90,0.75), 0px 0px 14px rgba(60,255,60,0.6), 0px 0px 22px rgba(90,255,90,0.5); color: rgba(26,130,133,1); 
				animation: GlowyGlowAnim 2s linear infinite; 
				}
			@keyframes GlowyGlowAnim {
				0% {text-shadow: 0px 0px 1px rgba(255,255,255,1), 0px 0px 7px rgba(90,255,90,0.75), 0px 0px 14px rgba(60,255,60,0.6), 0px 0px 22px rgba(90,255,90,0.5); color: rgba(26,130,133,1); }
				50% {text-shadow: 0px 0px 1px rgba(255,255,255,0.1), 0px 0px 5px rgba(90,255,90,0.1), 0px 0px 9px rgba(60,255,60,0.1), 0px 0px 18px rgba(90,255,90,0.1); color: rgba(26,130,133,0.75); }
				100% {text-shadow: 0px 0px 1px rgba(255,255,255,1), 0px 0px 7px rgba(90,255,90,0.75), 0px 0px 14px rgba(60,255,60,0.6), 0px 0px 22px rgba(90,255,90,0.5); color: rgba(26,130,133,1); }
				}
		</style>
		
		<div style='margin: 1em 1em 0 1em; ' id='' class='myjustify myfont'>

			<div class='margbothalf'>
				<div class='myjustify margbotYii::t('ReporteModule.AllMessages','')half mysixteenpix mybold myunderline'>
					<?php echo Yii::t('ReporteModule.AllMessages','General'); ?>:
				</div>
				<div class='mycentertext margbotfull myita myturquoiseDark GeneralDataReady MyDataLoading'><?php echo Yii::t('ReporteModule.AllMessages','Please wait for data to load..'); ?></div>
				<div class='myjustify '>
					<?php echo Yii::t('ReporteModule.AllMessages','Total Active Users (logged in at least once)'); ?>: <span class='myfifteenpix myturquoiseDark HourlyData TotalLogins'>...</span>
				</div>
				<br>
			</div>

			<hr>
			<div class='SlideyBlock'>
				<div class='myjustify margbothalf mysixteenpix mybold myunderline'>
					<?php echo Yii::t('ReporteModule.AllMessages','Unique Logins'); ?>:
				</div>
				<div class='myjustify margbotquart'>
					<?php echo Yii::t('ReporteModule.AllMessages','Logins in last'); ?> 24h: <span class='myfifteenpix myturquoiseDark GeneralData LoginsOneDay'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					<?php echo Yii::t('ReporteModule.AllMessages','Logins in last'); ?> 7 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData LoginsOneWeek'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					<?php echo Yii::t('ReporteModule.AllMessages','Logins in last'); ?> 30 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData LoginsOneMonth'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					<?php echo Yii::t('ReporteModule.AllMessages','Logins in last'); ?> 3 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData LoginsOneQuarterY'>...</span>
				</div>
				<div class='myjustify margbothalf'>
					<?php echo Yii::t('ReporteModule.AllMessages','Logins in last'); ?> 6 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData LoginsOneHalfY'>...</span>
				</div>
				<br>
			</div>
			
			<div class='SlideyBlock'>
				<div class='myjustify margbothalf mysixteenpix mybold myunderline'>
					Posts:
				</div>
				<div class='myjustify margbotquart'>
					Posts <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 24h: <span class='myfifteenpix myturquoiseDark GeneralData PostsOneDay'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Posts <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 7 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData PostsOneWeek'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Posts <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 30 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData PostsOneMonth'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Posts <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 3 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData PostsOneQuarterY'>...</span>
				</div>
				<div class='myjustify margbothalf'>
					Posts <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 6 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData PostsOneHalfY'>...</span>
				</div>
				<br>
			</div>
			
			<div class='SlideyBlock'>
				<div class='myjustify margbothalf mysixteenpix mybold myunderline'>
					<?php echo Yii::t('ReporteModule.AllMessages','Comments'); ?>:
				</div>
				<div class='myjustify margbotquart'>
					<?php echo Yii::t('ReporteModule.AllMessages','Comments in last'); ?> 24h: <span class='myfifteenpix myturquoiseDark GeneralData CommentsOneDay'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					<?php echo Yii::t('ReporteModule.AllMessages','Comments in last'); ?> 7 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData CommentsOneWeek'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					<?php echo Yii::t('ReporteModule.AllMessages','Comments in last'); ?> 30 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData CommentsOneMonth'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					<?php echo Yii::t('ReporteModule.AllMessages','Comments in last'); ?> 3 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData CommentsOneQuarterY'>...</span>
				</div>
				<div class='myjustify margbothalf'>
					<?php echo Yii::t('ReporteModule.AllMessages','Comments in last'); ?> 6 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData CommentsOneHalfY'>...</span>
				</div>
				<br>
			</div>
			
			<div class='SlideyBlock'>
				<div class='myjustify margbothalf mysixteenpix mybold myunderline'>
					Likes:
				</div>
				<div class='myjustify margbotquart'>
					Likes <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 24h: <span class='myfifteenpix myturquoiseDark GeneralData LikesOneDay'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Likes <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 7 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData LikesOneWeek'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Likes <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 30 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData LikesOneMonth'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Likes <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 3 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData LikesOneQuarterY'>...</span>
				</div>
				<div class='myjustify margbothalf'>
					Likes <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 6 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData LikesOneHalfY'>...</span>
				</div>
				<br>
			</div>
			
			<div class='SlideyBlock'>
				<div class='myjustify margbothalf mysixteenpix mybold myunderline'>
					Follows:
				</div>
				<div class='myjustify margbotquart'>
					Follows <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 24h: <span class='myfifteenpix myturquoiseDark GeneralData FollowsOneDay'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Follows <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 7 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData FollowsOneWeek'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Follows <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 30 <?php echo Yii::t('ReporteModule.AllMessages','days'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData FollowsOneMonth'>...</span>
				</div>
				<div class='myjustify margbotquart'>
					Follows <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 3 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData FollowsOneQuarterY'>...</span>
				</div>
				<div class='myjustify margbothalf'>
					Follows <?php echo Yii::t('ReporteModule.AllMessages','in last'); ?> 6 <?php echo Yii::t('ReporteModule.AllMessages','months'); ?>: <span class='myfifteenpix myturquoiseDark GeneralData FollowsOneHalfY'>...</span>
				</div>
				<br>
			</div>
                
		</div>

		<div class='mySmallerText margbotfull'><?php echo Yii::t('ReporteModule.AllMessages','General Data Process Time'); ?>: <span class='GeneralExec'>...</span></div>
		<div class='mySlightlySmallerText myjustify'>
			<span class='myita'><?php echo Yii::t('ReporteModule.AllMessages','Explanation of Logins data'); ?>:</span><br>
			<?php echo Yii::t('ReporteModule.AllMessages','Please note that HumHub does not record historical data regarding Logins'); ?>..<br>
			<?php echo Yii::t('ReporteModule.AllMessages','This means that we are only ever seeing'); ?> '<span class='myita'><?php echo Yii::t('ReporteModule.AllMessages','Individual People\'s Logins'); ?></span>' (<?php echo Yii::t('ReporteModule.AllMessages','Unique Logins'); ?>);<br>
			<?php echo Yii::t('ReporteModule.AllMessages','so, the numbers above show how many people logged in – or renewed their session – at least once in the given time'); ?>..<br>
			<?php echo Yii::t('ReporteModule.AllMessages','This is why the Historical chart just below is interesting'); ?>,<br>
			<?php echo Yii::t('ReporteModule.AllMessages','because it records the number of Unique Logins every 24 hours, and displays them once per day'); ?>..<br>
			<?php echo Yii::t('ReporteModule.AllMessages','The rest of the data behaves more as you\'d expect'); ?>..
		</div>
		<br>
        		
		<hr>
		
		<br><br>
		
		<?php
			use humhub\modules\social_stats\Assets; 
			$MyAssets=humhub\modules\social_stats\Assets::register($this);
		?>
	
		<?php
			$ThisTimeZone=\Yii::$app->getTimeZone(); 
			/* echo $MyBR.$ThisTimeZone."; date('T'): ".date('T')."; date('P'): ".date('P')."; date('P') short: ".substr(date('P'),0,3)."; just city: ".substr($ThisTimeZone,(strpos($ThisTimeZone,'/')+1));  */
		?>
		<!-- i wish i could say that's the end of it.. -->
	</div>
</div>
