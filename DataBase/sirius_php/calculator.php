<!doctype html>
<html>
<head>
<?php require_once('connection.php'); ?>
	<title>Калькулятор</title>
</head>
<body>
	<div>
		<?php $id_event = $_GET['event'];
		$days = $_GET['days'];
		$plan_sum = 0;
		$fact_sum = 0;
		$input = 0;
		$i = 0;
		$query = "SELECT * FROM parental_cost WHERE id_event = '$id_event'";
		if ($result = $mysqli->query($query)) {
			while ($row = $result->fetch_assoc()) { ?>
				<div><h3><?=$row['name']?>: </h3>
				<p>Планируемая сумма: <?=$row['plan_sum']?></p>
			<p>Фактическая сумма: <?php if ($row['editing'] == 'можно') {  echo '<input type="text" id="'.$i.'" value="'.$row['fact_sum'].'">'; $i++; }  
			else {?> <?=$row['fact_sum']?>  <?php if ($id_parent > 3){ $fact_sum = $fact_sum +  $row['fact_sum']; }  } ?> </p><?php 
			$id_parent = $row['id'];
			
			if ($id_parent > 3) { $plan_sum = $plan_sum +  $row['plan_sum']; }
			
			$query_child = "SELECT * FROM child_cost WHERE id_parent = '$id_parent'";
		if ($result_child = $mysqli->query($query_child)) {
			while ($row_child = $result_child->fetch_assoc()) { ?>
				<h4><?=$row_child['name']?>: </h4>
				<p>Тип затраты: <?=$row_child['type']?></p>
				<p>Планируемая сумма: <?=$row_child['plan_sum']?></p>
			<p>Фактическая сумма: <?php if ($row_child['editing'] == 'можно') {  echo '<input type="text" id="'.$i.'" value="'.$row_child['fact_sum'].'">'; $i++; }  
			else {?> <?=$row_child['fact_sum']?>  <?php $fact_sum = $fact_sum +  $row['fact_sum']; } ?> </p>
			<?php $plan_sum = $plan_sum +  $row_child['plan_sum'];
			} 
		} ?>
		</div>
		<hr>
			<?php }
		}
		?>
		
		<script>
		var plan_sum = "<?php echo $plan_sum ?>";
		var Fact_sum = "<?php echo $fact_sum ?>";
		</script>
		
		<button id="button">Рассчитать</button>
		<div>Планируемые затраты: <span id="plan_sum"></span></div>
		<div>Фактические затраты: <span id="fact_sum"></span></div>
		
		<script src="script.js"></script>
	</div>		
</body>
</html>