<?php

// Fetch the plant data  from the database
$query = "SELECT common, likes FROM plant_names ORDER BY likes DESC";
$result = Database::fetchAll($query);

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

foreach ($result as $row) {
    $plantName = $row['common'];
    $likes = $row['likes'];
    $leaderboardTable .= "<tr>
                            <td>{$rank}</td>
                            <td>{$plantName}</td>
                            <td>{$likes}</td>
                        </tr>";

    $rank++;
}

$leaderboardTable .= '</tbody></table>';

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

view('top', [
    'leaderboardTable' => $leaderboardTable
]);