<?php require 'session.php';
	if(!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])){
		header('Location: '.SERVER.'');
	}
	$outputString = getStudentListExam($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once 'head.php'; ?>
	</head>
	<body>
        <div id="wrap">
            <main>
                <div class="container">
                    <header>
                        <div class="row">
                            <div class="col-md-12">
                                <?php require_once 'header.php'; ?>
                            </div>
                        </div>
                    </header>
                </div>
                <hr />
                <div class="container">
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <h3><ins><?php echo getCourseName($_GET['id']) ?></ins></h3>
                                </div><br />
                                <?php if(!count($outputString)): ?>
                                    <h3>No Data Found.</h3>
                                <?php else: ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No.</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th class="text-center">Mid</th>
                                        <th class="text-center">Final</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($outputString as $value): ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $value['s_aiub_id']; ?></td>
                                                    <td><?php echo $value['s_full_name']; ?></td>
                                                    <td class="text-center"><?php echo $value['mid_grade']; ?></td>
                                                    <td class="text-center"><?php echo $value['final_grade']; ?></td>
                                                    <td class="text-center"><?php echo $value['grand_final_grade']; ?></td>
                                                    <td class='text-center'>
                                                        <a class='btn btn-info' href='<?php echo SERVER;?>/course/<?php echo $_GET['id']; ?>/marks/<?php echo $value['s_id']; ?>' data-toggle="tooltip" data-placement="top" title="Mark Details"><span class='glyphicon glyphicon-info-sign font17 hidden-md hidden-sm'></span><span class="hidden-xs">  Details</span></a>
                                                    </td>
                                                </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
        <footer>
            <hr />
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php require_once 'footer.php' ?>
                    </div>
                </div>
            </div>
        </footer>
	</body>
</html>
<script src="<?php echo SERVER;?>/assets/js/custom.js"></script>