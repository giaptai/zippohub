<?php require_once('../../query.php');
function ThongKe($Date)
{
    return executeResult('select t1.month,
   t1.md,
   coalesce(SUM(t1.amount+t2.amount), 0) AS total
   from
   (
     select DATE_FORMAT(a.Date,"%b") as month,
     DATE_FORMAT(a.Date, "%Y-%m") as md,
     "0" as amount
     from (
       select date("' . $Date . '") - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
       from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
       cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
       cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
     ) a
     where a.Date <= date("' . $Date . '") and a.Date >= Date_add(date("' . $Date . '"),interval - 11 month)
     group by md
   )t1
   left join
   (
     SELECT DATE_FORMAT(ngaymua, "%b") AS month, SUM(total_money) as amount ,DATE_FORMAT(ngaymua, "%Y-%m") as md
     FROM hoadon
     where ngaymua <= date("' . $Date . '") and ngaymua >= Date_add(date("' . $Date . '"),interval - 11 month)
     GROUP BY md
   )t2
   on t2.md = t1.md 
   group by t1.md
   order by t1.md asc');
}

if (isset($_POST["action"])) {
    $MonthlyIncome = ThongKe($_POST["date"]);
    $Array = array("Date" => [], "Total" => []);
    foreach ($MonthlyIncome as $Month) {
        $NewDate = explode("-", $Month["md"]);
        $Date = $NewDate[1] . "-" . $NewDate[0];
        array_push($Array["Date"], $Date);
        array_push($Array["Total"], $Month["total"]);
    }
    die(json_encode($Array));
}
