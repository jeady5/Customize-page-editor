<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>JEditor</title>
<link rel='stylesheet' type='text/css' href='index.css'>
<script type="text/javascript">
function getValue(){
    var s=document.getElementById("input_value")
    var d=document.getElementById("show_value")
    var submit_essay = document.getElementById("will_submit_essay")
		var state1 = document.getElementById("state1")
		state1.value = "init parameter"
   	var state2 = document.getElementById("state2")
   	state2.value = "init parameter"
   	var state3 = document.getElementById("state3")
    state3.value = "init parameter"
    //自定义符号类型，根据符号来设定显示形式
		var tip=[
/*00*/				[/F1F2F3/, -1],    				
/*01*/				[/# /, -1],
/*02*/				[/## /, -1],
/*03*/				[/### /, -1],
/*04*/				[/#### /, -1],
/*05*/				[/##### /, -1],
/*06*/				[/\(.*\)\[.*\]/, -1],
/*07*/				[/---/, -1],
/*08*/				[/\^\@\*/, -1]]
		var tip_bak = tip
	  var temp = ''	//每段文本暂存区
		var temp_inner = ''	//每段文本修改后的暂存区
		var index = -1  //搜索关键词的返回索引值
		var index_temp = 0  //用于索引索引值数组
		var indexs = new Array()  //一行文本中包含的索引值数组，最多10个。
		var is_paragraph = 1  //判断是否需要设置为段
		value = s.value
	  arrays = value.split('\n')//将每一段放到数组
		d.innerHTML = ''
		submit_essay.value = ''	
		for(var i=0;i<arrays.length;i++){
				//初始化界面参数
			index = -1
			tip=tip_bak
//		  state1.value = ''
//      state2.value = ''
//      state3.value = ''
//      state2.value = tip.length
      index_temp = 0
		  indexs = new Array()
            	//循环查找包含tip中定义的哪种情况，并记录索引值
            	/*
            		tip ： [0]为标识符，[1]为存在的标记
            		array: 将输入内容按行分割成的数组
            		indexs： 存放索引值的数组
            	*/
			state1.value = arrays[i].search(tip[6][0]);
			if(arrays[i]==''){
				indexs[index_temp] = -1;
			}else if(arrays[i].search(tip[8][0]) == 0){
				indexs[index_temp] = 8;
			}else{
				for(var j=tip.length-1;j>=0;j--){
					tip[j][1] = arrays[i].search(tip[j][0])
					if(tip[j][1] != -1){
						indexs[index_temp++] = j
						if(j<6)break
					}
				}
			}
				temp_inner = arrays[i]
				is_paragraph = 1
				index_temp = 0;
				//根据包含词的索引值进行分别定义
	     if(indexs.length == 0){
		   temp_inner = '<p>' + temp_inner + '</p>'
       }
       else{
    				for(index_temp;index_temp<indexs.length;index_temp++){
 //   					state2.value += indexs[index_temp] + ';'
        			switch(indexs[index_temp]){
         		   case -1: //无字符，为换行符
         					temp_inner = '<br>'
         	     break
        			 case 0: //待定的内部情况
        		   break
        			 case 1: //#=>h1标签
             				temp_inner = temp_inner.split('# ')[0] + '<h1>' + temp_inner.split('# ')[1]+'</h1>'
        				break
        				case 2:  //##=>h2标签
             				temp_inner = '<h2>' + temp_inner.split('# ')[1]+'</h2>'
        				break
        				case 3: //###=>h3标签
             				temp_inner = '<h3>' + temp_inner.split('# ')[1]+'</h3>'
        				break
        				case 4: //#### =>h4标签
             				temp_inner = '<h4>' + temp_inner.split('# ')[1]+'</h4>'
        				break
        				case 5: //##### =>h5标签
             				temp_inner = '<h5>' + temp_inner.split('# ')[1]+'</h5>'
        				break
        				case 6: //(name)[url]=>a标签
             				temp_inner = temp_inner.split('(')[0] + '<a target="_blank" href="' + temp_inner.split('[')[1].split(']')[0] +
             				 '">' + temp_inner.split('(')[1].split(')')[0] + '</a>'
        				break
								case 7:
												temp_inner = temp_inner.split('---')[0] + '<hr>'
								break
								case 8:
												temp_inner = temp_inner.split('^@*')[1]
								break
        				default:
        					break
								}
						}
        }
d.innerHTML += temp_inner
submit_essay.value += temp_inner
   }
}
    </script>
</head>
<body>
<form action="submit_essay.php" method="POST">
<div class='container'>
<textarea id='input_value' class='edit_area' onkeyup='getValue()'></textarea>
<fieldset class='edit_help'>
<legend>使用帮助</legend>
<fieldset>
<legend>原样输出</legend>
^@* hello 
</fieldset>
<fieldset>
<legend>标题</legend>
# 一级标题
<br>
## 二级标题
</fieldset>
<fieldset>
<legend>网址</legend>
(name)[url]
</fieldset>
<fieldset>
<legend>网址标题</legend>
# (name)[url]
</fieldset>
<fieldset>
<legend>分割线</legend>
---
</fieldset>
</fieldset>
<div class='show_area' id='show_value'></div>
</div>
<hr/>
	<input id='state1'hidden style='width: 100%' />
	<input id='state2'hidden style='width: 100%' />
	<input id='state3'hidden style='width: 100%' />
<fieldset>
<legend>文章对应HTML,可复制</legend>
<input class='html_value' id="will_submit_essay" name="essay" readonly value=""/>
</fieldset>
<fieldset>
<legend>作者简单信息：</legend>	
	<p><div class='nickname'>昵称：<input name="nickname" type='text' maxlength=8 required></div></p>
	<p><div class='email'>邮箱：<input name="email" type='email' required></div></p>
</fieldset>
		<input type='submit' value='提交'>
</form>
	</body>
</html>
