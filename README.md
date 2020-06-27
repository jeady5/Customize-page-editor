自定义网站编辑器——JEditor

# 功能描述
实现类似markdown标记语言功能的编辑器

# 版本1.0
说明：本版本实现标题及网址的显示功能
1、实现五级标题功能
	输入（INPUT）			输出（OUTPUT）
	# 123		=>	<h1>123</h1>
	## 123		=>	<h2>123</h2>
	### 123		=>	<h3>123</h3>
	#### 123	=>	<h4>123</h4>
	##### 123	=>	<h5>123</h5>
2、实现网址的变换
	输入（INPUT）					输出（OUTPUT）
	(baidu)[https://www.baidu.com] 	=> 	<a href="https://www.baidu.com">baidu</a>

# 版本1.1
版本更新：添加复合编辑功能
比如
	输入（INPUT）					输出（OUTPUT）
	# (baidu)[https://www.baidu.com]=>	<h1><a href="http://www.baidu.com">baidu</a>

# 版本1.2
版本更新：
1、添加分割线功能
输入三个中线自动自动输出一个长分割线
	---
2、添加原样输出功能
当某行以 ^@* 这三个字符开头时*,改行不执行格式化，就是不会进行标题，网址等格式化符的限制，后面跟什么就原样输出什么。
2、上传到数据库功能
3、显示转换后的html代码
为节省页面空间，代码以一行列出，可以点击代码行后，Ctrl+a，Ctrl+c进行全部复制。
4、优化已提交代码中的部分bug

