<?php

//判断ini文件是否存在如不没有则从数据库提取并且写入ini
$inina="gz01.ini";
$path='acher/guoz';
$file = $path."/".$inina;
if(file_exists($file)) {


} else {
    $inina="gz01.ini";
    $path='acher/guoz';
    $file = $path."/".$inina;
    file_put_contents($file,"[国战信息]");
    $iniFile = new iniFile($file);
    $iniFile->addItem('id',['初始' => 0]);
    $iniFile->addItem('国家名字',['初始' => 0]);
    $iniFile->addItem('国家id',['初始' => 0]);
    $iniFile->addItem('君主名字',['初始' => 0]);
    $iniFile->addItem('君主id',['初始' => 0]);
    $iniFile->addItem('夺仗人',['初始' => 0]);
    $iniFile->addItem('夺仗人id',['初始' => 0]);

    $q2="gz01";
    $str="select * from $q2";
    $result=mysql_query($str) or die('SQL语句有误');
    while(!!$row=mysql_fetch_array($result)){
        $iniFile->addCategory('id', [$row['zcid']=>$row['zlgj']]);
        $iniFile->addCategory('国家名字', [$row['zcid']=>$row['zlgj']]);
        $iniFile->addCategory('国家id', [$row['zcid']=>$row['zlgjid']]);
        $iniFile->addCategory('君主名字', [$row['zcid']=>$row['gjjz']]);
        $iniFile->addCategory('君主id', [$row['zcid']=>$row['gjjzid']]);
        $iniFile->addCategory('夺仗人', [$row['zcid']=>$row['czz']]);
        $iniFile->addCategory('夺仗人id', [$row['zcid']=>$row['czzid']]);
    }
}

$iniFile = new iniFile($file);
