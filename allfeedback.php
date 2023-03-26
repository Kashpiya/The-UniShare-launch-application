<?php
session_start();
error_reporting(0);
include('includes/config.php');

// $find="%{$_POST['course']}%";

$user_id = $_SESSION['id'];
// echo $user_id;

$pid = $_GET['id'];

?>

<style>

	.cts{
		cursor: not-allowed !important;
	}

	.rating {
		float: left;
	}

	/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
 follow these rules. Every browser that supports :checked also supports :not(), so
 it doesn’t make the test unnecessarily selective */
	.rating:not(:checked)>input {
		position: absolute;
		top: -9999px;
		clip: rect(0, 0, 0, 0);
	}

	.rating:not(:checked)>label {
		float: right;
		width: 1em;
		padding: 0 .1em;
		overflow: hidden;
		white-space: nowrap;
		cursor: pointer;
		font-size: 200%;
		line-height: 1.2;
		color: #ddd;
		text-shadow: 1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0, 0, 0, .5);
	}

	.rating:not(:checked)>label:before {
		content: '★ ';
	}

	.rating>input:checked~label {
		color: #f70;
		text-shadow: 1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0, 0, 0, .5);
	}

	.rtn {
		float: left;
		width: 100%;
	}

	.rating:not(:checked)>label:hover,
	.rating:not(:checked)>label:hover~label {
		color: gold;
		text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
	}

	.rating>input:checked+label:hover,
	.rating>input:checked+label:hover~label,
	.rating>input:checked~label:hover,
	.rating>input:checked~label:hover~label,
	.rating>label:hover~input:checked~label {
		color: #ea0;
		text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
	}

	.rating>label:active {
		position: relative;
		top: 2px;
		left: 2px;
	}

	.checked {
		color: orange;
	}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Uni Share</title>
	<?php include('includes/links.php')?>
</head>

<body>
	<?php include('includes/header.php')?>


	<section class="shop">
		<div class="col-md-12 mt-100" style="text-align:center; padding:50px;">
			<!-- <h1>Search <span style="color:#E12454">Results</span></h1> -->
		</div>


		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<?php
                        
						$ret=mysqli_query($con,"select * from feedback where pid=$pid ");
                        $num=mysqli_num_rows($ret);

                        if($num>0){
                        
                        while ($row=mysqli_fetch_array($ret)) {
							
						?>

					<div class='col-md-4' style='margin-bottom:30px;'>
						<div class='card'
							style='width: 18rem; text-align:center; box-shadow: 5px 5px 10px #888888; padding: 15px;'>
							<p class="mt-2 mb-1">Name: <?php echo $row['name']; ?></p>
							
							<p>Review: <?php echo $row['review']; ?> </p>
							<hr>
							


                    <?php } }else{?>
                        <p>Nothing FOund</p>
                        <?php } ?>
				</div>
			</div>
		</div>


		<!--Scripts -->
		<?php include('includes/scripts.php')?>
</body>

</html>