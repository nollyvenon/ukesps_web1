<?php
include_once("z_db.php");
if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}


$application_title = decrypt(str_replace(" ", "+", $_GET['search_text']));
$search_town = decrypt(str_replace(" ", "+", $_GET['search_town']));
$minsalary = decrypt(str_replace(" ", "+", $_GET['minsalary']));
$maxsalary = decrypt(str_replace(" ", "+", $_GET['maxsalary']));
$sector_name = decrypt(str_replace(" ", "+", $_GET['sector_name']));
$studylevel_name = decrypt(str_replace(" ", "+", $_GET['sl_name']));
$jobexperience_name = decrypt(str_replace(" ", "+", $_GET['jobexperience_name']));
$joblevel_name = decrypt(str_replace(" ", "+", $_GET['joblevel_name']));
$skill_name = decrypt(str_replace(" ", "+", $_GET['skill_name']));

$content = $recruit_object->cv_search($application_title, $search_town, $minsalary, $maxsalary, $sector_name, $studylevel_name, $jobexperience_name, $joblevel_name, $skill_name);
// var_dump($content);
// die();
$applic_list = $recruit_object->all_applicant_lists($recruiter_code);
if (isset($_POST['add_to_list'])) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = $db_handle->sanitizePost(trim($value));
    }
    extract($_POST);
    $list_id = $_POST['list_id'];
    if (isset($_POST['select_appl'])) {
        foreach ($_POST['select_appl'] as $select_appl_code) {
            foreach ($_POST['list_id'] as $list_ids) {
                $recruit_object->add_to_list($list_ids, $select_appl_code);
                $message_error = "The applicant(s) have been added to the list.";
            }
        }
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/main.css">

    <link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/bootstrap2.min.css">
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="../js/jquery.min.js"></script>
    <!--styles -->

</head>

<body class="">
    <?php include_once('../recru_panel/header.php'); ?>
    <div class="page-content sitemap container container-fluid clear-fix">

        <div class="col-12">
            <h4>CV Search Results</h4>
            <?php include_once("../layouts/feedback_message.php"); ?>
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <?php include_once("../layouts/feedback_message.php"); ?>

                    <table class="table table-responsive table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Applicant Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Desired Salary</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Appl. Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($content) && !empty($content)) {
                                foreach ($content as $row) { ?>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" readonly id="select_appl" value="<?php echo $row['applicant_code']; ?>" name="select_appl[]"></td>
                                        <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                        <td><?php echo $row['appl_email']; ?></td>
                                        <td><?php echo $row['application_title']; ?></td>
                                        <td><?php echo $row['desired_salary']; ?></td>
                                        <td><?php echo $row['location']; ?></td>
                                        <td><?php echo applicant_status($row['appl_status']); ?></td>
                                        <td><?php echo date('d M, Y', strtotime($row['timestamp'])); ?></td>
                                        <td><a class="btn btn-border green" title="Applicant Details" href="application_det?hiss=<?php echo encrypt($row['appl_id']); ?>"><span> <i class="fa fa-briefcase"></i></span></a>
                                            <a class="btn btn-border blue" data-toggle="tooltip" title="Add to List" href="add_to_list?hiss=<?php echo encrypt($row['appl_id']); ?>"><span> <i class="fa fa-book"></i></span></a>
                                            <a href=\"#myModal\" class=\"\" title="Contact Applicant" data-toggle=\"modal\" data-id=\"<?php echo $row['applicant_code']; ?>\"><i class="fa fa-compass"></i></a>
                                        </td>
                                    </tr>
                            <?php }
                            } else {
                                echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>";
                            } ?>
                        </tbody>
                    </table>
                    <!-- pagination -->
                    <div class="page-pagination clear-fix">
                        <!-- <?php $pg = intval($_GET['pg']);
                                if ($pg > 1) { ?>
                            <a href="?pg=<?= $pg - 1; ?>"><i class="fa fa-angle-double-left"></i></a>
                            <a href="?pg=<?= $pg; ?>" class="active"><?= $pg; ?></a>
                        <?php } ?>

                        <a href="?pg=<?= $pg + 1; ?>"><?= $pg + 1; ?></a>

                        <a href="?pg=<?= $pg + 2; ?>"><?= $pg + 2; ?></a>

                        <a href="?pg=<?= $pg + 3; ?>"><i class="fa fa-angle-double-right"></i></a> -->
                    </div>
                    <!-- / pagination -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <a href=\"#ConfirmListAdd\" class=\"\" title="Add to Applicant List" data-toggle=\"modal\"><span>Add to List <i class="fa fa-book"></i></span></a>
                        <input type="submit" class="cws-button bt-color-3 border-radius" name="submit" value="Save Search" />

                    </form>

                </div>
                <?php include_once('recru_sidebar.php'); ?>
            </div>



        </div>


    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form id="form1" name="form1" method="post" action="">
                        <input name="hidappl_code" type="hidden">
                        <!--<div class="fetched-data"></div>-->
                        <div class="col-md-12 col-sm-12 col-xs-12 mail_view_info">

                            <div class="form-group mail_cc_bcc">
                                <label class="form-label" for="field-1">To:</label>
                                <span class="desc">e.g. "someemail@example.com"</span>
                                <div class="controls">
                                    <input type="text" name="mailto" class="form-control mail_compose_to" value="" />
                                </div>
                            </div>

                            <div class="form-group mail_compose_cc">
                                <label class="form-label" for="field-1">Template:</label>
                                <div class="controls">
                                    <select name="email_template" data-required="true">
                                        <option value="">Select A Template</option>
                                        <?php
                                        foreach ($email_templates as $row2) :
                                        ?>
                                            <option value="<?php echo $row2['template_id']; ?>">
                                                <?php echo $row2['template_name']; ?>
                                            </option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="field-1">Subject:</label>
                                <span class="desc">e.g. "Meeting in 1st week"</span>
                                <div class="controls">
                                    <input type="text" name="subject" class="form-control" value="" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="field-1">Message:</label>
                                <textarea name="message" class="mail-compose-editor" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace('message', {
                                        filebrowserBrowseUrl: '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                                        filebrowserUploadUrl: '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                                        "filebrowserImageUploadUrl": "../xadmin/ckeditor/plugins/imgupload/imgupload.php"
                                    });
                                </script>
                            </div>


                        </div>

                </div>
                <div class="modal-footer">
                    <button name="send2" type="submit" class="btn btn-primary">
                        <i class="fa fa-paper-plane-o icon-xs"></i> &nbsp; SEND
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

                </form>
            </div>

        </div>

        <div id="ConfirmListAdd" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add to Applicant List</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form1" name="form1" method="post" action="">
                            <input name="hidappl_code1" type="hidden">
                            <!--<div class="fetched-data"></div>-->
                            <div class="col-md-12 col-sm-12 col-xs-12 mail_view_info">

                                <div class="form-group mail_cc_bcc">
                                    <a href="new_applicant_list.php" class="btn btn-danger">New Applicant List</a>
                                    Are you sure you want add the above persons to this list?
                                    <div class="form-group">
                                        <p>Mailing List</p>
                                        <table class="table table-responsive table-striped table-bordered table-hover">
                                            <?php if (isset($applic_list) && !empty($applic_list)) {
                                                foreach ($applic_list as $row) { ?>
                                                    <tr>
                                                        <td width="10%"><input class="form-check-input" type="checkbox" id="select_appl" value="<?php echo $row['list_id']; ?>" name="list_id[]"></td>
                                                        <td><?php echo $row['list_name']; ?></td>
                                                        <td><?php echo limit_text($row['description'], 20); ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button name="add_to_list" type="submit" class="cws-button bt-color-2 border-radius">
                                <i class="fa fa-paper-plane-o icon-xs"></i> &nbsp; ADD TO LIST
                            </button>
                            <input name="reset" type="reset">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('footer.php'); ?>
        <script type='text/javascript' src='../js/jquery.validate.min.js'></script>
        <script src="../js/jquery.form.min.js"></script>
        <script src="../js/TweenMax.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/jquery.isotope.min.js"></script>

        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/jquery-ui.min.js"></script>
        <script src="../js/jflickrfeed.min.js"></script>
        <script src="../js/jquery.tweet.js"></script>

        <script src="../js/jquery.fancybox.pack.js"></script>
        <script src="../js/jquery.fancybox-media.js"></script>
        <script src="../js/retina.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myModal').on('show.bs.modal', function(e) {
                    var rowid = $(e.relatedTarget).data('id');
                    $.ajax({
                        type: 'post',
                        url: 'modal_applicant_code.php', //Here you will fetch records 
                        data: 'rowid=' + rowid, //Pass $id
                        success: function(data) {
                            //$('.fetched-data').html(data);//Show fetched data from database
                            $("input[name='hidappl_code']").val(data);
                        }
                    });
                });
            });
        </script>
</body>

</html>