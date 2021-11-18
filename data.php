<?php

$products = require 'db/select_products.php';

echo json_encode($products);
