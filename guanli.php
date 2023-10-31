<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>许愿池</title>
		<link href="css/Index.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<header>
			<p>许愿池-管理</p>
			<p onclick="xuyuan()" class="yonghuguanli">首页入口</p>
		</header>
		
		<section>
				<?php
				$chongqi=0;
			 	include_once("conn/conn.php");
				$yanzheng1=0;
				$guanlimingzhi="0";
				if($_GET['guanli']==6){
				$result1=mysqli_query($conn, "SELECT * FROM guanli;");
				$chongqi=1;
				while($myrow=mysqli_fetch_assoc($result1)){
					if($_GET['mima']==$myrow['kouling']){
						$yanzheng1=1;
						$guanlimingzhi=$myrow['name'];
					}
				}
				if($yanzheng1==1){
					$yanzheng1=0;
				}else{
					echo "<script>alert('登录口令错误');</script>";
					echo "<script>window.location.href='index.php?yeshu=1';</script>";
				}
				}else if($_GET['guanli']==5){
					$guanlimingzhi=$_GET['name'];
				}else if($_GET['guanli']==4){
					$guanlimingzhi=$_GET['name'];
				$result2=mysqli_query($conn, "select * from yuanwang where ".$_GET['a']." like '%".$_GET['b']."%';");
				
				
				
					
					?>
				<form>
				<div id="xieru1" class="xieru" style="top: -50%;width: 800px;margin-left: -400px;margin-top: -60px;">
				<p>搜索内容</p><img src="img/Shanchu.png" onclick="tuichuxieru()" />
				<table border="1px soild #e2d6d6">
				<tr>
					<td>名字</td>
					<td>愿望</td>
					<td>密码</td>
					<td>颜色</td>
					<td>时间</td>
				</tr>
				<?php while($myrow=mysqli_fetch_assoc($result2)){ ?>
				<tr>
					<td><?php echo $myrow['name']?></td>
					<td><?php echo $myrow['yuanwang']?></td>
					<td><?php echo $myrow['mima']?></td>
					<td><?php echo $myrow['yanse']?></td>
					<td><?php echo $myrow['time']?></td>
				</tr><?php }?>
				</table>
				</div>
				</form>
					<?php
					echo "<script>document.getElementById('xieru1').style.top='50%';</script>";
				
				}else if($_GET['guanli']==3){
					$guanlimingzhi=$_GET['name'];
				$result2=mysqli_query($conn, 'delete from yuanwang where '.$_GET['a'].'="'.$_GET['b'].'";');
				$chongqi=1;
					echo "<script>alert('执行完了删除命令');</script>";
				}
				
				?>
				<div class="guanlia">
					<p>管理员：<?php echo $guanlimingzhi?></p>
				</div>
				<div class="guanlib">
					<div style="background:#94ccc1;"onclick="shanchu()" >
						<p>批量删除</p>
					</div>
					<div style="background:#c194cc;"onclick="shuru()">
						<p>搜索愿望</p>
					</div>
				</div>
				<form>
			<div id="xieru" class="xieru" style="height: 120px;width: 220px;margin-left: -110px;margin-top: -60px;">
				<p>输入搜索内容</p><img src="img/Shanchu.png" onclick="tuichuxieru()" />
				<div>
					<input type="text" style="color: black;" placeholder="输入10个字符以内" maxlength="10" id="xierumima1" />
					<input type="reset" class="anniudi" value="重置"  /> <br /><br />
					<input type="reset" class="anniudi" value="搜名字" onclick="soushuo1()"  />
					<input type="reset" class="anniudi" value="搜愿望" onclick="soushuo2()"  />
					<input type="reset" class="anniudi" value="搜密码" onclick="soushuo3()"  />
				</div>
			</div>
			</form>
			<form>
			<div id="xieru2" class="xieru" style="height: 120px;width: 220px;margin-left: -110px;margin-top: -60px;">
				<p>输入要删除内容</p><img src="img/Shanchu.png" onclick="tuichuxieru()" />
				<div>
					<input type="text" style="color: black;" placeholder="输入10个字符以内" maxlength="10" id="xierumima2" />
					<input type="reset" class="anniudi" value="重置"  /> <br /><br />
					<input type="reset" class="anniudi" value="按名字" onclick="shanchu1()"  />
					<input type="reset" class="anniudi" value="按愿望" onclick="shanchu2()"  />
					<input type="reset" class="anniudi" value="按密码" onclick="shanchu3()"  />
				</div>
			</div>
			</form>
			
				
			<script>
				function shanchu1(){
					shanchu4("name");
				}function shanchu2(){
					shanchu4("yuanwang");
				}function shanchu3(){
					shanchu4("mima");
				}
				function shanchu4(a){
					var b=document.getElementById("xierumima2").value;
					if(b==""){
						alert("输入内容");
					}else{
						var c="<?php echo $guanlimingzhi ?>";
					window.location.href="guanli.php?name="+c+"&a="+a+"&b="+b+"&guanli=3";		
					}
					tuichuxieru();
				}
				
				function shanchu(){
					document.getElementById("xieru2").style.top="50%";
				}
				function soushuo1(){
					soushuo("name");
				}
				function soushuo2(){
					soushuo("yuanwang");
				}
				function soushuo3(){
					soushuo("mima");
				}
				function soushuo(a){
					var b=document.getElementById("xierumima1").value;
					if(b==""){
						alert("输入内容");
					}else{
						var c="<?php echo $guanlimingzhi ?>";
					window.location.href="guanli.php?name="+c+"&a="+a+"&b="+b+"&guanli=4";		
					}
					tuichuxieru();
				}
				function tuichuxieru(){
					document.getElementById("xieru").style.top="-50%";
					document.getElementById("xieru1").style.top="-50%";
					document.getElementById("xieru2").style.top="-50%";
				}
				function xuyuan(){
					window.location.href="index.php?yeshu=1";
				}
				function shuru(){
					document.getElementById("xieru").style.top="50%";
				}
			</script>
		</section>
	</body>
</html>
<?php 
	if(intval($chongqi)==1){
		echo "<script>window.location.href='guanli.php?name=".$guanlimingzhi."&guanli=5';</script>";
		$chongqi=0;
	}
	?>