<?php 
    $id = $_GET['id'] ?? '';
    if(!empty($id)){
        get_file('communityID');
    } else {
        get_file('communityNoID');
    }
?>