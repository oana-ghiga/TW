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
<div class="photo_content">
    <!-- <div class="spotlightContainer">
        <div class="imageSectionContainer">

        </div>
        <div class="textSectionContainer">

        </div>
    </div>
    <div class="spotlightContainer">
        <div class="imageSectionContainer">

        </div>
        <div class="textSectionContainer">

        </div>
    </div> -->
    <template id="image_template">
        <div class="image_card">
            <img class="lazy-image" data-src="" alt="">
        </div>
    </template>
    <div class="image_grid"></div>
</div>
<script type="text/javascript" src="/assets/javascript/script.js"></script>
</body>
</html>
