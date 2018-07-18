<{extends file="backstageMain.html"}>
<{block name="contents"}>
<div id="content">
    <div class="item">
        <div class="title">新闻爆料</div>
        <{foreach $disclose as $row}>
<div class="data-list clear" id='disclose'>    
    <label for="author">姓名:</label> <input type="text" disabled="disabled" id="dName" name="dName" value="<{$row['dName']}>" />
    <label for="email">邮箱:</label> <input type="text" disabled="disabled" id="dEmail" name="dEmail" value="<{$row['dEmail']}>"/>                           
    <label for="url">电话:</label> <input type="text" disabled="disabled" name="dPhone" id="dPhone" value="<{$row['dPhone']}>" />              
    <div>
        <label for="text">内容:</label>
        </div> 
    <textarea id="dConnent" name="dConnent" disabled="disabled" rows="2" cols="20" style="height:100px;width:250px;"><{$row['dConnent']}></textarea>                   
    <input type="submit" name="delDisclose" dId="<{$row['dId']}>" value="删除" />
      
</div> 
        <{/foreach}>
        <{for $foo=1 to $pageCount}>
            <a href="../controller2/checkDiscloseC.php?pageNow=<{$foo}>"><{$foo}></a>
        <{/for}>
        <div>当前页：<{$smarty.get.pageNow}></div>
            </div>
</div>
<{/block}>
<{block name="jq"}>		
<script>
    $("#disclose input[name=delDisclose]").click(function(){
        if(confirm("确认要删除吗？")){
            var dId=$(this).attr("dId");
            delDiscloseByone(dId);
        } 
    });
    function delDiscloseByone(dId){
        $.ajax({
            url:"../controller2/delDiscloseC.php",
            data:{dId:dId},
            dataType:"json",
            success:function(msg){
                for(key in msg){
                   if(key==0)
                       $("#disclose input[dId="+dId+"]").parents("#disclose").remove();
                   else
                       alert("error！");
                }
            }
        });
    }
</script>
<{/block}>
