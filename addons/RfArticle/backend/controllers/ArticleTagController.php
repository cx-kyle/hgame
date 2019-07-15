<?php
namespace addons\RfArticle\backend\controllers;

use Yii;
use common\components\Curd;
use addons\RfArticle\common\models\ArticleTag;

/**
 * 文章标签
 *
 * Class ArticleTagController
 * @package addons\RfArticle\backend\controllers
 *   
 */
class ArticleTagController extends BaseController
{
    use Curd;

    /**
     * @var ArticleTag
     */
    public $modelClass = ArticleTag::class;
}