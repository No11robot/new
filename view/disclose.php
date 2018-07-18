<{extends file="main.html"}>
<{block name="contents"}>
<div id="templatemo_middle_wrapper">
    <div id="templatemo_middle">
        <div id="templatemo_content">
            <div class="content_box_wrapper">
            	<div class="content_box">
                    <h2>联系我们</h2>
                        <p>我们的宗旨是：更快、更真实！
                            <br/>生活处处都有新闻，当您发现有趣、惊奇的事，请尽快联系我们。
                            <br/>一经采纳,我们将给予丰厚的报酬。
                            <br/>爆料热线：8888-8888-8888
                            <br/>也可在线提交
                        </p>
                    <div class="cleaner_h40"></div>
                    <div id="contact_form">
                        <h4>快速爆料</h4>
                        <form method="post" name="contact" action="../controller/addDiscloseC.php">     
                        <div class="col_w300 float_l">                     
                            <input type="hidden" name="post" value="Send" />
                            <label for="author">姓名:</label> <input type="text" id="dName" name="dName" class="required input_field" />
                            <div class="cleaner_h10"></div>
                            <label for="email">邮箱:</label> <input type="text" id="dEmail" name="dEmail" class="validate-email required input_field" />
                            <div class="cleaner_h10"></div>
                            
                            <label for="url">电话:</label> <input type="text" name="dPhone" id="dPhone" class="input_field" />
                            <div class="cleaner_h10"></div>                        
                        </div>
                            <div class="col_w300 float_r">
                            <label for="text">内容:</label> <textarea id="dConnent" name="dConnent" rows="0" cols="0" class="required"></textarea>
                            <div class="cleaner_h10"></div>                          
                            <input type="submit" class="submit_btn float_l" name="addDisclose" id="addDisclose" value="发送" />
                            <input type="reset" class="submit_btn float_r" name="reset" id="reset" value="清空" />
                        </div>   
                        </form>
                    </div> 
            		<div class="cleaner"></div>
                </div> <!-- end of content_box -->
            </div> <!-- end of content_box_wrapper -->            
        </div> <!-- end of templatemo_content -->
<{/block}>

