<script src="includes/slide/js/jquery.min.js"></script>
<script src="includes/slide/js/jquery.cycle2.js"></script>
<link href="includes/slide/css/slide.css" rel="stylesheet" />

<?php include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php'); ?>

<!-- SLIDE DESKTOP -->
<section id="slideDesk" class="box-slide-all">
	<div class="cycle-slideshow s-d" data-cycle-timeout="9000" data-cycle-prev="#prev" data-cycle-next="#next">
		<?php
		$sql = "SELECT * FROM tb_slider WHERE status ='1' ";
		$res = mysqli_query($conexao, $sql);
		$qtde = mysqli_num_rows($res);
		while ($row = mysqli_fetch_array($res)) {
			$id = $row['id'];
			$img_desk = $row['img_desk'];
			$img_mob = $row['img_mob'];
			$link = $row['link'];
			$destino = $row['destino'];
			$status = $row['status'];
			if (empty($img_desk)) {
				$img_desk = "controlg/painel/imgs/no-slide-desk.jpg";
			} else {
				$img_desk = "controlg/painel/files/" . $img_desk;
			}
			echo "<img src='$img_desk' border='0' onclick=\"window.open('$link', '$destino')\" class='imgSlideDesk' />";
		}
		?>
	</div>
	<div class="box-nav-desk" id="box-nav">
		<a href="#" style="float:left;" id="prev"><img src="includes/slide/img/bt-back.png" class="bt-back" /></a>
		<a href="#" style="float:right;" id="next"><img src="includes/slide/img/bt-go.png" class="bt-go" /></a>
	</div>
</section>







<!-- SLIDE MOBILE -->
<section id="slideMobile" class="box-slide-mob">
	<div class="cycle-slideshow s-m" data-cycle-timeout="9000" data-cycle-prev="#prevm" data-cycle-next="#nextm">
		<?php
		$sql = "SELECT * FROM tb_slider WHERE status ='1'";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id = $row['id'];
			$img_desk = $row['img_desk'];
			$img_mob = $row['img_mob'];
			$link = $row['link'];
			$destino = $row['destino'];
			$status = $row['status'];
			if (empty($img_mob)) {
				$img_mob = "controlg/painel/imgs/no-slide-mob.jpg";
			} else {
				$img_mob = "controlg/painel/files/" . $img_mob;
			}
			echo "<img src='$img_mob' onclick=\"window.open('$link', '$destino')\" class='imgSlideMob' />";
		}
		?>
	</div>
	<div class="box-nav-mob" id="box-nav">
		<a href="#" style="float:left;" id="prevm"><img src="includes/slide/img/bt-back.png" class="bt-back" /></a>
		<a href="#" style="float:right;" id="nextm"><img src="includes/slide/img/bt-go.png" class="bt-go" /></a>
	</div>
</section>