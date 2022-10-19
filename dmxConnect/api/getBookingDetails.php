<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "$_GET": [
      {
        "type": "number",
        "name": "booking_id"
      },
      {
        "type": "text",
        "name": "sort"
      },
      {
        "type": "text",
        "name": "dir"
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
        "name": "query",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "DBConn",
          "sql": {
            "type": "SELECT",
            "columns": [],
            "table": {
              "name": "booking_seats"
            },
            "primary": "seat_id",
            "joins": [],
            "wheres": {
              "condition": "AND",
              "rules": [
                {
                  "id": "booking_seats.booking_id",
                  "field": "booking_seats.booking_id",
                  "type": "double",
                  "operator": "equal",
                  "value": "{{$_GET.booking_id}}",
                  "data": {
                    "table": "booking_seats",
                    "column": "booking_id",
                    "type": "number",
                    "columnObj": {
                      "type": "reference",
                      "primary": false,
                      "nullable": false,
                      "references": "booking_id",
                      "inTable": "booking",
                      "referenceType": "integer",
                      "onUpdate": "RESTRICT",
                      "onDelete": "RESTRICT",
                      "name": "booking_id"
                    }
                  },
                  "operation": "="
                }
              ],
              "conditional": null,
              "valid": true
            },
            "query": "SELECT *\nFROM booking_seats\nWHERE booking_id = :P1 /* {{$_GET.booking_id}} */",
            "params": [
              {
                "operator": "equal",
                "type": "expression",
                "name": ":P1",
                "value": "{{$_GET.booking_id}}"
              }
            ]
          }
        },
        "output": true,
        "meta": [
          {
            "type": "number",
            "name": "seat_id"
          },
          {
            "type": "number",
            "name": "booking_id"
          },
          {
            "type": "text",
            "name": "seat"
          },
          {
            "type": "text",
            "name": "accept_reject"
          },
          {
            "type": "text",
            "name": "member_name"
          },
          {
            "type": "text",
            "name": "meal_type"
          },
          {
            "type": "text",
            "name": "member_type"
          },
          {
            "type": "text",
            "name": "seat_type"
          },
          {
            "type": "number",
            "name": "price"
          }
        ],
        "outputType": "array"
      }
    ]
  }
}
JSON
);
?>