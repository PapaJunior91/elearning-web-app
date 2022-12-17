<html>
<head>
    <title>Generate PDF using Dompdf</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
	<div class="container box">
		<h2 class="text-center text-primary">Generate PDF using Dompdf</h3>
		<br />
		<?php
		if(isset($users_data))
		{
		?>
			<table class="table table-bordered table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>View</th>
					<th>View in PDF</th>
				</tr>
			<?php
			foreach($users_data as $row)
			{
				echo '
				<tr>
					<td>'.$row->user_id.'</td>
					<td>'.$row->username.'</td>
					<td><a href="'.base_url().'index.php/pdf_controller/details/'.$row->user_id.'">View</a></td>
					<td><a href="'.base_url().'index.php/pdf_controller/pdfdetails/'.$row->user_id.'">View in PDF</a></td>
				</tr>
				';
			}
			?>
			</table>
		<?php
		}
		if(isset($user_details))
		{
			echo $user_details;
		}
		?>
	</div>
</body>
</html>
