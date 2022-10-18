<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "name": "qSeats",
  "module": "dbupdater",
  "action": "custom",
  "options": {
    "connection": "DBConn",
    "sql": {
      "query": "SELECT GROUP_CONCAT(DISTINCT(seat)) as seat_booked FROM `booking_seats` WHERE accept_reject IN ('HOLD','ACCEPT')",
      "params": []
    }
  },
  "output": true,
  "meta": [],
  "outputType": "array"
}
JSON
);
?>