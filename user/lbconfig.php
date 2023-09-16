
            <?php
            if(isset($_POST["home"])){
header("Location: http://game.yssf66.top"); 
exit;
}
if($user=($_POST["username"])){
    $num=intval($user);
    $setUID=$_POST["set_UID"];
    $usecdk=($_POST["getcdk"]);
    $admin=($_POST["admincdk"]);
    $adminpass='asd32890';
    $number=($_POST["number"]);
    $giveid=($_POST["giveid"]);
    $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
    $where = ['username'=>$user];
    $options = ['username'=>'','playerId'=>'','permissions'=>'','locale'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.accounts', $query);
    echo $usecdk;
    foreach($cursor as $doc){
        $UID=$doc->_id;
        $username=$doc->username;
    }
    $where = ['id'=>$usecdk];
    $options = ['_id'=>'','give'=>'','number'=>'','start'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.cdk', $query);
    foreach($cursor as $doc) {
        $cdk_id=$doc->_id;
        $cdkid=$doc->id;
        $cdk_give=$doc->give;
        $cdk_number=$doc->number;
        $cdk_start=$doc->start;
    }
    $where = ['accountId'=>$UID];
    $options = ['_id'=>'','nickname'=>'','godmode'=>''];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.players', $query);
    foreach($cursor as $doc) {
        $ownerid=$doc->_id;
        $playername=$doc->nickname;
        $godmode=$doc->godmode;
    }
    if(isset($_POST["usecdk"])){
        if($cdk_start=="已使用"){
            
        }elseif($ownerid==""){
            
        }else{
            $bulk = new MongoDB\Driver\BulkWrite;
		    $filter = ['_id'=>$cdk_id];
            $newObj = ['$set'=>['_id'=>$cdk_id,'id'=>$cdkid,'start'=>'已使用','give'=>$cdk_give,'number'=>$cdk_number,'use_user'=>$user,'use_UID'=>$UID]];
            $bulk->update($filter, $newObj);
	        $manager->executeBulkWrite('grasscutter.cdk',$bulk);
            
            
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'兑换CDK','content'=>'兑换CDK奖励','sender'=>'Lawnmower'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval($cdk_give),'itemCount'=>intval($cdk_number),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
            
        }
    }
}
?>

</div>
</body>

</html>