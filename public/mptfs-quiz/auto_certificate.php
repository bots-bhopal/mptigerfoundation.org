<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

    .score {
        animation-name: example;
        animation-duration: 4s;
        animation-iteration-count: infinite;
    }

    @keyframes example {
        0% {
            color: red;
        }

        25% {
            color: pink;
        }

        50% {
            color: blue;
        }

        75% {
            color: green;
        }

        100% {
            color: orange;
        }
    }
</style>

<?php
// error_reporting(0);

include('includes/connection.inc.php');

if (($_POST['email']) && ($_POST['quiz']) != '') {
    $quiz = $_POST['quiz'];
    $email = $_POST['email'];
    $newgmail = substr($email, -10, 10);
    $newgmail0 = "0" . substr($email, -10, 10);
    $newgmail91 = "+91" . substr($email, -10, 10);
    $sql = "SELECT * FROM $quiz WHERE `c_email`= '$email' || `c_mobile`= '$email' || SUBSTRING(c_mobile, -10) = '$newgmail' || SUBSTRING(c_mobile, -10) = '$newgmail0' || SUBSTRING(c_mobile, -10) = '$newgmail91'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);
    $check_email = $row["c_email"] ?? "";

    if ($rowcount) {
        $id = $row["c_id"] ?? "";
        $c_name = $row["c_name"] ?? "";
        $c_score = $row["c_score"] ?? "";
        $c_email = $row["c_email"] ?? "";
        $c_result = $row['c_result'];
        // $c_address = $row["c_address"]??"";


        $mydata = "<div class='card' style='border:none;'>";
        $mydata .= "<div>";
        $mydata .= "<h4 class='mb-2'>Welcome ! $c_name </h4>";
        $mydata .= "<h4 class='mb-3'>Your Score is : <span class='score'> $c_score </span></h4>";
        // $mydata .= "<p> <strong> Address you mentioned during Quiz submission </strong> </br> $c_address</p>";
        $mydata .= "</div>";

        echo $mydata .= "<div class='d-flex mx-auto mb-5'>
                            <a href='tcpdf\\pdfs\\$quiz\\$c_email.pdf' target='_blank' class='btn btn-dark p-2' style='margin:0px 5px; font-size: 14px; font-weight: 600;' >Open Certificate as PDF</a>
                        </div>";

        if ($quiz == 'cheetah_day_quiz_2022')
        {
                if ($c_result == 1) {
                    $data = <<<EOF
                            <style>
                                .cstm-para{display: block; text-align: justify; line-height: 25px;}
                            </style>
                            <p class="cstm-para">
                            This is to certify that Mr./Ms. <b>$c_name</b> has participated in the <b>"International Cheetah Day Quiz 2022"</b> organized by MP Tiger Foundation Society in December 2022 to create awareness among the common public for the cause of Cheetah and Wildlife Conservation. He/She was among the WINNERS of the quiz. The Society appreciates the participation and wishes them all the best for future endeavours.
                            </p>
                            EOF;
                } else {
                    $data = <<<EOF
                            <style>
                                .cstm-para{display: block; text-align: justify; line-height: 25px;}
                            </style>
                            <p class="cstm-para">
                            This is to certify that Mr./Ms. <b>$c_name</b> has participated in the <b>"International Cheetah Day Quiz 2022"</b> organized by MP Tiger Foundation Society in December 2022 to create awareness among the common public for the cause of Cheetah and Wildlife Conservation. The Society appreciates the participation and wishes them all the best for future endeavours.
                            </p>
                            EOF;
                }

                if (($_POST['email']) == $check_email || $newgmail || $newgmail0 || $newgmail91 && ($_POST['quiz']) && ($_POST['quiz']) != '') {
                    if ($data != '') {
                        require_once 'tcpdf/tcpdf.php';
                        // create new PDF document
                        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->AddPage('L', 'A4');

                        // disable auto-page-break
                        $pdf->SetAutoPageBreak(false, 0);

                        // set bacground image
                        $img_file = 'tcpdf/certificate/cheetah_day_quiz_2022.jpg';
                        $pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

                        $pdf->SetFont('helvetica', 'N', 16);
                        $pdf->SetMargins(13, 10, 26, true);
                        $pdf->SetXY(0, 90);

                        $pdf->writeHTML($data, true, false, true, false, '');

                        /* Server Path */
                        $file_location = "/home/u376743586/domains/mptigerfoundation.org/public_html/public/mptfs-quiz/tcpdf/pdfs/$quiz/" . $check_email . ".pdf";
                        $pdf->Output($file_location, 'F');
                    }
                }
        }else if ($quiz == 'natural_heritage_quiz_2022')
        {
                if ($c_result == 1) {
                    $data = <<<EOF
                            <style>
                                .cstm-para{display: block; text-align: justify; line-height: 25px;}
                            </style>
                            <p class="cstm-para">
                            This is to certify that Mr./Ms. <b>$c_name</b> has participated in the <b>"Our Natural Heritage Quiz 2022"</b> organized by MP Tiger Foundation Society in November 2022 to create awareness among the common public for the cause of Wildlife Conservation. He/She was among the WINNERS of the quiz. The Society appreciates the participation and wishes them all the best for future endeavours.
                            </p>
                            EOF;
                } else {
                    $data = <<<EOF
                            <style>
                                .cstm-para{display: block; text-align: justify; line-height: 25px;}
                            </style>
                            <p class="cstm-para">
                            This is to certify that Mr./Ms. <b>$c_name</b> has participated in the <b>"Our Natural Heritage Quiz 2022"</b> organized by MP Tiger Foundation Society in November 2022 to create awareness among the common public for the cause of Wildlife Conservation. The Society appreciates the participation and wishes them all the best for future endeavours.
                            </p>
                            EOF;
                }

                if (($_POST['email']) == $check_email || $newgmail || $newgmail0 || $newgmail91 && ($_POST['quiz']) && ($_POST['quiz']) != '') {
                    if ($data != '') {
                        require_once 'tcpdf/tcpdf.php';
                        // create new PDF document
                        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->AddPage('L', 'A4');

                        // disable auto-page-break
                        $pdf->SetAutoPageBreak(false, 0);

                        // set bacground image
                        $img_file = 'tcpdf/certificate/natural_heritage_quiz_2022.jpg';
                        $pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

                        $pdf->SetFont('helvetica', 'N', 16);
                        $pdf->SetMargins(13, 10, 26, true);
                        $pdf->SetXY(0, 80);

                        $pdf->writeHTML($data, true, false, true, false, '');

                        /* Server Path */
                        $file_location = "/home/u376743586/domains/mptigerfoundation.org/public_html/public/mptfs-quiz/tcpdf/pdfs/$quiz/" . $check_email . ".pdf";
                        $pdf->Output($file_location, 'F');
                    }
                }
        }
    }else{ ?>
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="margin-top: 60px;">
                        <div class="modal-header">
                            <img src='img/logo/mptfslogo.png' class='mr-2' alt='MPTFS-Logo' width='36' height='36'>
                            <h6 class="modal-title font-weight-bold py-2" id="exampleModalLabel">Message</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body font-weight-bold">
                            <p class="text-dark text-justify font-weight-bold">The Mail ID / Mobile Number you entered doesn't matches with our records.
                                Please ensure that you are entering the exact same Mail ID / Mobile Number which you used at the time of quiz submission. </p>
                            <p class="text-danger text-justify font-weight-bold">For any issues kindly Whatsapp your name / Mail ID / Mobile Number on 9922951184.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $('#exampleModal1').modal('show');
            </script>
        <?php }
    } else { ?>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="margin-top: 60px;">
                    <div class="modal-header">
                        <img src='img/logo/mptfslogo.png' class='mr-2' alt='MPTFS-Logo' width='36' height='36'>
                        <h6 class="modal-title font-weight-bold py-2" id="exampleModalLabel">You have not entered anything</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger text-justify font-weight-bold"> Please select your quiz from list and enter the exact same Mail ID / Mobile Number which you used at the time of quiz submission.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#exampleModal1').modal('show');
        </script>
<?php } ?>

