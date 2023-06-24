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
<form method="post" action="/top">
    <input type="hidden" name="data" value="<?php echo htmlspecialchars($leaderboardTable); ?>">
    <button type="submit" name="format" value="pdf">Download as PDF</button>
    <button type="submit" name="format" value="csv">Download as CSV</button>
</form>
</body>
</html>