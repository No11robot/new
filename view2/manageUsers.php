<{extends file="backstageMain.html"}>
<{block name="contents"}>
<div id="content">
    <div class="item"><div class="title">会员列表</div>
        <div class="data-list clear">
            <form method="post">
            <table border="1"id="users" >
		<tr><td>会员ID</td><td>会员昵称</td><td>密码</td><td>邮箱</td><td>级别</td><td>重新填写</td><td>修改</td><td>删除</td></tr>
		<{foreach $pageNowUsers as $row}>
                <tr class="item">
                    <td><input type='text' disabled="disabled" name='uId' value='<{$row["uId"]}>'/></td>
                    <td><input type='text' disabled="disabled" class='uName' value='<{$row["uName"]}>'/></td>
                    <td><input type='password' disabled="disabled" class='pwd' value='<{$row["pwd"]}>'/></td>
                    <td><input type='text' disabled="disabled" class='email' value='<{$row["email"]}>'/></td>
                    <td><input type='text' class='grade' value='<{$row["grade"]}>'/></td>
                    <td><input type='reset' value='重新填写'/></td>
                    <td><input type='submit' name="changeInfo" uId='<{$row["uId"]}>' value='修改信息'/></td>
                    <td><input type='submit' name="delUser" uId='<{$row["uId"]}>' value='删除用户'/></td>
                </tr>
                <{/foreach}>
            </table>
            </form>
            <{for $foo=1 to $pageCount}>
                                    <!--<a href="../controller/aboutC.php?nId=<{$smarty.get.nId}>&pageNow=<{$foo}>"><{$foo}></a>-->
                                    <a href="../controller2/manageUsersC.php?&pageNow=<{$foo}>"><{$foo}></a>
                    <{/for}>
                    <div>当前页：<{$smarty.get.pageNow}></div>
	<div class="pagelist"><div>    </div></div>
</div>
</div>
</div>
<{/block}>
<{block name="jq"}>		
<script>
    $("#users input[name=delUser]").click(function(){
        if(confirm("确认要删除吗？")){
            var uId=$(this).attr("uId");
            delUsersByone(uId);
        } 
    });
    $("#users input[name=changeInfo]").click(function(){
        if(confirm("确认要修改吗？")){
            var uId=$(this).attr("uId");
            var uName=$(this).parents("tr").find(".uName").val();
            var pwd=$(this).parents("tr").find(".pwd").val();
            var email=$(this).parents("tr").find(".email").val();
            var grade=$(this).parents("tr").find(".grade").val();
            changeUsersByone(uId,uName,pwd,email,grade);
        } 
    });
    function delUsersByone(uId){
        $.ajax({
            url:"../controller2/delUsersC.php",
            data:{uId:uId},
            dataType:"json",
            success:function(msg){
                for(key in msg){
                   if(key==0)
                       $("#users input[uId="+uId+"]").parents(".item").remove();
                   else
                       alert("error！");
                }
            }
        });
    }
    function changeUsersByone(uId,uName,pwd,email,grade){
        $.ajax({
            url:"../controller2/changeUsersC.php",
            data:{uId:uId,uName:uName,pwd:pwd,email:email,grade:grade},
            dataType:"json",
            success:function(msg){
                for(key in msg){
                   if(key==0){
                       parent.location.href='../controller2/manageUsersC.php?pageNow=1';
                   }
                   else
                       alert("error！");
                }
            }
        });
    }
</script>
<{/block}>