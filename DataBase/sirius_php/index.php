<!doctype html>
<html>
<head>
	<title>Document</title>
	<?php require_once('connection.php'); ?>
</head>
<body>
	<div>
		<div>
		
		<?php $query = "SELECT * FROM region";
		if ($result = $mysqli->query($query)) {
			?>
			<?php
			while ($row = $result->fetch_assoc()) { ?>
				<div><b><?=$row['name']?></b></div><hr>
				<?php $id_region = $row['id'];
			}
		}?>
		</div>
		<div>
		<?php $query = "SELECT * FROM category, connect_region_and_category WHERE category.id = connect_region_and_category.id_category";
		if ($result = $mysqli->query($query)) {
			?>
			<?php
			while ($row = $result->fetch_assoc()) { ?>
				<div><div><?=$row['name']?></div>
				<div><p><?=$row['description']?></p></div>
				<?php $category = $row['id_category'];
				$queryevent = "SELECT * FROM event where id_category = '$category'"; 
				if ($resultevent = $mysqli->query($queryevent)) {
			?>
			<?php
			while ($rowevent = $resultevent->fetch_assoc()) { ?>
				<div>
				<div><p><b>Мероприятие: </b></p></div>
				<div><p><?=$rowevent['name']?></p></div>
				<div><p><b>Форма: </b><?=$rowevent['form']?></p></div>
				<div><p><b>Тип: </b><?=$rowevent['type']?></p></div>
				<div><p><b>Начало мероприятия: </b><?=$rowevent['start_period']?></p></div>
				<div><p><b>Конец мероприятия: </b><?=$rowevent['end_period']?></p></div>
				<div><p><b>Запланированное число участников: </b><?=$rowevent['plan_members']?></p></div>
				<div><p><b>Фактическое число участников: </b><?=$rowevent['fact_members']?></p></div>
				<div><p><b>Проживание: </b><?=$rowevent['housing']?></p></div>
				<div><p><b>Питание: </b><?=$rowevent['food']?></p></div>
				
				</div>
			<?php }
				}?>
				</div><hr>
				<?php
			}
		}?>
		</div>
	</div>
</body>
</html>