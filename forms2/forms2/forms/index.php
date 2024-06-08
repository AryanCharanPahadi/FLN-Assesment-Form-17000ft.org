<?php
session_start();





?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FLN-Assessment Data | <?= '17000ft' ?> - Admin Panel </title>
    <link rel="icon" href="../images/17ft.jpg" type="image/jpg" sizes="20x20">
    <?php include 'include-css.php'; ?>
    <style>
        /* Custom CSS to style the selected button */
        .btn-custom {
            opacity: 0.5;
        }





        .itemClass {
            border: 1px solid #00000021;
            border-radius: 5px;
            height: 28px;

        }

        option {
            font-weight: 600;
        }

        option:hover {
            background-color: lightblue;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        #alert {
            margin-left: 30%;
            margin-right: 50%;
            text-align: center;
            font-weight: 700;
            position: absolute;
            font-size: 13px;
            margin-top: -60px;
            animation: fadeOut 3s ease-in-out forwards;
        }

        .remove-border {
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid black;
            
            outline: none;


        }


        .remove-border2 {
            border: none;
            outline: none;


        }

        .btn {
            margin-top: 15px;

        }

    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php include 'sidebar.php'; ?>
            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <br />
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title " style='border:none'>
                                <h2 style="padding-left: 12px;">Add FLN-Assessment Data</h2>
                                <!--<div class="clearfix"><a href="https://newone.advanceexcel.in/17kadmin/studentManagement/" style="float: right;" class="btn btn-success">Add Student</a></div>-->
                            </div>
                            <!--<div id="alert" class="alert alert-success" role="alert">FLN-Assessment Details Added</div>-->
                            <div class="x_content">
                                <div class="row">
                                    <div class='col-md-12'>
                                        <form id="submit" method="post" enctype="multipart/form-data" action="insert.php">

                                            <div class="container mt-5">
                                                <?php
                                                if (isset($_SESSION['msg'])) { ?>
                                                    </div>
                                                <?php unset($_SESSION['msg']);
                                                }    ?>
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
                                                <div class="form-group" style="padding-left: 12px;">
                                                    <label for="image">Upload Register Photo</label>
                                                    <input type="file" class="form-control-file" id="uploadfile" name="uploadfile" accept="image/*">
                                                </div>


                                                <?php
                                                $classes = ['Nursery', 'LKG', 'UKG', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th']
                                                ?>
                                                <div style="padding-left: 11px;" >
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Grade</th>
                                                                <th style="padding-left: 90px;">Boys</th>
                                                                <th style="padding-left: 90px;">Girls</th>
                                                                <th style="padding-left: 40px;">Total</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php foreach ($classes as $class) { ?>
                                                                <tr>
                                                                    <td ><?php echo $class ?>
                                                                        <input type="hidden" name="class[]" value="<?php echo $class ?>">
                                                                    </td>
                                                                   
                                                                    <div>
                                                                        <div>
                                                                            <td style="padding-right: 10px;"><input  class="remove-border boys nursery form-control " type="number" min="0" name="boys[]"></td>
                                                                        </div>
                                                                    </div>
                                                                    <div >
                                                                        <div>
                                                                            <td style="padding-left: 30px;"><input class="remove-border girls nursery form-control input-gap" type="number" min="0" name="girls[]"></td>
                                                                            <td><span style="margin-left: 50px;"class="remove-border2 total"></span></td>
                                                                        </div>
                                                                    </div>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>



                                                        <tfoot>
                                                            <tr>
                                                                <td>Grand Total</td>
                                                                <td><input  style="margin-left: 50px;" class="remove-border2 grand-total-boys" type="number" id="grandBoys" readonly></td>
                                                                <td><input  style="margin-left: 50px;" class="remove-border2 grand-total-girls" type="number" id="grandGirls" readonly></td>
                                                                <td><input  style="margin-left: 50px;"class="remove-border2 grand-total" type="number" id="grandTotal" readonly></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div class="form-row">
                                                        <div style="padding-left: 2px;"class="form-group col-md-5">
                                                            <label for="remark">Remark</label>
                                                            <input type="text" class="form-control" id="remark" name="remark" placeholder="Remark">
                                                            <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success" onclick="submitForm()" />

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /page content -->


            <!-- footer content -->
            <?php include 'footer.php'; ?>
            <!-- /footer content -->
        </div>
    </div>
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
    <script src="script.js"></script>
</body>

</html>