<?php

// Create a connection to the database
$host = 'localhost';
$user = 'roossst';
$password = 'root';
$database = 'herbarium_db';

$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the plant data  from the database
$query = "SELECT name, likes FROM plants ORDER BY likes DESC";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed:".mysqli_error($conn));
}


// Generate the leaderboard table
$rank = 1;
$leaderboardTable = '<table>
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Plant Name</th>
                                <th>Likes</th>
                            </tr>
                        </thead>
                        <tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    $plantName = $row['name'];
    $likes = $row['likes'];
    $leaderboardTable .= "<tr>
                            <td>{$rank}</td>
                            <td>{$plantName}</td>
                            <td>{$likes}</td>
                        </tr>";

    $rank++;
}

$leaderboardTable .= '</tbody></table>';

// Close the database connection
mysqli_close($conn);


// Download the leaderboard table as a PDF
if (isset($_POST['format']) && $_POST['format'] == 'pdf') {
    require_once 'C:\Users\oana_\PhpstormProjects\test\TCPDF-main\TCPDF-main\tcpdf.php';

    // Create a new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

    // Set document information
    $pdf->SetCreator('Your Website');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Weekly Leaderboard');
    $pdf->SetSubject('Weekly Leaderboard');
    $pdf->SetKeywords('leaderboard, plants, statistics');

    // Set default header and footer data
    $pdf->SetHeaderData('', 0, '', '');
    $pdf->setFooterData();

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Set margins
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(0);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, 10);

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Output the leaderboard table
    $pdf->writeHTML($leaderboardTable);

    // Output the PDF
    $pdf->Output('leaderboard.pdf', 'D');
    exit();
}

// Download the leaderboard table as a CSV

if (isset($_POST['format']) && $_POST['format'] == 'csv') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=leaderboard.csv');

    $output = fopen('php://output', 'w');

    $rows = explode('</tr>', $leaderboardTable);

    foreach ($rows as $row) {
        $cells = explode('</td>', $row);
        $csvRow = array();
        foreach ($cells as $cell) {
            $csvRow[] = strip_tags($cell);
        }
        fputcsv($output, $csvRow);
    }

    fclose($output);
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Plant Statistics</title>
</head>
<body>
<h1>Plant Statistics</h1>
<h2>Weekly Leaderboard</h2>
<?php echo $leaderboardTable; ?>

<h3>Download Leaderboard</h3>
<form method="post" action="statistics.php">
    <input type="hidden" name="data" value="<?php echo htmlspecialchars($leaderboardTable); ?>">
    <button type="submit" name="format" value="pdf">Download as PDF</button>
    <button type="submit" name="format" value="csv">Download as CSV</button>
</form>
</body>
</html>
