<?php
function thong_ke()
{
    $sql = "SELECT category.cid as madm, category.cname as tendm, count(product.pid) as countsp, min(product.price) as minprice, max(product.price) as maxprice, avg(product.price) as avgprice";
    $sql .= " FROM product LEFT JOIN category on category.cid=product.cid WHERE 1";
    $sql .= " GROUP BY category.cid ORDER BY category.cid desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
