<{extends file="backstageMain.html"}>
<{block name="contents"}>
<div id="content">
    <div class="item">
        <div class="title">
            <{if $smarty.get.sId==1}>
                国内新闻
            <{elseif $smarty.get.sId==2}>
                国际新闻
            <{elseif $smarty.get.sId==3}>
                体育新闻
            <{elseif $smarty.get.sId==4}>
                经济新闻
            <{elseif $smarty.get.sId==5}>
                军事新闻
            <{else}>
                娱乐新闻
            <{/if}>
        </div>
        <div class="data-list clear">
            <form method="post">
                <table border="1"id="users" >
                    <tr><td>新闻ID</td><td>新闻标题</td><td>新闻时间</td><td>记者</td><td>简述</td><td>热词</td><td>重新填写</td><td>修改</td><td>删除</td></tr>		
                    <{foreach $sectionNews as $row}>
                        <tr class="item">
                            <td><input type='text' disabled="disabled" name='nId' value='<{$row["nId"]}>'style="width:60px;"/></td>
                            <td><textarea type='text' class='Title' value='<{$row["title"]}>'style="height:50px;width:150px;"><{$row["title"]}></textarea></td>
                            <td><input type='text' class='nDate' value='<{$row["nDate"]}>'/></td>
                            <td><input type='text' class='author' value='<{$row["author"]}>'style="width:100px;"/></td>
                            <td><textarea type='text' class='sketch' value='<{$row["sketch"]}>'style="height:100px;width:200px;"><{$row["sketch"]}></textarea></td>
                            <td><input type='text' class='hotWord' value='<{$row["hotWords"]}>'style="width:100px;"/></td>
                            <td><input type='reset' value='重新填写'/></td>
                            <td><input type='submit' name="changeInfo" nId='<{$row["nId"]}>' value='修改新闻'/></td>
                            <td><input type='submit' name="delNews" nId='<{$row["nId"]}>' value='删除新闻'/></td>
                        </tr>   
                    <{/foreach}>
                </table>
                </form>
        <{for $foo=1 to $pageCount}>
            <a href="../controller2/checkNewsC.php?sId=<{$smarty.get.sId}>&pageNow=<{$foo}>"><{$foo}></a>
        <{/for}>
        <div>当前页：<{$smarty.get.pageNow}></div>
	<div class="pagelist"><div>    </div></div>
        </div>
    </div>
</div>
<{/block}>
<{block name="jq"}>		
<script>
    $("#users input[name=delNews]").click(function(){
        if(confirm("确认要删除吗？")){
            var nId=$(this).attr("nId");
            delNewsByone(nId);
        } 
    });
    $("#users input[name=changeInfo]").click(function(){
        if(confirm("确认要修改吗？")){
            var nId=$(this).attr("nId");
            var title=$(this).parents("tr").find(".Title").val();
            var nDate=$(this).parents("tr").find(".nDate").val();
            var author=$(this).parents("tr").find(".author").val();
            var sketch=$(this).parents("tr").find(".sketch").val();
            var hotWord=$(this).parents("tr").find(".hotWord").val();
            changeNewsByone(nId,title,nDate,author,sketch,hotWord);
        } 
    });
    function delNewsByone(nId){
        $.ajax({
            url:"../controller2/delNewsC.php",
            data:{nId:nId},
            dataType:"json",
            success:function(msg){
                for(key in msg){
                   if(key==0)
                       $("#users input[nId="+nId+"]").parents(".item").remove();
                   else
                       alert("error！");
                }
            }
        });
    }
    function changeNewsByone(nId,title,nDate,author,sketch,hotWord){
        $.ajax({
            url:"../controller2/changeNewsC.php",
            data:{nId:nId,title:title,nDate:nDate,author:author,sketch:sketch,hotWord:hotWord},
            dataType:"json",
            success:function(msg){
                for(key in msg){
                   if(key==0){
                       parent.location.href='../controller/manageUsersC.php?pageNow=1';
                   }
                   else
                       alert("error！");
                }
            }
        });
    }
</script>
<{/block}>