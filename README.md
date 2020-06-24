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
