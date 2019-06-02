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
				<div><?=$row['name']?></div><hr>
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
				
				</div><hr>
				<?php
			}
		}?>
		</div>
		<div>
		
		</div>
		<div>
		
		</div>
		<div>
		
		</div>
	</div>
</body>
</html>