<?php include("connect_db.php");

$id = 369;
$sql = "SELECT a.*, c.name course_name
        FROM bookings a 
        JOIN `courses` c ON c.id = a.course
        WHERE a.id = ".$id;
//$sql = "SELECT * FROM bookings WHERE id = $id";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
}
$data = $data[0];
?>

<?php include("confirm_booking_header.php");?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Confirm Booking
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i>Confirm Booking</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Booking Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <form action="confirm_booking.php" method="post">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <input id="id" name="id" value="<?=$data['id'];?>" hidden>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Booking Number</label>
                                            <input class="form-control" id="booking_number" name="create[booking_number]" value="<?=$data['booking_number']?>" placeholder="Booking Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Lesson Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="lessonDate" value="<?=$data['lessonDate']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone Number</label>
                                            <input class="form-control" id="phone" name="create[phone]" placeholder="Phone Number" value="<?=$data['phone']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Postal Code</label>
                                            <input class="form-control" id="postal" name="create[postal]" placeholder="Postal Code" value="<?=$data['postal']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Theory Test</label>
                                            <input class="form-control" id="theoryTest" value="<?=$data['theoryTest']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Course</label>
                                            <input class="form-control" id="course" value="<?=$data['course_name']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input class="form-control" id="name" name="create[name]" placeholder="Name" value="<?=$data['name']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input class="form-control" id="email" name="create[email]" placeholder="Email" value="<?=$data['email']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Transmission</label>
                                            <input class="form-control" id="transmission" value="<?=$data['transmission']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <input class="form-control" id="payment_status" value="<?=$data['payment_status']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Practical Test</label>
                                            <input class="form-control" id="practicalTest" value="<?=$data['practicalTest']?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" style="width: 20%; float: right" class="btn btn-block btn-primary">Confirm</button>
                            </div>
                        </form>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php include("common_footer.php");?>
