<?php
require_once('../../db/dbhelper.php');

if (isset($_POST['coupon_id'])) {
    $couponId = $_POST['coupon_id'];

    $currentDate = date("Y-m-d");
    $sql = "SELECT * FROM coupon WHERE coupon_id = '$couponId'";
    $coupon = executeSingleResult($sql);

    if ($coupon) {
        $startDate = $coupon['started'];
        $endDate = $coupon['ended'];
        
        if ($currentDate >= $startDate && $currentDate <= $endDate) {
            echo "Valid";
        } else {
            echo "expired";
        }
    } else {
        echo "Not found";
    }
}
?>
