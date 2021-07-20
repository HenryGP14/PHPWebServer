<?php
header("HTTP/1.1 200");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include('./../settings/post.php');
}
