<{extends file="main.html"}>
<{block name="contents"}>
<div id="templatemo_middle_wrapper">
    <div id="templatemo_middle"> 	
        <div id="templatemo_content">        
            <div class="content_box_wrapper">
            	<div class="content_box">                
                    <div class="post_section">
                        <h2><{$news['title']}></h2>        
                        <div class="post_meta"><strong>时间:</strong> <{$news['nDate']}> | <strong>记者:</strong><{$news['author']}></div>
                        <a href="#" target="_parent"><img width="628" src="<{$news['picture']}>" alt="free template" /></a>
                        <p style="text-indent: 2em"><{$news['sketch']}></p>
                        <div class='text'><{$newsContent}></div>
                        <div class="cleaner_h20"></div>
                        <div class="cleaner"></div>          
                    </div>               
                </div> <!-- end of content_box -->
            </div> <!-- end of content_box_wrapper -->
            
            <div class="content_box_wrapper">
            	<div class="content_box">                
                    <h2>最新评论</h2>                                
                    <div id="comment_section">
                        <ol class="comments first_level" id="aa">                        
                            <{if key($newsComments) }>
                                <{$newsComments[1]}>
                            <{else}>
                                <{foreach $newsComments as $row}>
                                    <li>
                                        <div class="comment_box commentbox1">    
                                            <div class="gravatar">
                                                <img src="../images/headShot/<{$row['headShot']}>" alt="author" />
                                            </div>
                                            <div class="comment_text">
                                                <div class="comment_author"><{$row['uName']}><span class="date"><{$row['cDate']}></span></div>
                                                <p><{$row['Ccontent']}></p>
                                                <!--<div class="btn_more float_r"><a href="#">回复</a></div>-->
                                            </div>                                
                                            <div class="cleaner"></div>
                                        </div>                              
                                    </li>
                                <{/foreach}>
                                <{for $foo=1 to $pageCount}>
                                    <a href="#" nId="<{$smarty.get.nId}>" pageCount="<{$pageCount}>" pageNow="<{$foo}>"><{$foo}></a>
                                <{/for}>
                                <div>当前页：<{$smarty.get.pageNow}></div>
                            <{/if}>    
                        </ol>
                    </div>               
                </div> <!-- end of content_box -->
            </div> <!-- end of content_box_wrapper -->
            <div class="content_box_wrapper">
            	<div class="content_box">                
                    <div id="comment_form">
                        <h3>发表您的评论</h3>    
                        <{if $smarty.session}>
                        <form action="../controller/addCommentsC.php?nId=<{$news['nId']}>" method="post">
                            <div class="form_row">
                                <label>评论</label><br />
                                <textarea  name="comment" rows="" cols=""></textarea>
                            </div>                                                    
                            <input type="submit" name="addComments" value="提交" class="submit_btn" />
                        </form>
                        <{else}>
                        <p>未登录，没有权限发表评论呦~</p>
                        <{/if}>
                    </div>           	
                </div> <!-- end of content_box -->
            </div> <!-- end of content_box_wrapper -->        
        </div> <!-- end of templatemo_content -->    
<{/block}>
<{block name="jq"}>
<script>
    console.log($("#comment_section a"));
    $("#comment_section a").each(function(){
        console.log($(this));
        $(this).click(function(){
            console.log($(this));
            var nId=$(this).attr("nId");
            var pageNow=$(this).attr("pageNow");
            var pageCount=$(this).attr("pageCount");
            getNextPageComments(nId,pageNow,pageCount);
          return false;
        });
    })
    
    function getNextPageComments(nId,pageNow,pageCount){
        $.ajax({
            url:"../controller/nextNewsCommentC",
            data:{nId:nId,pageNow:pageNow},
            dataType:"json",
            success:function(msg){
                //console.log(msg);
                var str= '<ol class="comments first_level" id="aa">';
                for(var i=0;i<msg.length;i++){
                    str += '<li><div class="comment_box commentbox1">';
                    str += '<div class="gravatar">';
                    str += '<img src="../images/headShot/'+msg[i].headShot+'" alt="author" />';
                    str += '</div>';
                    str += '<div class="comment_text"><div class="comment_author">'+msg[i].uName+'<span class="date">'+msg[i].cDate+'</span></div>';
                    str += '<p>'+msg[i].Ccontent+'</p>';
                    str += '</div><div class="cleaner"></div></div></li>';
                }
                for(var i=1;i<=pageCount;i++){
                   str += ' <a href="#" onclick="getNextPageComments(<{$smarty.get.nId}>,'+i+',<{$pageCount}>);return false;" nId="<{$smarty.get.nId}>" pageCount="<{$pageCount}>" pageNow="'+ i +'">'+i+'</a> ';
               }
                    str += '<div>当前页：'+pageNow+'</div>';
                    str += '</ol>';
                   console.log(str);
                    $('#comment_section').empty();
                    $('#comment_section').append(str);
                
            }
        });
    }
</script>  
<{/block}>