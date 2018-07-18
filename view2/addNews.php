<{extends file="backstageMain.html"}>
<{block name="contents"}>
<div id="content">
    <div class="item">
        <div class="title">添加新闻</div>
        <div class="data-list clear">板块（1.国内；2国际；3.体育；4.财金；5.军事；6娱乐）</div>
        <div class="data-list clear">
            <form action="../controller2/uploadNewsC.php" method="post" enctype="multipart/form-data">
                <table border="1"id="news" style="table-layout:fixed">
                    <tr><td style="width:10px;">新闻板块</td><td>新闻标题</td><td>记者</td><td>简述</td><td>热词</td><td>上传图片</td><td>上传内容文件</td><td>重新填写</td><td>提交</td></tr>		          
                        <tr class="item">
                            <td width="100"><input type='text' name='sId'style="width:60px;"/></td>
                            <td><textarea type='text' name='title'style="height:50px;width:150px;"></textarea></td>
                            <td><input type='text' name='author'style="width:100px;"/></td>
                            <td><textarea type='text' name='sketch'style="height:100px;width:200px;"></textarea></td>
                            <td><input type='text' name='hotWord'style="width:100px;"/></td>
                            <td><input type='file' name='photo' style="width:200px;"/></td>
                            <td><input type='file' name='content'style="width:200px;"/></td>
                            <td><input type='reset' value='重新填写'/></td>
                            <td><input type='submit' name="changeInfo" value='添加新闻'/></td>                       
                        </tr>   
                </table>
                </form>
	<div class="pagelist"><div>    </div></div>
        </div>
    </div>
</div>
<{/block}>