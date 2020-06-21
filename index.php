<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <script type="text/javascript">
        function getValue(){
            var s=document.getElementById("input_value");
            var d=document.getElementById("show_value");
            
        	var state1 = document.getElementById("state1");
        	var state2 = document.getElementById("state2");
        	var state3 = document.getElementById("state3");
            var value = s.value;//输入文本暂存
            //自定义符号类型，根据符号来设定显示形式
			var tip=[
				[/F1F2F3/, -1],    				
				[/# /, -1],
				[/## /, -1],
				[/### /, -1],
				[/#### /, -1],
				[/##### /, -1],
				[/([a-zA-Z0-9]*)[[a-z]*]/, -1]];
			var tip_bak = tip;
            var temp = '';	//每段文本暂存区
			var temp_inner = '';	//每段文本修改后的暂存区
			var index = -1;  //搜索关键词的返回索引值
            arrays = value.split('\n');//将每一段放到数组
            d.innerHTML = '';	
            for(var i=0;i<arrays.length;i++){
				//初始化界面参数
                index = -1;
            	tip=tip_bak;
            	state1.value = '';
            	state2.value = '';
            	state3.value = '';
            	state2.value = tip.length;
            	//循环查找包含tip中定义的哪种情况，并标记索引值
		do{
				for(var j=tip.length-1;j>0;j--){
					tip[j][1] = arrays[i].search(tip[j][0]);
					if(tip[j][1] != -1){
						index = j;
						state1.value = tip;
						state3.value = index;
						break;
					}else{
						index = -1;	
					}
				}
				//根据包含词的索引值进行分别定义
				switch(index){
				case -1: //普通段落=>p标签
					temp_inner = '<p>' + arrays[i] + '</p>';
	                break;
				case 0: //待定的内部情况
					
					break;
				case 1: //#=>h1标签
     				temp_inner = '<h1>' + arrays[i].split('# ')[1]+'</h1>';
					break;
				case 2:  //##=>h2标签
     				temp_inner = '<h2>' + arrays[i].split('# ')[1]+'</h2>';
					break;
				case 3: //###=>h3标签
     				temp_inner = '<h3>' + arrays[i].split('# ')[1]+'</h3>';
					break;
				case 4: //#### =>h4标签
     				temp_inner = '<h4>' + arrays[i].split('# ')[1]+'</h4>';
					break;
				case 5: //##### =>h5标签
     				temp_inner = '<h5>' + arrays[i].split('# ')[1]+'</h5>';
					break;
				case 6: //(name)[url]=>a标签
     				temp_inner = '<a href="' + arrays[i].split('[')[1].split(']')[0] +
     				 '">' + arrays[i].split('(')[1].split(')')[0] + '</a>';
					break;
				default:
					break;
				}
		arrays[i]=temp_inner;
		}while(index != -1);
					d.innerHTML += temp_inner;
    		}
        }
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Markdown Editor</title>
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>
    <body>
        <div class='container'>
            <div>
            	<textarea id='input_value' class='edit_area' onkeyup='getValue()'></textarea>
            </div>
        	<div id='show_value' class='show_area'></div>
        </div>
        <input id='state1' style='width: 100%'/>
        <input id='state2' style='width: 100%'/>
        <input id='state3' style='width: 100%'/>
    </body>
</html>
