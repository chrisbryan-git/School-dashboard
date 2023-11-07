<?php
if (isset($_POST['button'])) {
    require_once('tcpdf/tcpdf.php');

    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $obj_pdf->SetCreator(PDF_CREATOR);

    $obj_pdf->SetTitle("REPORT CARD");

    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);

    $obj_pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

    $obj_pdf->SetFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $obj_pdf->SetDefaultMonospaceFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_BOTTOM);

    $obj_pdf->SetMargin(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);
    $obj_pdf->SetPrintHeader(false);
    $obj_pdf->SetPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->setFont('helvetica', '', 12);
    $obj_pdf->AddPage();

    // Start buffering the output
    ob_start();

    // Include the HTML content
    include('report_card_html.php');

    // Get the buffered HTML content
    $content = ob_get_clean();

    // Write the HTML content to the PDF
    $obj_pdf->writeHTML($content);

    // Output the PDF
    $obj_pdf->Output("Report Card.pdf");
    exit; // Exit to prevent the HTML content from being displayed below
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report Card</title>
    <!-- Your CSS and JavaScript should be included here -->
</head>
<body>
    <?php
    // Database connection configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you have an "exam_scores" table with appropriate columns

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the data for the specific row with the given ID
        $sql = "SELECT * FROM exam_scores WHERE id = $id";

        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Include the report card HTML content from a separate file
            include('report_card_html.php');
        } else {
            echo "0 results";
        }
    }

    
    ?>

    <form method="post">
        <input type="submit" name="button" value="Convert to PDF">
    </form>
</body>
</html>
