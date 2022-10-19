<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "$_GET": [
      {
        "type": "number",
        "options": {
          "rules": {
            "core:required": {}
          }
        },
        "name": "seat_id"
      },
      {
        "type": "text",
        "options": {
          "rules": {
            "core:required": {}
          }
        },
        "name": "accept_reject"
      }
    ]
  },
  "exec": {
    "steps": [
      {
        "name": "",
        "module": "auth",
        "action": "restrict",
        "options": {
          "provider": "securityLogin",
          "permissions": [
            "Active"
          ]
        }
      },
      {
        "name": "update",
        "module": "dbupdater",
        "action": "update",
        "options": {
          "connection": "DBConn",
          "sql": {
            "type": "update",
            "values": [
              {
                "table": "booking_seats",
                "column": "accept_reject",
                "type": "text",
                "value": "{{$_GET.accept_reject}}"
              }
            ],
            "table": "booking_seats",
            "wheres": {
              "condition": "AND",
              "rules": [
                {
                  "id": "seat_id",
                  "field": "seat_id",
                  "type": "double",
                  "operator": "equal",
                  "value": "{{$_GET.seat_id}}",
                  "data": {
                    "column": "seat_id"
                  },
                  "operation": "="
                }
              ],
              "conditional": null,
              "valid": true
            },
            "returning": "seat_id",
            "query": "UPDATE booking_seats\nSET accept_reject = :P1 /* {{$_GET.accept_reject}} */\nWHERE seat_id = :P2 /* {{$_GET.seat_id}} */",
            "params": [
              {
                "name": ":P1",
                "type": "expression",
                "value": "{{$_GET.accept_reject}}"
              },
              {
                "operator": "equal",
                "type": "expression",
                "name": ":P2",
                "value": "{{$_GET.seat_id}}"
              }
            ]
          }
        },
        "meta": [
          {
            "name": "affected",
            "type": "number"
          }
        ]
      }
    ]
  }
}
JSON
);
?>