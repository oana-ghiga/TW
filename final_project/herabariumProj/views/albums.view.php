<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php
require_once basePath('/templates/head.php');
?>
<body>
<?php
require_once basePath('/templates/header.php');
?>
<?php
require_once basePath('/templates/filter.php');
?>

<div class="content">
    <h1> My Albums </h1>
    <div class="albumList">
        <div class="album">
            <!-- PHP code to retrieve album data -->
            <?php
            $response = file_get_contents('album.php');
            $data = json_decode($response, true);

            if (isset($data['albums'])) {
                foreach ($data['albums'] as $album) {
                    $albumId = $album['id'];
                    $plants = $album['plants'];
                    ?>

                    <div class="albumBox-container" onclick="showAlbumContent(<?php echo $albumId?>)">
                        <div class="albumBox-grid">
                            <?php
                            $counter = 0;
                            foreach ($plants as $plant) {
                                if ($counter >= 4) break;
                                $plantId = $plant['id'];
                                $imageLink = $plant['image_link'];
                                ?>
                                <div class="albumBox-grid-item" data-count="+<?php echo $counter; ?>">
                                    <img src="<?php echo $imageLink; ?>">
                                </div>
                                <?php
                                $counter++;
                            }
                            ?>
                        </div>
                        <h2>Album <?php echo $albumId; ?></h2>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No albums found.</p>";
            }
            ?>
        </div>
    </div>
</div>

<script src="../javascript/script.js" type="text/javascript"></script>
<script type="text/javascript">
    function showAlbumContent(albumId) {
        // Open new page or perform desired action for the selected album
        window.open('album.php?id=' + albumId, '_blank');
    }
</script>
</body>
</html>