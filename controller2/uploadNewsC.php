<?php
include "../config2.php";
include_once "../functions.php";
if(!isset($_SESSION)){
    session_start();
}
/* 
     *用$_FILES接收通过表单上传的文件数据  
     *$_FILES['file1']中的file1对应表单中上传文件的input标签中的name值 
     *$_FILES['file1']返回的是一个数组： 
     $_FILES['file1']['name'] 显示上传文件的原名称。 
     $_FILES['file1']['type'] 文件的 MIME 类型，例如"image/gif"、"image/png"。 
     $_FILES['file1']['size'] 已上传文件的大小，单位为字节。 
     $_FILES['file1']['tmp_name'] 储存的临时文件名和临时储存的路径。 
     $_FILES['file1']['error'] 和该文件上传相关的错误代码。 
     =0; 没有错误发生，文件上传成功。  
     =1; 上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。  
     =2; 上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。  
     =3; 文件只有部分被上传。  
     =4; 没有文件被上传。  
     =5; 上传文件大小为0.  
     */ 
    $sId = $_POST['sId'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $hotWord =$_POST['hotWord'];
    $sketch= $_POST['sketch'];
    $photo=$_FILES['photo'];
    $file=$_FILES['content'];
    if($sId!=null and $title!=null and $author!=null and $sketch!=null){
        //获取板块名
        $result=getsName($sId);
        $sName=$result['sName'];
       //取新闻nId,SELECT auto_increment FROM information_schema.`TABLES` WHERE TABLE_SCHEMA='news' AND TABLE_NAME='news';
        $num=getNewsNextNid();
        $nId=$num[0];//下一个新闻nId
        //给文件重命名sName+nId  
        $filename=$sName.$nId;
        //创建该新闻文件夹
        //新闻存放路径
        $path='../allnews/'.$sName.'/'.$filename.'/';
        mkdir($path,0777,true);
        //获取文件的后缀,pathinfo()会以数组的形式返回一个文件的路径信息，其中extension元素则是文件的后缀名  
        $ext=pathinfo($_FILES['content']['name'])['extension'];  
        //最终内容文件名为  
        $contentname=$filename.'.'.$ext;  
        $contentname=$path.$contentname;
        //设置文件上传到服务器后存放的位置,move_uploaded_file()会将文件移动到新位置，第一个参数是要移动的文件，第二个参数是移动到哪里。  
        if (move_uploaded_file($file['tmp_name'], $contentname)) {  
            echo "内容success";  
        } else{  
            echo "内容error";  
        }  
        if($_FILES['photo']['error']==4){
                $photoname='aixinwen.jpg';
        }else{
            //获取文件的后缀,pathinfo()会以数组的形式返回一个文件的路径信息，其中extension元素则是文件的后缀名  
            $ext2=pathinfo($_FILES['photo']['name'])['extension'];
            $photoname=$filename.'.'.$ext2;  
            $photoname=$path.$photoname;
            //设置文件上传到服务器后存放的位置,move_uploaded_file()会将文件移动到新位置，第一个参数是要移动的文件，第二个参数是移动到哪里。我在这里是放到和本php文件同一目录下，注意需要将新的文件名连接进去。  
            if (move_uploaded_file($photo['tmp_name'],$photoname)) {  
                echo "图片success";  
            } else{  
                echo "图片error";  
            }  
        }
        //将新闻信息写入数据库
        //(`nId`, `nDate`, `author`, `title`, `sketch`, `content`, `sId`, `picture`, `hotWords`)
        //$str="NULL,'$dName','$dPhone','$dEmail','$dConnent',CURRENT_TIMESTAMP,'$uName'";
        $str="NULL,CURRENT_TIMESTAMP,'$author','$title','$sketch','$contentname',$sId,'$photoname','$hotWord'";
        $rasult=addNews($str);
        if($rasult){
                echo 'erro';
            }else{
                echo "<script> alert('添加新闻成功！');parent.location.href='../controller2/addNewsC.php'; </script>";
            }
    }else{
        echo '有未填写内容';
    }
