<?php
    require 'session.php';
	if (!isset($_SESSION['teacher'])) {
		header('Location: '.SERVER.'');
	}

	$cid     = $_GET['id1'];
	$sid     = $_GET['id2'];
	$stuInfo = getStuIdNameAttendence($cid, $sid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'templates/default/head.php'; ?>
</head>
<body>
  <div id="wrap">
	<main>
	  <div class="container">
		<header>
		  <div class="row">
			<div class="col-md-12">
			  <?php require_once 'templates/default/header.php'; ?>
			</div>
		  </div>
		</header>
		<hr />
		<section>
		  <div class="row">
			<div class="col-md-12">
			  <div class="text-center">
				<?php if(isset($_GET['err']) && $_GET['err'] == 1): ?>
				  <label class="text-danger">
					**You cannot enter this mark Twice!
				  </label>
				<?php endif; ?>
				<h3>
				  <ins>
					<a href="<?= SERVER; ?>/teacher/course/<?= htmlentities(stripcslashes($_GET['id1']), ENT_QUOTES, 'UTF-8'); ?>">
					  <?= getCourseName($_GET['id1']) ?>
					</a>
				  </ins>
				</h3>
				<br />
				<h4>
				  <?php $value = explode('|', $stuInfo); ?>
				    ID: <a href="<?= SERVER ?>/course/<?= $cid ?>/students"><span class="text-primary"><?= $value[0]; ?></span></a>&nbsp;&nbsp;&nbsp;&nbsp;Name: <span class="text-primary"><?= $value[1]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Attendence: <span class="text-primary"><?= $value[2]; ?></span>
				</h4>
				<br/><br/>
				<h1><i><ins>Mid Term</ins></i></h1>
				<br/><br/>
			  </div>
				<div class="col-md-12">

				  <!-- ==========
				  	   Quiz 1
				  =========== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Quiz 1 marks">
						  <b><i>Quiz 1:&nbsp;</i></b><?php $q1 ='quiz1'; echo showMarks($_GET['id1'], $_GET['id2'], $q1); ?>
						</span>
					  </div>
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/markConfirm?name=quiz1" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.50"
								   min="0"
								   max="20"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Quiz 1"
								   required="required" />
							<button type="submit"
									name="addMarks"
									class="btn btn-success"
									data-toggle="tooltip"
									data-placement="top"
									title="Add">
							  <span class="glyphicon glyphicon-plus"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-info"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Edit"
							 href="<?= SERVER; ?>/editmarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q1 ?>">
							  <span class="glyphicon glyphicon-edit"></span>
						  </a>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-danger"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Delete"
							 href="<?= SERVER; ?>/deletemarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q1 ?>">
							  <span class="glyphicon glyphicon-trash"></span>
						  </a>
						</form>
					  </div>
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- /Quiz 1 -->

				  <hr />

				  <!-- ==========
				   	   Quiz 2
				  =========== -->
				  <div class="row">
					<div class="col-sm-12 col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Quiz 2 marks">
						  <b><i>Quiz 2:&nbsp;</i></b><?php $q2 = 'quiz2'; echo showMarks($_GET['id1'], $_GET['id2'], $q2); ?>
						</span>
					  </div>
					  <div class="col-sm-5 col-xs-6 inline-form">
					    <form action="<?= SERVER; ?>/controller/markConfirm?name=quiz2" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.50"
								   min="0"
								   max="20"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Quiz 2"
								   required="required"/>
							<button type="submit"
									name="addMarks"
									class="btn btn-success"
									data-toggle="tooltip"
									data-placement="top"
									title="Add">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-info"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Edit"
							 href="<?= SERVER; ?>/editmarks?id1=<?= $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?= $q2 ?>">
							  <span class="glyphicon glyphicon-edit"></span>
						  </a>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-danger"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Delete"
							 href="<?= SERVER; ?>/deletemarks?id1=<?= $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?= $q2 ?>">
							  <span class="glyphicon glyphicon-trash"></span>
						  </a>
						</form>
					  </div>
					</div>
				  </div>
				  <!-- /Quiz 2 -->

				  <hr />

				  <!-- ==========
					   Quiz 3
				  =========== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Quiz 3 marks">
						  <b><i>Quiz 3: </i></b><?php $q3 = 'quiz3'; echo showMarks($_GET['id1'], $_GET['id2'], $q3); ?>
						</span>
					  </div>
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/markConfirm?name=quiz3" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.50"
								   min="0"
								   max="20"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Quiz 3"
								   required="required" />
							<button type="submit"
									name="addMarks"
									data-toggle="tooltip"
									data-placement="top"
									title="Add"
									class="btn btn-success">
							  <span class="glyphicon glyphicon-plus"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-info"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Edit"
							 href="<?= SERVER; ?>/editmarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q3 ?>">
							  <span class="glyphicon glyphicon-edit"></span>
						  </a>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-danger"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Delete"
							 href="<?= SERVER; ?>/deletemarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q3 ?>">
							  <span class="glyphicon glyphicon-trash"></span>
						  </a>
						</form>
					  </div>
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- /Quiz 3 -->

				  <hr />

				  <!-- ============================
					   Mid term best two Quizes
				  ============================= -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Suggested Sum of best 2 quizes">
						  Suggested Best Two: <b><?php echo getBestTwoQuizesMarks($q1, $q2, $q3, $_GET['id1'], $_GET['id2']) ?></b>
						</span>&nbsp;&nbsp;&nbsp;&nbsp;
						<span title="">
						  You've Given: <b><?php $givenMidQuizesMark = showMidBestTwo($_GET['id1'], $_GET['id2']); echo $givenMidQuizesMark; ?></b>
						</span>
					  </div>
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/addMarks" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.01"
								   min="0"
								   max="40"
								   name="mark"
								   id='bestTwoMid'
								   class="onlyFloat form-control" placeholder="Best Two" required="required"/>
							<button type="submit"
									name="addMidBestTwo"
									data-toggle="tooltip"
									data-placement="top"
									title="Edit"
									class="btn btn-warning">
							  <span class="glyphicon glyphicon-edit"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div>
						</form>
					  </div>
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- /Mid term best two Quizes -->

				  <hr />

				  <!-- =================
					   Mid Term Exam
				  ================== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Mid Term marks">
						  <b><i>Mid Term:&nbsp;</i></b><?php $mid = 'mid'; $midMarks = showMarks($_GET['id1'], $_GET['id2'], $mid); echo $midMarks; ?>
						</span>
					  </div><!-- /.col-xs-6 -->
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/markConfirm?name=mid" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.50"
								   min="0"
								   max="40"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Mid Term"
								   required="required" />
							<button type="submit"
									name="addMarks"
									data-toggle="tooltip"
									data-placement="top"
									title="Add"
									class="btn btn-success">
							  <span class="glyphicon glyphicon-plus"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-info"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Edit"
							 href="<?= SERVER; ?>/editmarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $mid ?>">
							  <span class="glyphicon glyphicon-edit"></span>
						  </a>
						</form>
					  </div><!-- /.col-xs-6 -->
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->

				  <hr />

				  <!-- ==================
				       Mid Term Total
				  =================== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Suggested Mid Term Total">Suggested Mid Term Total:
						  <b><?php $SuggestedMidMark = calculateTermTotal($q1, $q2, $q3, $mid, $_GET['id1'], $_GET['id2']); echo $SuggestedMidMark; ?></b>
						</span>(old)&nbsp;&nbsp;&nbsp;&nbsp;
						<b><?php $newSuggestedMidMark = newSuggestedMid($givenMidQuizesMark, $midMarks); echo $newSuggestedMidMark; ?></b>(new)&nbsp;&nbsp;&nbsp;&nbsp;
						<span title="Your Given Marks">You've Given: <b><?php $midTotalMarks = showMidTotal($_GET['id1'], $_GET['id2']); echo $midTotalMarks; ?></b></span>
					  </div><!-- /.col-xs-6 -->
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/addMarks" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.01"
								   min="0"
								   max="100"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Total"
								   required="required" />
							<button type="submit"
									name="addMidTotal"
									data-toggle="tooltip"
									data-placement="top"
									title="Edit"
									class="btn btn-warning">
								<span class="glyphicon glyphicon-edit"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>
					  </div><!-- /.col-xs-6 -->
					</div><!-- /.col-xs-12 -->
				  </div>
				  <!-- Mid Term Total -->

				  <hr />

				  <!-- ==================
					   Mid Term Grade
				  =================== -->
				  <div class="text-center">
					<div class="row">
					  <div class="col-sm-12">
						<span title="Suggested Mid Term Grade">Suggested Mid Term Grade: <b><?= suggestedGrade($SuggestedMidMark); ?></b></span>(old)&nbsp;&nbsp;&nbsp;&nbsp;
						<span><b><?= suggestedGrade($newSuggestedMidMark); ?></b></span>(new)&nbsp;&nbsp;&nbsp;&nbsp;
						<span title="Your Given Marks">You've Given: <b><?php $midTermGrade = suggestedGrade($midTotalMarks); echo $midTermGrade; ?></b></span>
						<?php addMidTermGrade($midTermGrade, $_GET['id1'], $_GET['id2']); ?>
					  </div>
					</div>
				  </div>
				  <!-- /Mid Term Grade -->

				  <br /><br />
				  <h1 class="text-center"><i><ins>Final Term</ins></i></h1>
				  <br/><br/>

				  <!-- ==========
					   Quiz 4
				  =========== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Quiz 4 marks">
						  <b><i>Quiz 4:&nbsp;</i></b><?php $q4 = 'quiz4'; echo showMarks($_GET['id1'], $_GET['id2'], $q4); ?>
						</span>
					  </div><!-- /.col-xs-6 -->
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/markConfirm?name=quiz4" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.50"
								   min="0"
								   max="20"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Quiz 4"
								   required="required" />
							<button type="submit"
									name="addMarks"
									data-toggle="tooltip"
									data-placement="top"
									title="Add"
									class="btn btn-success">
							  <span class="glyphicon glyphicon-plus"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-info"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Edit"
							 href="<?= SERVER; ?>/editmarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q4 ?>">
							  <span class="glyphicon glyphicon-edit"></span>
						  </a>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-danger"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Delete"
							 href="<?= SERVER; ?>/deletemarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q4 ?>">
							  <span class="glyphicon glyphicon-trash"></span>
						  </a>
						</form>
					  </div><!-- /.col-xs-6 -->
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- /Quiz 4 -->

				  <hr />

				  <!-- ==========
					   Quiz 5
				  =========== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Quiz 5 marks">
						  <b><i>Quiz 5:&nbsp;</i></b><?php $q5 = 'quiz5'; echo showMarks($_GET['id1'], $_GET['id2'], $q5); ?>
						</span>
					  </div><!-- /.col-xs-6 -->
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/markConfirm?name=quiz5" method="post">
						  <div class="form-inline">
						    <input type="number"
								   step="0.50"
								   min="0"
								   max="20"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Quiz 5"
								   required="required" />
							<button type="submit"
									name="addMarks"
									data-toggle="tooltip"
									data-placement="top"
									title="Add"
									class="btn btn-success">
							  <span class="glyphicon glyphicon-plus"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-info"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Edit"
							 href="<?= SERVER; ?>/editmarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q5 ?>">
							  <span class="glyphicon glyphicon-edit"></span>
						  </a>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-danger"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Delete"
							 href="<?= SERVER; ?>/deletemarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q5 ?>">
							  <span class="glyphicon glyphicon-trash"></span>
						  </a>
						</form>
					  </div><!-- /.col-xs-6 -->
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- Quiz 5 -->

				  <hr />

				  <!-- ==========
					   Quiz 6
				  =========== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Quiz 6 marks">
						  <b><i>Quiz 6:&nbsp;</i></b><?php $q6 = 'quiz6'; echo showMarks($_GET['id1'], $_GET['id2'], $q6); ?>
						</span>
					  </div><!-- /.col-xs-6 -->
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/markConfirm?name=quiz6" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.50"
								   min="0"
								   max="20"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Quiz 6"
								   required="required" />
							<button type="submit"
									name="addMarks"
									data-toggle="tooltip"
									data-placement="top"
									title="Add"
									class="btn btn-success">
							  <span class="glyphicon glyphicon-plus"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-info"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Edit"
							 href="<?= SERVER; ?>/editmarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q6 ?>">
							  <span class="glyphicon glyphicon-edit"></span>
						  </a>
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-danger"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Delete"
							 href="<?= SERVER; ?>/deletemarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $q6 ?>">
							  <span class="glyphicon glyphicon-trash"></span>
						  </a>
						</form>
					  </div><!-- /.col-xs-6 -->
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- Quiz 6 -->

				  <hr />

				  <!-- ==================
					   Final Best Two
				  =================== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Sum of best 2 quizes of Final">
						  Best Two: <b><?php echo getBestTwoQuizesMarks($q4, $q5, $q6, $_GET['id1'], $_GET['id2']) ?></b>
						</span>&nbsp;&nbsp;&nbsp;&nbsp;
						<span title="Your Given Marks">
						  You've Given: <b><?php $givenFinalBestTwo = showFinalBestTwo($_GET['id1'], $_GET['id2']); echo $givenFinalBestTwo; ?></b>
						</span>
					  </div>
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/addMarks" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.01"
								   min="0"
								   max="40"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Best Two"
								   required="required" />
							<button type="submit"
									name="addFinalBestTwo"
									data-toggle="tooltip"
									data-placement="top"
									title="Edit"
									class="btn btn-warning">
								<span class="glyphicon glyphicon-edit">
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>
					  </div><!-- /.col-xs-6 -->
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- /Final Best Two -->

				  <hr />

				  <!-- ==============
				       Final Term
				  =============== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Final Term marks">
							<b><i>Final Term:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $final = 'final'; $showFinalMarks = showMarks($_GET['id1'], $_GET['id2'], $final); echo $showFinalMarks; ?>
						</span>
					  </div><!-- /.col-xs-6 -->
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/markConfirm?name=final" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.50"
								   min="0"
								   max="40"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Final Term"
								   required="required" />
							<button type="submit"
									name="addMarks"
									class="btn btn-success"
									data-toggle="tooltip"
									data-placement="top"
									title="Add">
							  <span class="glyphicon glyphicon-plus"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>&nbsp;&nbsp;
						<form>
						  <a class="btn btn-info"
							 data-toggle="tooltip"
							 data-placement="top"
							 title="Edit"
							 href="<?= SERVER; ?>/editmarks?id1=<?= $_GET['id1'] ?>&id2=<?= $_GET['id2'] ?>&id3=<?= $final ?>">
							  <span class="glyphicon glyphicon-edit"></span>
						  </a>
						</form>
					  </div><!-- /.col-xs-6 -->
					</div><!-- col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- /Final Term -->

				  <hr />

				  <!-- ====================
				 	   Final Term Total
				  ===================== -->
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Suggested Final Term Total">Suggested Final Term Total: <b>
						<?php $SuggestedFinalMark = calculateTermTotal($q4, $q5, $q6, $final, $_GET['id1'], $_GET['id2']);
						    echo $SuggestedFinalMark; ?></b></span>(old)&nbsp;&nbsp;&nbsp;&nbsp;
						  <b><?php $newSuggestedMidMark = newSuggestedMid($givenFinalBestTwo, $showFinalMarks); echo $newSuggestedMidMark; ?></b>(new)&nbsp;&nbsp;&nbsp;&nbsp;
						  <span title="Your Given Marks">
							  You've Given: <b><?php $finalTotalMarks = showFinalTotal($_GET['id1'], $_GET['id2']); echo $finalTotalMarks; ?></b>
						  </span>
					  </div><!-- /.col-xs-6 -->
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/addMarks" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.01"
								   min="0"
								   max="100"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Total"
								   equired="required" />
							<button type="submit"
									name="addFinalTotal"
									data-toggle="tooltip"
									data-placement="top"
									title="Edit"
									class="btn btn-warning">
							  <span class="glyphicon glyphicon-edit"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>
					  </div>
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- /Final Term Total -->

				  <hr />

				  <!-- ====================
					   Final Term Grade
				  ===================== -->
				  <div class="row text-center">
					<div class="col-sm-12">
					  <span title="Suggested Final Term Grade">
						Suggested Final Term Grade: <b><?php echo suggestedGrade($SuggestedFinalMark); ?></b>
					  </span>(old)&nbsp;&nbsp;&nbsp;&nbsp;
					  <span>
						<b><?= suggestedGrade($newSuggestedMidMark); ?></b>
					  </span>(new)&nbsp;&nbsp;&nbsp;&nbsp;
					  <span title="Your Given Marks">
						You've Given: <b><?php $finalTermGrade = suggestedGrade($finalTotalMarks); echo $finalTermGrade; ?></b>
					  </span>
					  <?php addGradeFinal($finalTermGrade, $_GET['id1'], $_GET['id2']); ?>
					</div><!-- /.col-sm-12 -->
				  </div><!-- /.row -->
				  <!-- /Final Term Grade -->

				  <br /><br />

				  <!-- ===============
					   Grand Total
				  ================ -->
				  <h1 class="text-center">
					<i><ins>Grand Total</ins></i>
				  </h1>
				  <br/><br/>
				  <div class="row">
					<div class="col-xs-12">
					  <div class="col-sm-7 col-xs-6">
						<span title="Grand Total Marks">
						  Suggested Grand Total: <b><?php $grandTotalMark = getTotalMark($q1, $q2, $q3, $mid, $q4, $q5, $q6, $final, $_GET['id1'], $_GET['id2']); echo $grandTotalMark; ?></b>(old)
						</span>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php $newGrandTotalMark = newSuggestedGrandTotal($midTotalMarks, $finalTotalMarks); echo $newGrandTotalMark; ?></b>(new)&nbsp;&nbsp;&nbsp;&nbsp;
						<span title="Your Given Marks">
						  You've Given: <b><?php $grandTotalMarksByTeacher = showGrandTotal($_GET['id1'], $_GET['id2']); echo $grandTotalMarksByTeacher; ?></b>
						</span>
					  </div><!-- /.col-xs-6 -->
					  <div class="col-sm-5 col-xs-6 inline-form">
						<form action="<?= SERVER; ?>/controller/addMarks" method="post">
						  <div class="form-inline">
							<input type="number"
								   step="0.01"
								   min="0"
								   max="100"
								   name="mark"
								   class="onlyFloat form-control"
								   placeholder="Grand Total"
								   required="required"
								   style="width: 120px;" />
							<button type="submit"
									name="addGrandTotal"
									class="btn btn-warning">
							  <span class="glyphicon glyphicon-edit"></span>
							</button>
							<input type="hidden" name="cid" value="<?= $_GET['id1']; ?>"/>
							<input type="hidden" name="sid" value="<?= $_GET['id2']; ?>"/>
							<?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y/m/d h:i:sa'); ?>
							<input type="hidden" name="date" value="<?= $date; ?>"/>
						  </div><!-- /.form-inline -->
						</form>
					  </div><!-- /.col-xs-6 -->
					</div><!-- /.col-xs-12 -->
				  </div><!-- /.row -->
				  <!-- /Grand Total -->

				  <hr />

				  <!-- =====================
					   Grand Total Grade
				  ====================== -->
				  <div class="row text-center">
					<div class="col-sm-12">
					  <span title="Suggested Grand Final Grade">
						Suggested Grand Total Grade: <b><?= suggestedGrade($grandTotalMark); ?></b>
					  </span>(old)&nbsp;&nbsp;&nbsp;&nbsp;<b><?= suggestedGrade($newGrandTotalMark); ?></b>(new)&nbsp;&nbsp;&nbsp;&nbsp;
					  <span title="Your Given Marks">
						You've Given: <b><?php $grandTotalGrade = suggestedGrade($grandTotalMarksByTeacher); echo $grandTotalGrade ?></b>
					  </span>
					  <?php addGradeGrandTotal($grandTotalGrade, $_GET['id1'], $_GET['id2']); ?>
					</div><!-- /.col-sm-12 -->
				  </div><!-- /.row -->
				  <!-- /Grand Total Grade -->
				</div>
			</div>
		  </div>
		</section>
	  </div><!-- /.container -->
	</main>
  </div><!-- /#wrap -->
  <?php require_once 'templates/default/footer.php' ?>
</body>
</html>