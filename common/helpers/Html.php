<?php

namespace common\helpers;

use Yii;
use yii\helpers\BaseHtml;
use common\enums\StatusEnum;
use common\enums\WhetherEnum;
use common\enums\EtypeEnum;
use common\enums\NoticeEnum;
use common\enums\ServerInfoEnum;
/**
 * Class Html
 * @package common\helpers
 *   
 */
class Html extends BaseHtml
{
    /**
     * 创建
     *
     * @param $url
     * @param array $options
     * @return string
     */
    public static function create(array $url, $content = '创建', $options = [])
    {
        $options = ArrayHelper::merge([
            'class' => "btn btn-primary btn-xs"
        ], $options);

        $content = '<i class="icon ion-plus"></i> ' . $content;
        return self::a($content, $url, $options);
    }

    /**
     * 编辑
     *
     * @param $url
     * @param array $options
     * @return string
     */
    public static function edit(array $url, $content = '编辑', $options = [])
    {
        $options = ArrayHelper::merge([
            'class' => 'btn btn-primary btn-sm',
        ], $options);

        return self::a($content, $url, $options);
    }

    /**
     * 删除
     *
     * @param $url
     * @param array $options
     * @return string
     */
    public static function delete(array $url, $content = '删除', $options = [])
    {
        $options = ArrayHelper::merge([
            'class' => 'btn btn-danger btn-sm',
            'onclick' => "rfDelete(this);return false;"
        ], $options);

        return self::a($content, $url, $options);
    }

    /**
     * 普通按钮
     *
     * @param $url
     * @param array $options
     * @return string
     */
    public static function linkButton(array $url, $content, $options = [])
    {
        $options = ArrayHelper::merge([
            'class' => "btn btn-white btn-sm"
        ], $options);

        return self::a($content, $url, $options);
    }

    /**
     * 状态标签
     *
     * @param int $status
     * @return mixed
     */
    public static function status($status = 1)
    {
        $listBut = [
            StatusEnum::DISABLED => self::tag('span', '禁用', [
                'class' => "btn btn-success btn-sm", 
            ]),
            StatusEnum::ENABLED => self::tag('span', '启用', [
                'class' => "btn btn-default btn-sm",
            ]),
        ];

        return $listBut[$status] ?? '';
    }

    public static function wxstatus($status = 1)
    {
        $listBut = [
            StatusEnum::DISABLED => self::tag('span', '未发送', [
                'class' => "btn btn-success btn-sm", 
            ]),
            StatusEnum::ENABLED => self::tag('span', '发送中', [
                'class' => "btn btn-default btn-sm",
            ]),
            StatusEnum::DELETE => self::tag('span', '已删除', [
                'class' => "btn btn-default btn-sm",
            ]),
            StatusEnum::FINISHED => self::tag('span', '已发送', [
                'class' => "btn btn-success btn-sm",
            ]),
        ];

        return $listBut[$status] ?? '';
    }

    

    /**
     * 邮件状态标签
     *
     * @param int $status
     * @return mixed
     */
    public static function etype($status=0)
    {
        $listBut = [
            ServerInfoEnum::ZERO => self::tag('span', '全部', [
                'class' => "btn btn-default btn-sm",
            ]),
            ServerInfoEnum::LOSE => self::tag('span', '后台人工', [
                'class' => "btn btn-default btn-sm",
            ]),
        ];

        return $listBut[$status] ?? '';
    }

    /**
     * notice 状态标签
     */

    public static function noticetype($status=0)
    {
        $listBut = [
            ServerInfoEnum::ZERO => self::tag('span', '未发送', [
                'class' => "btn btn-default btn-sm",
            ]),
            ServerInfoEnum::ONE => self::tag('span', '发送成功', [
                'class' => "btn btn-success btn-sm",
            ]),
            ServerInfoEnum::TWO => self::tag('span', '发送失败', [
                'class' => "btn btn-danger btn-sm",
            ]),
        ];
        return $listBut[$status] ?? '';
    } 

    /**
     * 订单状态
     */

    public static function OrderStatus($status=0)
    {
        $listBut = [
            ServerInfoEnum::ZERO => self::tag('span', '未支付', [
                'class' => "btn btn-default btn-sm",
            ]),
            ServerInfoEnum::ONE => self::tag('span', '充值金额', [
                'class' => "btn btn-success btn-sm",
            ]),
            ServerInfoEnum::TWO => self::tag('span', '支付成功道具未到账', [
                'class' => "btn btn-danger btn-sm",
            ]),
            ServerInfoEnum::THREE => self::tag('span', '订单完成', [
                'class' => "btn btn-success btn-sm",
            ]),
        ];
        return $listBut[$status] ?? '';
    } 

    /** 是否游客 */

    public static function IsGuest($status=0)
    {
        $listBut = [
            ServerInfoEnum::ZERO => self::tag('span', '非游客', [
                'class' => "btn btn-success btn-sm",
            ]),
            ServerInfoEnum::ONE => self::tag('span', '游客', [
                'class' => "btn btn- default btn-sm",
            ]),
           
        ];
        return $listBut[$status] ?? '';
    }

    /**
     * 账号管理
     */
    public static function userInfoStatus($status=0)
    {
        $listBut = [
            ServerInfoEnum::ZERO => self::tag('span', '正常', [
                'class' => "btn btn-success btn-sm",
            ]),
            ServerInfoEnum::ONE => self::tag('span', '普通封号', [
                'class' => "btn btn-default btn-sm",
            ]),
            ServerInfoEnum::TWO => self::tag('span', '设备封号', [
                'class' => "btn btn-default btn-sm",
            ]),
        ];
        return $listBut[$status] ?? '';

    }

    public static function ServerInfostatus($status=0)
    {
        $listBut = [
            
            ServerInfoEnum::ONE => self::tag('span', '良好', [
                'class' => "btn btn-success btn-sm",
            ]),
            ServerInfoEnum::TWO => self::tag('span', '正常', [
                'class' => "btn btn-danger btn-sm",
            ]),
            ServerInfoEnum::THREE => self::tag('span', '爆满', [
                'class' => "btn btn-default btn-sm",
            ]),
            ServerInfoEnum::FOUR => self::tag('span', '备服', [
                'class' => "btn btn-danger btn-sm",
            ]),
        ];
        return $listBut[$status] ?? '';
    }

    public static function IsNew($status = 0)
    {
        $listBut = [
            ServerInfoEnum::ZERO => self::tag('span', '老区', [
                'class' => "btn btn-default btn-sm",
            ]),
            ServerInfoEnum::ONE => self::tag('span', '新区', [
                'class' => "btn btn-success btn-sm",
            ]),
           
        ];
        return $listBut[$status] ?? '';

    }

    public static function IsClose($status = 0)
    {
        $listBut = [
            ServerInfoEnum::ZERO => self::tag('span', '正常', [
                'class' => "btn btn-success btn-sm",
            ]),
            ServerInfoEnum::ONE => self::tag('span', '维护', [
                'class' => "btn btn-default btn-sm",
            ]),
           
        ];
        return $listBut[$status] ?? '';

    }

    public static function UserMailStatus($status=0)
    {
        $listBut = [
            ServerInfoEnum::ZERO => self::tag('span', '未读', [
                'class' => "btn btn-danger btn-sm",
            ]),
            ServerInfoEnum::ONE => self::tag('span', '已读', [
                'class' => "btn btn-default btn-sm",
            ]),
           
        ];
        return $listBut[$status] ?? '';   
    }

    

    /**
     * @param string $text
     * @param null $url
     * @param array $options
     * @return string
     */
    public static function a($text, $url = null, $options = [])
    {
        if ($url !== null) {
            // 权限校验
            if (!self::beforVerify($url)) {
                return '';
            }

            $options['href'] = Url::to($url);
        }

        return static::tag('a', $text, $options);
    }

    /**
     * 排序
     *
     * @param $value
     * @return string
     */
    public static function sort($value, $options = [])
    {
        // 权限校验
        if (!self::beforVerify('ajax-update')) {
            return $value;
        }

        $options = ArrayHelper::merge([
            'class' => 'form-control',
            'onblur' => 'rfSort(this)',
        ], $options);

        return self::input('text', 'sort', $value, $options);
    }

    /**
     * 是否标签
     *
     * @param int $status
     * @return mixed
     */
    public static function whether($status = 1)
    {
        $listBut = [
            WhetherEnum::ENABLED => self::tag('span', '是', [
                'class' => "label label-primary label-sm",
            ]),
            StatusEnum::DISABLED => self::tag('span', '否', [
                'class' => "label label-default label-sm",
            ]),
        ];

        return $listBut[$status] ?? '';
    }

    /**
     * 根据开始时间和结束时间发回当前状态
     *
     * @param int $start_time 开始时间
     * @param int $end_time 结束时间
     * @return mixed
     */
    public static function timeStatus($start_time, $end_time)
    {
        $time = time();
        if ($start_time > $end_time) {
            return "<span class='label label-danger'>有效期错误</span>";
        } elseif ($start_time > $time) {
            return "<span class='label label-default'>未开始</span>";
        } elseif ($start_time < $time && $end_time > $time) {
            return "<span class='label label-primary'>进行中</span>";
        } elseif ($end_time < $time) {
            return "<span class='label label-default'>已结束</span>";
        }

        return false;
    }

    /**
     * 由于ajax加载model有些控件会重新载入样式导致基础样式失调做的修复
     *
     * @return string|void
     */
    public static function modelBaseCss()
    {
        echo Html::cssFile(Yii::getAlias('@web') . '/resources/dist/css/AdminLTE.min.css?v=' . time());
        echo Html::cssFile(Yii::getAlias('@web') . '/resources/dist/css/rageframe.css?v=' . time());

        Yii::$app->controller->view->registerCss(<<<Css
.modal {
    z-index: 999;
}

.modal-backdrop {
    z-index: 998;
}

Css
        );
    }

    /**
     * @param $route
     * @return bool
     */
    protected static function beforVerify($route)
    {
        is_array($route) && $route = $route[0];

        $prefix = '';
        substr("$route", 0, 1) != '/' && $prefix = '/';
        $route = $prefix . Url::getAuthUrl($route);

        // 判断是否在模块内容
        if (true === Yii::$app->params['inAddon']) {
            $route = StringHelper::replace('/addons/', '', $route);
        }

        return Auth::verify($route);
    }
}