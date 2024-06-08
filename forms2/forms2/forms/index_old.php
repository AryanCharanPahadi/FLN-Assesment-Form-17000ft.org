<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dependent Select Box</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php $url="https://newone.advanceexcel.in/17kadmin/";?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- FavIcon -->
        <link rel="icon"  type="image/png"  href="images/logo-half.png" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!-- NProgress -->
        <link href="<?=$url?>css/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="<?=$url?>css/animate.min.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?=$url?>css/green.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="<?=$url?>css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?=$url?>css/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.min.css" />
        <!-- Light Box CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />
        <!-- Custom Theme Style -->
        <link href="<?=$url?>css/custom.min.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

        <!--  dropzone css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" />
        <!-- Latest compiled and minified CSS - http://bootstrap-table.wenzhixin.net.cn/getting-started/ -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

        <script src="<?=$url?>js/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="<?=$url?>js/bootstrap-table.min.js"></script>
        <script src="<?=$url?>js/bootstrap-table-filter-control.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/extensions/reorder-rows/bootstrap-table-reorder-rows.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/extensions/reorder-rows/bootstrap-table-reorder-rows.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/1.0.3/jquery.tablednd.js"></script>

        <script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/export/bootstrap-table-export.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/mobile/bootstrap-table-mobile.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.4/tinymce.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" integrity="sha256-2kJr1Z0C1y5z0jnhr/mCu46J3R6Uud+qCQHA39i1eYo=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js" integrity="sha256-CgrKEb54KXipsoTitWV+7z/CVYrQ0ZagFB3JOvq2yjo=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" integrity="sha256-2bAj1LMT7CXUYUwuEnqqooPb1W0Sw0uKMsqNH0HwMa4=" crossorigin="anonymous" />

    <style>
        .remove-border {
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid black;
            margin: 2px;
            outline: none;

        }

        td {
            font-weight: 600;
        }

        .remove-border2 {
            border: none;
            outline: none;


        }
    </style>
</head>

<body>
    <form id="submit" method="post" enctype="multipart/form-data" action="insert.php">

        <div class="container mt-5">
            <?php
                    if (isset($_SESSION['msg'])) {
                    ?> <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['msg'];  ?>
                
        </div>
    <?php
                        unset($_SESSION['msg']);

                    }
                    // session_destroy()
    ?>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="state">STATE</label>
            <select id="state" class="form-control" name="state">
                <option value="">Select State</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="district">District</label>
            <select id="district" class="form-control" name="district">
                <option value="">Select District</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="block">Block</label>
            <select id="block" class="form-control" name="block">
                <option value="">Select Block</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="school">School</label>
            <select id="school" class="form-control" name="school">
                <option value="">Select School</option>
            </select>
        </div </div>
    </div>
    <div class="form-group">
        <label for="image">Upload Register Photo</label>
        <input type="file" class="form-control-file" id="uploadfile" name="uploadfile" accept="image/*">
    </div>


    <?php
    $classes = ['Nursery', 'LKG', 'UKG', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th']
    ?>

    <table>
        <thead>
            <tr>
                <th>Grade</th>
                <th>Boys</th>
                <th>Girls</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($classes as $class) { ?>
                <tr>
                    <td><?php echo $class ?>
                        <input type="hidden" name="class[]" value="<?php echo $class ?>">
                    </td>
                    <td><input class="remove-border boys nursery" type="number" min="0" name="boys[]"></td>
                    <td><input class="remove-border girls nursery" type="number" min="0" name="girls[]"></td>
                    <td><span class="remove-border2 total" ></span></td>
                </tr>
            <?php } ?>
        </tbody>



        <tfoot>
            <tr>
                <td>Grand Total</td>
                <td><input class="remove-border2 grand-total-boys" type="number" id="grandBoys" readonly></td>
                <td><input class="remove-border2 grand-total-girls" type="number" id="grandGirls" readonly></td>
                <td><input class="remove-border2 grand-total" type="number" id="grandTotal" readonly></td>
            </tr>
        </tfoot>
    </table>



    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="remark">Remark</label>
            <input type="text" class="form-control" id="remark" name="remark" placeholder="Remark">

        </div>

    </div>
    <div class="form-group">


        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success" onclick="submitForm()" />


    </div>



    </form>



    <script>
        $(document).ready(function() {


            $.ajax({
                url: 'getStates.php',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    // console.log("success");
                    var options = "";
                    for (var i = 0; i < response.length; i++) {
                        var state = response[i]['STATE'];
                        options += "<option value='" + state + "'>" + state + "</option>";
                    }
                    $("#state").append(options);

                },
                error: function() {
                    console.log("error");
                }
            });


            $("#state").change(function() {
                var state = $(this).val();
                $.ajax({
                    url: 'getDistricts.php',
                    type: 'post',
                    data: {
                        STATE: state
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option>Select District</option>";
                        for (var i = 0; i < response.length; i++) {
                            var district = response[i]['DISTNAME'];
                            options += "<option value='" + district + "'>" + district + "</option>";
                        }
                        $("#district").html(options);

                    }
                });
            });


            $("#district").change(function() {
                var district = $(this).val();
                $.ajax({
                    url: 'getBlocks.php',
                    type: 'post',
                    data: {
                        DISTNAME: district
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option>Select District</option>";
                        for (var i = 0; i < response.length; i++) {
                            var block = response[i]['BLOCK_NAME'];
                            options += "<option value='" + block + "'>" + block + "</option>";
                        }
                        $("#block").html(options);

                    }
                });
            });

            $("#block").change(function() {
                var block = $(this).val();
                $.ajax({
                    url: 'getSchools.php',
                    type: 'post',
                    data: {
                        BLOCK_NAME: block
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option>Select School</option>";
                        for (var i = 0; i < response.length; i++) {
                            var school = response[i]['SCHOOL_NAME'];
                            options += "<option value='" + school + "'>" + school + "</option>";
                        }
                        $("#school").html(options);

                    }
                });
            });


        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>