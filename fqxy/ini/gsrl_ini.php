<?php

$inina="gsrl.ini";
$path='ache/'.$wjid;
$file = $path."/".$inina;
if(file_exists($file)){

}else{
    //书卷材料商城丹药任务农场宝箱重量
    $q2="gswp";
    $str="select wpid,wpsl from $q2 where wjid=$wjid";
    $result=mysql_query($str) or die('SQL语句有误');
    $hm=0;
    while(!!$row=mysql_fetch_array($result)){
        if ($row['wpsl']>0){
            $wpidd[]=$row['wpid'];
            $wpsll[]=$row['wpsl'];
            $hm=$hm+1;
        }
    }
    if ($hm>0){
        $i=-1;
        $bwp=0;
        for($b=0;$b<$hm;$b++){
            $i=$i+1;
            $npcc=$wpidd[$i];
            include("./wp/wpxx.php");
            $bwp=$wpsll[$i]*$wpzl+$bwp;
        }
    } else{
        $bwp=0;
    }

    /*
     //宝石重量

    $q2="gsqt";
   $str="select wpid,wpsl from $q2 where wjid=$wjid";
   $result=mysql_query($str) or die('SQL语句有误');

   $hm=0;
   while(!!$row=mysql_fetch_array($result)){

   if ($row['wpsl']>0){
   $wpidd1[]=$row['wpid'];
   $wpsll1[]=$row['wpsl'];
   $hm=$hm+1;
   }

   }


   if ($hm>0){
   $i=-1;

   $bwp1=0;
   for($b=0;$b<$hm;$b++){
   $i=$i+1;

   $bsid=$wpidd[$i];
   //调用物品信息
   include("./wp/zbbs.php");

   $bwp1=$wpsll1[$i]*$bszl+$bwp1;


   }

   } else{

   $bwp1=0;
   }


      //宝石重量


     //装备重量
   $q2="gszb";
   $str="select zbid from $q2 where wjid=$wjid";
   $result=mysql_query($str) or die('SQL语句有误');

   $hm=0;
   while(!!$row=mysql_fetch_array($result)){


   $wpidd[]=$row['zbid'];
   $hm=$hm+1;


   }


   if ($hm>0){
   $i=-1;

   $bwp2=0;
   for($b=0;$b<$hm;$b++){
   $i=$i+1;

   $npcc=$wpidd[$i];
   //调用物品信息
   include("./wp/zbxx.php");

   $bwp2=$wp25+$bwp2;


   }

   } else{

   $bwp2=0;
   }
     */
    // $bwp3=$bwp+$bwp1+$bwp2;

    $bwp3=$bwp;
    //装备重量
    $inina="gsrl.ini";
    $path='ache/'.$wjid;
    $file = $path."/".$inina;
    file_put_contents($file,"[玩家]");
    $iniFile = new iniFile($file);
    $iniFile->addItem('挂售容量',['初始' => 123]);
    $iniFile->addItem('挂售已用容量',['容量' => $bwp3]);
}


$iniFile = new iniFile($file);
