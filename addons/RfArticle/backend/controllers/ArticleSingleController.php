<?php
namespace addons\RfArticle\backend\controllers;

use Yii;
use common\components\Curd;
use addons\RfArticle\common\models\ArticleSingle;

/**
 * 单页管理
 *
 * Class ArticleSingleController
 * @package addons\RfArticle\backend\controllers
 *   
 */
class ArticleSingleController extends BaseController
{
    use Curd;

    /**
     * @var ArticleSingle
     */
    public $modelClass = ArticleSingle::class;
}