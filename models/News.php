<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $classid
 * @property integer $bclassid
 * @property string $classname
 * @property string $sonclass
 * @property integer $is_zt
 * @property integer $lencord
 * @property integer $link_num
 * @property integer $newstempid
 * @property integer $onclick
 * @property integer $listtempid
 * @property string $featherclass
 * @property integer $islast
 * @property string $classpath
 * @property string $classtype
 * @property string $newspath
 * @property integer $filename
 * @property string $filetype
 * @property integer $openpl
 * @property integer $openadd
 * @property integer $newline
 * @property integer $hotline
 * @property integer $goodline
 * @property string $classurl
 * @property integer $groupid
 * @property integer $myorder
 * @property string $filename_qz
 * @property integer $hotplline
 * @property integer $modid
 * @property integer $checked
 * @property integer $firstline
 * @property string $bname
 * @property integer $islist
 * @property integer $searchtempid
 * @property integer $tid
 * @property string $tbname
 * @property integer $maxnum
 * @property integer $checkpl
 * @property integer $down_num
 * @property integer $online_num
 * @property string $listorder
 * @property string $reorder
 * @property string $intro
 * @property string $classimg
 * @property integer $jstempid
 * @property integer $addinfofen
 * @property integer $listdt
 * @property integer $showclass
 * @property integer $showdt
 * @property integer $checkqadd
 * @property integer $qaddlist
 * @property string $qaddgroupid
 * @property integer $qaddshowkey
 * @property integer $adminqinfo
 * @property integer $doctime
 * @property string $classpagekey
 * @property integer $dtlisttempid
 * @property integer $classtempid
 * @property integer $nreclass
 * @property integer $nreinfo
 * @property integer $nrejs
 * @property integer $nottobq
 * @property string $ipath
 * @property integer $addreinfo
 * @property integer $haddlist
 * @property integer $sametitle
 * @property integer $definfovoteid
 * @property string $wburl
 * @property integer $qeditchecked
 * @property integer $wapstyleid
 * @property integer $repreinfo
 * @property integer $pltempid
 * @property string $cgroupid
 * @property integer $yhid
 * @property integer $wfid
 * @property integer $cgtoinfo
 * @property string $bdinfoid
 * @property integer $repagenum
 * @property integer $keycid
 * @property string $allinfos
 * @property string $infos
 * @property string $addtime
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bclassid', 'is_zt', 'lencord', 'link_num', 'newstempid', 'onclick', 'listtempid', 'islast', 'filename', 'openpl', 'openadd', 'newline', 'hotline', 'goodline', 'groupid', 'myorder', 'hotplline', 'modid', 'checked', 'firstline', 'islist', 'searchtempid', 'tid', 'maxnum', 'checkpl', 'down_num', 'online_num', 'jstempid', 'addinfofen', 'listdt', 'showclass', 'showdt', 'checkqadd', 'qaddlist', 'qaddshowkey', 'adminqinfo', 'doctime', 'dtlisttempid', 'classtempid', 'nreclass', 'nreinfo', 'nrejs', 'nottobq', 'addreinfo', 'haddlist', 'sametitle', 'definfovoteid', 'qeditchecked', 'wapstyleid', 'repreinfo', 'pltempid', 'yhid', 'wfid', 'cgtoinfo', 'repagenum', 'keycid', 'allinfos', 'infos', 'addtime'], 'integer'],
            [['sonclass', 'featherclass', 'classpath', 'intro', 'qaddgroupid', 'cgroupid'], 'required'],
            [['sonclass', 'featherclass', 'classpath', 'intro', 'qaddgroupid', 'cgroupid'], 'string'],
            [['classname', 'bname', 'listorder', 'reorder'], 'string', 'max' => 50],
            [['classtype', 'filetype'], 'string', 'max' => 10],
            [['newspath', 'filename_qz'], 'string', 'max' => 20],
            [['classurl'], 'string', 'max' => 200],
            [['tbname'], 'string', 'max' => 60],
            [['classimg', 'classpagekey', 'ipath', 'wburl'], 'string', 'max' => 255],
            [['bdinfoid'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classid' => 'Classid',
            'bclassid' => 'Bclassid',
            'classname' => 'Classname',
            'sonclass' => 'Sonclass',
            'is_zt' => 'Is Zt',
            'lencord' => 'Lencord',
            'link_num' => 'Link Num',
            'newstempid' => 'Newstempid',
            'onclick' => 'Onclick',
            'listtempid' => 'Listtempid',
            'featherclass' => 'Featherclass',
            'islast' => 'Islast',
            'classpath' => 'Classpath',
            'classtype' => 'Classtype',
            'newspath' => 'Newspath',
            'filename' => 'Filename',
            'filetype' => 'Filetype',
            'openpl' => 'Openpl',
            'openadd' => 'Openadd',
            'newline' => 'Newline',
            'hotline' => 'Hotline',
            'goodline' => 'Goodline',
            'classurl' => 'Classurl',
            'groupid' => 'Groupid',
            'myorder' => 'Myorder',
            'filename_qz' => 'Filename Qz',
            'hotplline' => 'Hotplline',
            'modid' => 'Modid',
            'checked' => 'Checked',
            'firstline' => 'Firstline',
            'bname' => 'Bname',
            'islist' => 'Islist',
            'searchtempid' => 'Searchtempid',
            'tid' => 'Tid',
            'tbname' => 'Tbname',
            'maxnum' => 'Maxnum',
            'checkpl' => 'Checkpl',
            'down_num' => 'Down Num',
            'online_num' => 'Online Num',
            'listorder' => 'Listorder',
            'reorder' => 'Reorder',
            'intro' => 'Intro',
            'classimg' => 'Classimg',
            'jstempid' => 'Jstempid',
            'addinfofen' => 'Addinfofen',
            'listdt' => 'Listdt',
            'showclass' => 'Showclass',
            'showdt' => 'Showdt',
            'checkqadd' => 'Checkqadd',
            'qaddlist' => 'Qaddlist',
            'qaddgroupid' => 'Qaddgroupid',
            'qaddshowkey' => 'Qaddshowkey',
            'adminqinfo' => 'Adminqinfo',
            'doctime' => 'Doctime',
            'classpagekey' => 'Classpagekey',
            'dtlisttempid' => 'Dtlisttempid',
            'classtempid' => 'Classtempid',
            'nreclass' => 'Nreclass',
            'nreinfo' => 'Nreinfo',
            'nrejs' => 'Nrejs',
            'nottobq' => 'Nottobq',
            'ipath' => 'Ipath',
            'addreinfo' => 'Addreinfo',
            'haddlist' => 'Haddlist',
            'sametitle' => 'Sametitle',
            'definfovoteid' => 'Definfovoteid',
            'wburl' => 'Wburl',
            'qeditchecked' => 'Qeditchecked',
            'wapstyleid' => 'Wapstyleid',
            'repreinfo' => 'Repreinfo',
            'pltempid' => 'Pltempid',
            'cgroupid' => 'Cgroupid',
            'yhid' => 'Yhid',
            'wfid' => 'Wfid',
            'cgtoinfo' => 'Cgtoinfo',
            'bdinfoid' => 'Bdinfoid',
            'repagenum' => 'Repagenum',
            'keycid' => 'Keycid',
            'allinfos' => 'Allinfos',
            'infos' => 'Infos',
            'addtime' => 'Addtime',
        ];
    }
}
