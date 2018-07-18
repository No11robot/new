<?php
/*
 * 首页显示3条最新新闻
 */
function getNews(){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try{
        $pdo=new PDO($dsn,'root','');
        $sql="select nId,nDate,author,title,sketch,hotWords,picture from news order by nId DESC limit 3";
        if($result=$pdo->query($sql)){
            while ($row=$result->fetch(PDO::FETCH_ASSOC)){
                $data[]=$row;
            }
        $fh= array(0=>$data);
        return $fh;
        }
    }catch(Exception $e){
        $fh=array(1=>$e->getMessage());
        return $fh;
    }
}
/*
 * 根据nId从获取详细新闻
 */
function getNewsByNid($nId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select nId,nDate,author,title,sketch,content,sId,picture from news where nId=:nId";
        $result=$pdo->prepare($sql);
        $result->execute([":nId"=>$nId]);
        if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"无该新闻！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据uid查询该用户评论总记录数
 */
function getCommentsRowCountByUid($uId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select count(*) from comments where uId=:uId";
        $result=$pdo->prepare($sql);
        $result->execute([":uId"=>$uId]);
        if($result->rowCount()){
            return($result->fetchColumn());
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据uId、$pageNow和$pageSize获取具体板块当前页评论
 */
function getUserCommentsByUid($uId,$pageNow,$pageSize){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $min=($pageSize*($pageNow-1));
        $num=$pageSize;
        $sql="select * from comments where uId=:uId order by cId DESC limit $min,$num";
        $result=$pdo->prepare($sql);
        $result->execute([":uId"=>$uId]);
        if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"为人低调，专业吃瓜群众。"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据nid查询该comments总记录数
 */
function getCommentsRowCountByNid($nId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select count(*) from comments_users where nId=:nId";
        $result=$pdo->prepare($sql);
        $result->execute([":nId"=>$nId]);
        if($result->rowCount()){
            return($result->fetchColumn());
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据nId、$pageNow和$pageSize获取具体板块当前页评论
 */
function getNewsCommentsByNid($nId,$pageNow,$pageSize){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $min=($pageSize*($pageNow-1));
        $num=$pageSize;
        $sql="select * from comments_users where nId=:nId order by cId DESC limit $min,$num";
        $result=$pdo->prepare($sql);
        $result->execute([":nId"=>$nId]);
        if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"该新闻暂无评论，快抢沙发！！！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据keyWord查询匹配新闻总记录数
 */
function getSearchRowCountByKeyWord($keyWord){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select count(*) from news where title like'%$keyWord%'";
        $result=$pdo->query($sql);
        if($result->rowCount()){
            return $result->fetch(3);
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据keyWord、$pageNow和$pageSize获取具体板块当前页新闻
 */
function getSearchNews($keyWord,$pageNow,$pageSize){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $min=($pageSize*($pageNow-1));
        $num=$pageSize;
        $sql="select * from news where title like'%$keyWord%' order by nId DESC limit $min,$num";
        $result=$pdo->query($sql);
        if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"无更多新闻！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据sid查询该section新闻总记录数
 */
function getSectionRowCountBySid($sId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select count(*) from news where sId=:sId";
        $result=$pdo->prepare($sql);
        $result->execute([":sId"=>$sId]);
        if($result->rowCount()){
            return($result->fetchColumn());
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据sId、$pageNow和$pageSize获取具体板块当前页新闻
 */
function getSectionBySid($sId,$pageNow,$pageSize){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $min=($pageSize*($pageNow-1));
        $num=$pageSize;
        $sql="select * from news where sId=:sId order by nId DESC limit $min,$num";
        $result=$pdo->prepare($sql);
        $result->execute([":sId"=>$sId]);
        if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"无更多新闻！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 查询用户总记录数
 */
function getUsersRowCount(){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select count(*) from users";
        $result=$pdo->query($sql);
        if($result->rowCount()){
            return($result->fetch(3));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 查询当前页用户
 */
function getUsers($pageNow,$pageSize){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $min=($pageSize*($pageNow-1));
        $num=$pageSize;
        $sql="select * from users order by uId DESC limit $min,$num";
        $result=$pdo->query($sql);
        if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"无更多新闻！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 用户登陆验证
 */
function checkUser($uName,$pwd){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select * from users where uName=:uName and pwd=:pwd";
        $result=$pdo->prepare($sql);
        $result->execute(array(":uName"=>$uName,":pwd"=>$pwd));
        if($result->rowCount()){
            while ($row=$result->fetch()){
                $data['uName']=$row['uName'];
                $data['uId']=$row['uId'];
                $data['pwd']=$row['pwd'];
                $data['grade']=$row['grade'];
            }
            return(array(0=>$data));
        }
        else {
            return(array(1=>"无该用户或密码错误！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 检查用户名是否唯一
 */
function checkUserName($uName){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select uName from users where uName='$uName'";
        $num=$pdo->query($sql);
        if($num->rowCount()){
            return 0;//用户名已存在
        }
        else {
            return 1;//无相同用户名，可更改
        }
    }catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 修改用户信息
 */
function changeInfo($uId,$str){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="UPDATE users SET $str where uId=$uId";
        $num=$pdo->exec($sql);
        if($num != 0){
            return 0;//修改成功
        }else {
            return 1;//修改失败
        }
    }catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据用户uid查询详细信息
 */
function getDetails($uId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select * from users where uId=:uId";
        $result=$pdo->prepare($sql);
        $result->execute([":uId"=>$uId]);
         if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"暂无详细信息！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据用户uid查询
 */
function getAllComments($uId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select * from users where uId=:uId";
        $result=$pdo->prepare($sql);
        $result->execute([":uId"=>$uId]);
         if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"暂无详细信息！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据uid查询该用户喜爱模块
 */
function getLoveSectionByUid($uId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select loves from users where uId=:uId";
        $result=$pdo->prepare($sql);
        $result->execute([":uId"=>$uId]);
         if($result->rowCount()){
            $data=[];
            while ($row=$result->fetch(2)){
                $data[]=$row;
            }
            return($data);
        }
        else {
            return(array(1=>"暂无喜爱模块！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 添加评论
 */
function addComments($str){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="INSERT INTO comments VALUES ($str)";
        $result=$pdo->exec($sql);
         if($result!=0){
            return 1;
        }
        else {
            return 0;
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 添加爆料
 */
function addDisclose($str){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="INSERT INTO disclose VALUES ($str)";
        $result=$pdo->exec($sql);
         if($result!=0){
            return 1;//爆料成功！
        }
        else {
            return 0;//不好，爆料失败了!
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 删除用户
 */
function delUsersByUid($uId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="delete from users where uId=:uId";
        $result=$pdo->prepare($sql);
        $result->execute([":uId"=>$uId]);
        if($result->rowCount()){
            return(array(0=>'ok'));
        }
        else {
            return(array(1=>"操作有误 ！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 删除新闻
 */
function delNewsByNid($nId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="delete from news where nId=:nId";
        $result=$pdo->prepare($sql);
        $result->execute([":nId"=>$nId]);
        if($result->rowCount()){
            return(array(0=>'ok'));
        }
        else {
            return(array(1=>"操作有误 ！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 修改新闻
 */
function changeNews($nId,$str){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="UPDATE news SET $str where nId=$nId";
        $num=$pdo->exec($sql);
        if($num!=0){
            return 0;//修改成功
        }
        else {
            return 1;//修改失败
        }
    }catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 获得下一新闻nId
 */
function getNewsNextNid(){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="SELECT auto_increment FROM information_schema.`TABLES` WHERE TABLE_SCHEMA='news' AND TABLE_NAME='news'";
        $result=$pdo->query($sql);
        if($result->rowCount()){
            return $result->fetch(3);
        }
    }catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 获取板块名
 */
function getsName($sId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select sName from section where sId=:sId";
        $result=$pdo->prepare($sql);
        $result->execute([":sId"=>$sId]);
        if($result->rowCount()){
            return $result->fetch(2);
        }
    }catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 添加新闻
 */
function addNews($str){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        //INSERT INTO `news`(`nId`, `nDate`, `author`, `title`, `sketch`, `content`, `sId`, `picture`, `hotWords`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
        $sql="INSERT INTO news (nId, nDate, author, title, sketch, content, sId, picture, hotWords) VALUES ($str)";
        $num=$pdo->exec($sql);
        if($num!=0){
            return 0;//修改成功
        }
        else {
            return 1;//修改失败
        }
    }catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 查询该爆料总记录数
 */
function getDiscloseRowCount(){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="select count(*) from disclose";
        $result=$pdo->query($sql);
        if($result->rowCount()){
            $num=$result->fetch(3);
            return($num[0]);
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 根据sId、$pageNow和$pageSize获取具体板块当前页新闻
 */
function getDisclose($pageNow,$pageSize){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $min=($pageSize*($pageNow-1));
        $num=$pageSize;
        $sql="select * from disclose order by dId DESC limit $min,$num";
        $result=$pdo->query($sql);
        if($result=$pdo->query($sql)){
             while ($row=$result->fetch(PDO::FETCH_ASSOC)){
             $data[]=$row;
             }
             return $data;
        }
        else {
            return(array(1=>"无更多爆料！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 删除新闻
 */
function delDiscloseByDid($dId){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="delete from disclose where dId=:dId";
        $result=$pdo->prepare($sql);
        $result->execute([":dId"=>$dId]);
        if($result->rowCount()){
            return(array(0=>'ok'));
        }
        else {
            return(array(1=>"操作有误 ！"));
        }
    } catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}
/*
 * 用户注册
 */
function addUsers($str){
    $dsn="mysql:host=localhost;dbname=news;charset=utf8";
    try {
        $pdo=new PDO($dsn,'root','');
        $sql="INSERT INTO users (uName, email, pwd) VALUES ($str)";
        $num=$pdo->exec($sql);
        if($num!=0){
            return 0;//修改成功
        }
        else {
            return 1;//修改失败
        }
    }catch (Exception $e) {
        return(array(1=>$e->getMessage()));
    }
}