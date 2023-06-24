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
<div class="spotlight-container shadow">
    <div class="enlarged-image">
        <img id="spotlight-image" class="spotlight-image" src="" alt="Enlarged Image">
    </div>
    <div class="plant-details">
        <div class="plant-description">
            <h2>Plant Name</h2>
            <p>Tag1, Tag2, Tag3</p>
        </div>
        <div class="like-section HC">
            <div class="like-numbers">
                <p id="likesCount">0</p>
            </div>
            <div class="album-add-button">
                <button>Add to Album</button>
            </div>
            <div class="like-button">
                <button>Like</button>
            </div>
        </div>
        <div class="plant-comments">
            <div class="comment-list">
                <div class="comments-container">
                    <div class="comment">
                        <div class="comment-header">
                            <span class="comment-author">John Doe</span>
                            <span class="comment-date">June 1, 2023</span>
                        </div>
                        <div class="comment-content">
                            <p>This is the first comment.</p>
                        </div>
                    </div>

                    <div class="comment">
                        <div class="comment-header">
                            <span class="comment-author">Jane Smith</span>
                            <span class="comment-date">June 2, 2023</span>
                        </div>
                        <div class="comment-content">
                            <p>This is the second comment.</p>
                        </div>
                    </div>
                </div>
                <div class="add-comment-box">
                    <textarea placeholder="Leave a comment"></textarea>
                    <button>Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div hidden id="plantId"><?= $plantId ?></div>
    <!-- <div class="photo_content">
    <template id="image_template">
        <div class="image_card">
            <img class="lazy-image" data-src="" alt="">
        </div>
    </template>
    <div class="image_grid"></div>
</div> -->
    <script type="text/javascript" src="/assets/javascript/script.js"></script>
    <script type="text/javascript" src="/assets/javascript/login.js"></script>
    <script type="text/javascript" src="/assets/javascript/spotlight.js"></script>
</body>

</html>