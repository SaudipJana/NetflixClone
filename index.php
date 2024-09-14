<?php
    require_once("includes/header.php");
    
    $preview = new PreviewProvider($con, $userLoggedIn);
    echo $preview->createPreviewVideo(null);

    $categories = new CategoryContainers($con, $userLoggedIn);
    echo $categories->showAllCategories(null);

    require_once("includes/footer.php")
?>
