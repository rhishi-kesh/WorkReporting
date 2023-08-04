<?php

include "config.php";
session_start();
if(isset($_POST['report_btn'])){
    $work_date = $_POST['work_date'];
    $date = date('d-m-Y', strtotime($work_date));
    $sql = "SELECT * FROM `work_tbl` LEFT JOIN user_table ON work_tbl.emp_id = user_table.id WHERE work_date = '$work_date'";
    $query = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($query);
    if($rows){
        $html = '<table border="1" width="100%" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Scale</th>
                            <th>Work Date</th>
                            <th colspan="3">Work Description</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $count = 0;
                    while($row = mysqli_fetch_assoc($query)){
        $html .= '<tr>
                    <td>'. ++$count .'</td>
                    <td>'. $row['fullname'] .'</td>
                    <td>'. $row['user_des'] .'</td>
                    <td>'. $row['user_scale'] .'</td>
                    <td>'. $date .'</td>
                    <td colspan="3">'. $row['work_desc'] .'</td>
                </tr>';
                    }
        $html .= '    </tbody>
                    </table>';
        require_once __DIR__ . '/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf(['format'=>'A4-L']);
        $mpdf->SetHTMLHeader("<h2 style='text-align: center; text-transform: uppercase; font-family: sans-serif;'>Work Reporting System</h2>");
        $mpdf->WriteHTML($html);
        $mpdf->SetHTMLFooter("<p style='text-align: center; text-transform: uppercase; font-family: sans-serif;'>{PAGENO}</p>");
        $file = "report.pdf";
        $mpdf->Output($file,'I');
    }else{
        $error = $_SESSION['error'] = "No work found in your selected date";
        header("Location: admin_profile.php");
    }
}

?>