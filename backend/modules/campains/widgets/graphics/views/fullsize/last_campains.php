<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\discussioni
 * @category   CategoryName
 */

/**
 * @var View $this
 * @var ActiveDataProvider $listaTopic
 * @var WidgetGraphicsUltimeDiscussioni $widget
 * @var string $toRefreshSectionId
 */

use open20\amos\core\forms\ItemAndCardHeaderWidget;
use open20\amos\core\forms\WidgetGraphicsActions;
use open20\amos\core\icons\AmosIcons;
use open20\amos\discussioni\AmosDiscussioni;
use open20\amos\discussioni\assets\ModuleDiscussioniInterfacciaAsset;
use open20\amos\discussioni\models\DiscussioniTopic;
use open20\amos\discussioni\widgets\graphics\WidgetGraphicsUltimeDiscussioni;
use open20\amos\layout\assets\BootstrapItaliaCustomSpriteAsset;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

$moduleDiscussioni = \Yii::$app->getModule(AmosDiscussioni::getModuleName());
$spriteAsset = BootstrapItaliaCustomSpriteAsset::register($this);
?>

<div class="box-widget-header">

	<div class="box-widget-wrapper">
		<h2 class="box-widget-title">
            <?= AmosIcons::show('account-box-mail', ['class' => 'am-2'], AmosIcons::AM) ?>
            <?= \Yii::t('Module', 'ULTIME CAMPAGNE') ?>
		</h2>
	</div>
	<div class="read-all">
        <?php
        $textReadAll = \backend\modules\campains\Module::t('campains', 'Visualizza tutto') . AmosIcons::show('chevron-right');
        $linkReadAll = ['/campains/preference-campain'];
        echo Html::a($textReadAll, $linkReadAll, ['class' => '']);
        ?>
	</div>

</div>

<div class="box-widget">
	<section>
        <?php Pjax::begin(['id' => $toRefreshSectionId]); ?>
        <?php if (count($listCampains->getModels()) == 0): ?>
			<div class="list-items list-empty">
				<h3><?= \Yii::t('Module', 'Nessuna attività'); ?></h3></div>
        <?php else: ?>
			<div class="list-items">
                <?php
                foreach ($listCampains->query->all() as $campain):
                    $type = $campain->id;
                    $viewUrl = '/campains/preference-campain/update-recipients?id=' . $campain->id;

                    ?>
					<div class="widget-listbox-option" role="option">
						<article class="wrap-item-box">
                            <div class="row-100">
							<div class="col-md-12">
                            
								<div class="notification with-icon success" role="alert"
                                     aria-labelledby="not2a-title" id="not2a">
                                     <div class="d-flex">

                                     
									<h5 id="not2a-title" class="m-r-10">
                                        
                                        <?= AmosIcons::show('email', ['class' => 'am-2'], AmosIcons::AM) ?>
										
                                        <?= $campain->titolo?></h5>
                                        <small><a href="<?=$viewUrl?>" title="Modifica"><?= AmosIcons::show('open-in-new', ['class' => 'am-2 text-muted'], AmosIcons::AM) ?></a></small>
                                    </div>
                                        <div class="row">
                                    <?php
                                    $campainnChannel = $campain->preferenceCampainChannelMms;
                                    foreach ($campainnChannel as $channel) {
                                        ?>
										<div class="col-md-6">
                                            <p>
                                            <?php
                                            if (!empty($channel)) {
                                                echo($channel->preferenceChannel->title . ': ');
                                                echo($channel->getWorkflowStatus()->getLabel() . '  ');
                                                echo('<br>');
                                                if ($channel->status == \backend\modules\campains\models\PreferenceCampainChannelMm::STATUS_SENT) {
                                                    echo('DESTINATARI: ');
                                                    echo($channel->mailup_n_sent);
                                                } else {
                                                    echo('DESTINATARI: ');
                                                    echo(\backend\modules\campains\utility\CampainsQueryUtility::getQueryRecipientsByChannelModel($channel)->count());
                                                }
                                                // pr($channel->classname());  		
                                            }
                                            ?>
                                            </p>
										</div>

                                        <?php
                                    }
                                    ?>
                    
								</div>
							</div>
                            </div>

						</article>
					</div>
                <?php
                endforeach;
                ?>
			</div>
        <?php endif; ?>
        <?php Pjax::end(); ?>
	</section>
</div>