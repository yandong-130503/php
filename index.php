<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>许愿池</title>
		<link href="css/index.css" type="text/css" rel="stylesheet" />

	</head>
	<body>
		<header>
			<p>许愿池</p>
			<p onclick="guanli()" class="yonghuguanli">管理入口</p>
		</header>
		
		<section>
			<a href="#" onclick="shuru()">我要许愿</a>
			<div class="shuqian">
				<?php
			 	include_once("conn/conn.php");
				$result1=mysqli_query($conn, "SELECT (id) FROM yuanwang;");
				$yeshu=0;
				$tianjia=0;
				while($myrow=mysqli_fetch_assoc($result1)){
					if(intval($yeshu+1)!=intval($myrow['id'])){
						$tianjia=intval($yeshu+1);
					}
					if(intval($yeshu)< intval($myrow['id'])){
						$yeshu= $myrow['id'];
					}
						
					
					}
				$ye1=$yeshu;
				$ye=0;
				if($yeshu%4==0){
					$ye=intval($yeshu/4);
				}else{
					$ye=intval($yeshu/4+1);
				}
				?>
				<script>
					function qiehuanyeshu(){
						var a=parseInt(document.getElementById("yeshu").value);
						var b=parseInt(<?php echo $ye?>);
						if(0<a&&a<=b){
							window.location.href="index.php?yeshu="+a;
						}else{
							alert("当前输入页数不是正常页数");
						}
					}
					function qiehuanyeshu1(){
						var a=parseInt(document.getElementById("yeshu").value)-1;
						if(0<a){
							window.location.href="index.php?yeshu="+a;
						}else{
							alert("当前是第一页");
						}
						
					}
					function qiehuanyeshu2(){
						var a=parseInt(document.getElementById("yeshu").value)+1;
						if(a<=<?php echo $ye?>){
							window.location.href="index.php?yeshu="+a;
						}else{
							alert("当前是最后一页");
						}
						
					}
				</script>
				<?php
				$xiugaile=0;
				$yeshu1=0;
				$yeshu2=5;
				$yeshu3=1;
				$xiugaiyanzheng=0;
				$xiugaimima="0";
				$xiugaixingming="0";
				$xiugaicolor="0";
				$xiugaiyuanwang="0";
				$xiugaiid="0";
				if($_GET['yeshu']>0){
					$yeshu1=$_GET['yeshu']*4-4;
					$yeshu2=$_GET['yeshu']*4+1;
					$yeshu3=$_GET['yeshu'];
				}
				$ye1=$ye1+1;
				if($_GET['shuru']==3){
					if($tianjia!=0){
						$sql3='INSERT INTO yuanwang (id,name,yuanwang,mima,yanse) VALUE ("'.$tianjia.'","'.$_GET['mingzhi'].'","'.$_GET['xuyuan'].'","'.$_GET['mima'].'","'.$_GET['color'].'");';
				mysqli_query($conn, $sql3);
				$xiugaile=1;
				$tianjia=0;
					}else{
					$sql3='INSERT INTO yuanwang (id,name,yuanwang,mima,yanse) VALUE ("'.$ye1.'","'.$_GET['mingzhi'].'","'.$_GET['xuyuan'].'","'.$_GET['mima'].'","'.$_GET['color'].'");';
				mysqli_query($conn, $sql3);}
				$xiugaile=1;
				}else if($_GET['shuru']==4){
					$sql4="SELECT * FROM yuanwang where id=".$_GET['id'].";";
				$result4=mysqli_query($conn, $sql4);
				$xiugaile=1;
				$mima4="0";
				while($myrow4=mysqli_fetch_assoc($result4)){
					$mima4=$myrow4['mima'];
				}
				if($mima4==$_GET['mima']){
					$sql41='delete from yuanwang where id='.$_GET['id'].';';
				mysqli_query($conn, $sql41);
				$xiugaile=1;
				}else{
					echo "<script>alert('密码错误');</script>";
				}
				}else if($_GET['shuru']==5){
					$sql5="SELECT * FROM yuanwang where id=".$_GET['id'].";";
				$result5=mysqli_query($conn, $sql5);
				$mima5="0";
				while($myrow5=mysqli_fetch_assoc($result5)){
					$mima5=$myrow5['mima'];
					$xiugaixingming=$myrow5['name'];
					$xiugaimima=$myrow5['mima'];
					$xiugaiyuanwang=$myrow5['yuanwang'];
					$xiugaicolor=$myrow5['yanse'];
					$xiugaiid=$myrow5['id'];
				}
				if($mima5==$_GET['mima']){
					$xiugaiyanzheng=1;
				}else{
					echo "<script>alert('密码错误');</script>";
				}
				}else if($_GET['shuru']==6){
					$sql6="update yuanwang set name='".$_GET['mingzhi']."',yuanwang='".$_GET['xuyuan']."',mima='".$_GET['mima']."',yanse='".$_GET['color']."' where id='".$_GET['id']."';";
				mysqli_query($conn, $sql6);
				$xiugaile=1;
				}
				if($xiugaile==1){
				echo "<script>window.location.href='index.php?yeshu=".$yeshu3."';</script>";
					$xiugaile=0;
				}
				$sql2="SELECT * FROM yuanwang where id>".$yeshu1." and id<".$yeshu2.";";
				$result2=mysqli_query($conn, $sql2);
				while($myrow=mysqli_fetch_assoc($result2)){
			 ?>
			<div id="color<?php echo $myrow['id']?>"  onmouseover="xianshi(<?php echo $myrow['id']?>)" onmouseleave="yinchang(<?php echo $myrow['id']?>)">
					<div id="colora<?php echo $myrow['id']?>"><img src="img/Shanchu.png" id="xiugai<?php echo $myrow['id']?>" onclick="yanzheng2(this)"  /><img src="img/xiugai.png" id="shanchu<?php echo $myrow['id']?>" onclick="yanzheng1(this)" /> </div>
					<p>FORM:<?php echo $myrow['name']?></p>
					<p><?php echo $myrow['yuanwang']?></p>
					<p><?php echo $myrow['time']?></p>
				</div>
				<script>
					document.getElementById("color<?php echo $myrow['id']?>").style.background="#<?php echo $myrow['yanse']?>";
					document.getElementById("colora<?php echo $myrow['id']?>").style.background="#<?php echo $myrow['yanse']?>";
				</script>
				<?php
				}
				?>
			</div>
			<div class="yedi">
				<div>
					<input class="anniudi" type="button" value="上一页"onclick="qiehuanyeshu1()" /> <input type="text" id="yeshu"width="15px" maxlength="8"value="<?php echo $yeshu3?>"/> /<?php echo $ye?></span><input class="anniudi" type="button" value="前往" onclick="qiehuanyeshu()" /> <input class="anniudi" type="button" value="下一页" onclick="qiehuanyeshu2()" />
				</div>
			</div>
			<form>
			<div id="xieru" class="xieru">
				<p>我要许愿</p><img src="img/Shanchu.png" onclick="tuichuxieru()" />
				<div>
					<div>
						<p>我的名字：</p>
						<input type="text"  placeholder="输入9个字符以内" maxlength="9" id="xierumingzhi1" />
					</div>
					<div>
						<p>帖子颜色：</p>
						<span style="background:#94ccc1;" onclick="cheshi1()"></span>
						<span style="background:#c194cc ;" onclick="cheshi2()"></span>
						<span style="background:#c4cc94 ;" onclick="cheshi3()"></span>
						<span style="background:#ccb194 ;" onclick="cheshi4()"></span>
					</div>
				</div>
				<p>我的愿望：</p>
				<textarea rows="3" cols="30" placeholder="输入14个字符以内" maxlength="14" id="xieruyuanwang1" ></textarea>
				<div>保护密码：
					<input type="text" style="color: black;" placeholder="输入6个字符以内" maxlength="6" id="xierumima1" />
					<input type="reset" class="anniudi" value="提交" onclick="tijiaoshuru1()"  />
					<input type="reset" class="anniudi" value="重置"  /> 
				</div>
			</div>
			</form>
			<form>
			<div id="xiugai" class="xieru">
				<p>编辑愿望</p><img src="img/Shanchu.png" onclick="tuichuxiugai()" />
				<div>
					<div>
						<p>我的名字：</p>
						<input type="text"  placeholder="输入9个字符以内" maxlength="9" id="xierumingzhiaa" />
					</div>
					<div>
						<p>帖子颜色：</p>
						<span style="background:#94ccc1;" onclick="cheshi1()"></span>
						<span style="background:#c194cc ;" onclick="cheshi2()"></span>
						<span style="background:#c4cc94 ;" onclick="cheshi3()"></span>
						<span style="background:#ccb194 ;" onclick="cheshi4()"></span>
					</div>
				</div>
				<p>我的愿望：</p>
				<textarea rows="3" cols="30" placeholder="输入30个字符以内" maxlength="30" id="xieruyuanwangaa" ></textarea>
				<div>保护密码：
					<input type="text" placeholder="输入6个字符以内" maxlength="6" id="xierumimaaa" />
					<input type="reset" value="提交" onclick="tijiaoshuruaa()"  />
					<input type="reset" value="重置"  /> 
				</div>
			</div>
			</form>
			<form>
			<div id="yanzheng1" class="yanzheng">
				<p>输入保护密码</p><img src="img/Shanchu.png" onclick="tuichuyangzheng()" />
				<div>保护密码：
					<input type="text" placeholder="输入6个字符以内" maxlength="6" id="xierumimaa" />
					<input type="reset" value="提交" onclick="xiugai()"  />
					<input type="reset" value="重置"  /> 
				</div>
			</div>
			</form>
			</form>
			<form>
			<div id="yanzheng2" class="yanzheng">
				<p>输入保护密码</p><img src="img/Shanchu.png" onclick="tuichuyangzheng()" />
				<div>保护密码：
					<input type="text" placeholder="输入6个字符以内" maxlength="6" id="xierumima2" />
					<input type="reset" value="提交" onclick="shanchu()"  />
					<input type="reset" value="重置"  /> 
				</div>
			</div>
			</form>
			</form>
			<form>
			<div id="yanzheng3" class="yanzheng">
				<p>输入管理员口令</p><img src="img/Shanchu.png" onclick="tuichuyangzheng()" />
				<div>管理员口令：
					<input type="text" placeholder="输入15个字符以内" maxlength="15" id="xierumima3" />
					<input type="reset" value="提交" onclick="guanlitiao()"  />
					<input type="reset" value="重置"  /> 
				</div>
			</div>
			</form>
			<script>
				function xianshi(a){
					var xiugai="xiugai"+a;
					var shanchu="shanchu"+a;
					document.getElementById(xiugai).style.width="12px";
					document.getElementById(shanchu).style.width="12px";
				}
				function yinchang(a){
					var xiugai="xiugai"+a;
					var shanchu="shanchu"+a;
					document.getElementById(xiugai).style.width="0px";
					document.getElementById(shanchu).style.width="0px";
				}
				function shuru(){
					document.getElementById("xieru").style.top="50%";
				}
				function xiugai(){
					var a=document.getElementById("xierumimaa").value;
					if(a==""){
					alert("输入密码");
					}else{
						window.location.href="index.php?yeshu="+<?php echo $yeshu3?>+"&mima="+a+"&id="+id+"&shuru=5";		
					}
				}
				var id=0;
				function yanzheng1(x){
					var str=x.id;
					var reg=new RegExp("shanchu");
					id=str.replace(reg,"");
					document.getElementById("yanzheng1").style.top="50%";
				}
				function yanzheng2(x){
					var str=x.id;
					var reg=new RegExp("xiugai");
					id=str.replace(reg,"");
					document.getElementById("yanzheng2").style.top="50%";
				}
				var color="ccb194";
				function cheshi1(){
					color="94ccc1";
					alert("成功选择颜色"+color)
				}
				function cheshi2(){
					color="c194cc";
					alert("成功选择颜色"+color)
				}
				function cheshi3(){
					color="c4cc94";
					alert("成功选择颜色"+color)
				}
				function cheshi4(){
					color="ccb194";
					alert("成功选择颜色"+color)
				}
				function tijiaoshuru1(){
					var mima=document.getElementById("xierumima1").value;
					var xuyuan=document.getElementById("xieruyuanwang1").value;
					var mingzhi=document.getElementById("xierumingzhi1").value;
					if(mima==""||xuyuan==""||mingzhi==""){
						alert("没有输入内容");
					}else{
					window.location.href="index.php?yeshu="+<?php echo $yeshu3?>+"&mima="+mima+"&xuyuan="+xuyuan+"&mingzhi="+mingzhi+"&color="+color+"&shuru=3";
					document.getElementById("xieru").style.top="-50%";
					}
				}function tijiaoshuruaa(){
					var mima=document.getElementById("xierumimaaa").value;
					var xuyuan=document.getElementById("xieruyuanwangaa").value;
					var mingzhi=document.getElementById("xierumingzhiaa").value;
					if(mima==""||xuyuan==""||mingzhi==""){
						alert("没有输入内容");
					}else{
					window.location.href="index.php?yeshu="+<?php echo $yeshu3?>+"&id="+<?php echo $xiugaiid?>+"&mima="+mima+"&xuyuan="+xuyuan+"&mingzhi="+mingzhi+"&color="+color+"&shuru=6";
					document.getElementById("xieru").style.top="-50%";
					}
				}
				function tuichuxieru(){
					document.getElementById("xieru").style.top="-50%";
				}
				function tuichuxiugai(){
					document.getElementById("xiugai").style.top="-50%";
				}
				function tuichuyangzheng(){
					document.getElementById("yanzheng1").style.top="-50%";
					document.getElementById("yanzheng2").style.top="-50%";
					document.getElementById("yanzheng3").style.top="-50%";
				}
				
				function shanchu(){
					var aaa=document.getElementById("xierumima2").value;
					if(aaa==""){
						alert("没输入内容");
					}else{
					window.location.href="index.php?yeshu="+<?php echo $yeshu3?>+"&mima="+aaa+"&id="+id+"&shuru=4";
					}
				}
				function guanli(){
					document.getElementById("yanzheng3").style.top="50%";
				}
				function guanlitiao(){
					var aaa=document.getElementById("xierumima3").value;
					if(aaa==""){
						alert("没输入内容");
					}else{
					window.location.href="guanli.php?mima="+aaa+"&guanli=6";
					}
				}
			</script>
		</section>
	</body>
	<?php 
	if($xiugaiyanzheng==1){
		echo "<script>
		document.getElementById('xiugai').style.top='50%';
		document.getElementById('xierumingzhiaa').value='".$xiugaixingming."';
		document.getElementById('xieruyuanwangaa').value='".$xiugaiyuanwang."';
		document.getElementById('xierumimaaa').value='".$xiugaimima."';
		color='".$xiugaicolor."';
		</script>";
	}
	?>
</html>
