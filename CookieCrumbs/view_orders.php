<?php
    //ini_set('display_errors', 'on');
    //error_reporting(E_ALL);
    $the_title = 'View Orders';
    include('header.php');
    include_once("config.php");
    include_once('classes/OrderFinder.php');
    include_once('classes/Orders.php');

    $finder = new OrderFinder();
    $orders = new Orders();
    $orders->setOrderList($finder->findAllOrdersByUserId($currentAccount->getUserId()));
    ?>
    <div class="contentMenu">
        <h3 id="title">Your Order History</h3>
        <?php echo $orders->getSummaryHTML(); ?>
    </div>
    <?php
    include('footer.php');
?>