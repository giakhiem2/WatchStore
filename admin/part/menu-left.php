<?php
require_once '.././db/dbhelper.php';

?>
<div class="page-sidebar">
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="../assets/images/dashboard/man.png" alt="#">
            </div>
            <h6 class="mt-3 f-14">Admin</h6>
            <p><?php echo $name ?></p>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="index.php"><i data-feather="home"></i><span>Dashboard</span></a></li>
            <li><a class="sidebar-header" href="category.php"><i data-feather="box"></i> <span>Category</span></a></li>
            <li><a class="sidebar-header" href="product.php"><i data-feather="box"></i> <span>Product</span></a></li>
            <li><a class="sidebar-header" href="order.php"><i data-feather="box"></i> <span>Order</span></a></li>
            <li><a class="sidebar-header" href="users.php"><i data-feather="box"></i> <span>Users</span></a></li>
            <li><a class="sidebar-header" href="coupon.php"><i data-feather="box"></i> <span>Coupon</span></a></li>
            <li><a class="sidebar-header" href="cart.php"><i data-feather="box"></i> <span>cart</span></a></li>
            <li><a class="sidebar-header" href="mess.php"><i data-feather="box"></i> <span>Message</span></a></li>

            <?php
                if($role == 1){
                   echo '<li><a class="sidebar-header" href="account.php"><i data-feather="box"></i> <span>Account</span></a></li>';
                }    
            ?>

        </ul>
    </div>
</div>

//cho login cua ong dau