<?php

require './app/bootstrap.php';

$item = new Item(new ShippingFee(10, 10, 30, 10), 1000);
echo $item->getItemPrice();