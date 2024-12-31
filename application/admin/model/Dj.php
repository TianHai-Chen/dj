<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Dj extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'dj';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'integer';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [

    ];

    public $typeArr = [
        1 => ''
    ];
    

    protected static function init()
    {
        self::afterInsert(function ($row) {
            if (!$row['sort']) {
                $pk = $row->getPk();
                $row->getQuery()->where($pk, $row[$pk])->update(['sort' => $row[$pk]]);
            }
        });
    }

    







}
