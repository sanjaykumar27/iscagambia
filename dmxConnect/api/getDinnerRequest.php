<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "$_GET": [
      {
        "type": "text",
        "name": "offset"
      },
      {
        "type": "text",
        "name": "limit"
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
        "action": "paged",
        "options": {
          "connection": "DBConn",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "booking",
                "column": "booking_id"
              },
              {
                "table": "booking",
                "column": "email"
              },
              {
                "table": "booking",
                "column": "mobile"
              },
              {
                "table": "booking",
                "column": "membership_type"
              },
              {
                "table": "booking",
                "column": "created_on"
              },
              {
                "table": "booking",
                "column": "payment_receipt"
              },
              {
                "table": "booking",
                "column": "ticked_emailed"
              }
            ],
            "table": {
              "name": "booking"
            },
            "primary": "booking_id",
            "joins": [],
            "query": "SELECT booking_id, email, mobile, membership_type, created_on, payment_receipt, ticked_emailed\nFROM booking\nORDER BY created_on DESC",
            "params": [],
            "orders": [
              {
                "table": "booking",
                "column": "created_on",
                "direction": "DESC",
                "recid": 1
              }
            ]
          }
        },
        "output": true,
        "meta": [
          {
            "name": "offset",
            "type": "number"
          },
          {
            "name": "limit",
            "type": "number"
          },
          {
            "name": "total",
            "type": "number"
          },
          {
            "name": "page",
            "type": "object",
            "sub": [
              {
                "name": "offset",
                "type": "object",
                "sub": [
                  {
                    "name": "first",
                    "type": "number"
                  },
                  {
                    "name": "prev",
                    "type": "number"
                  },
                  {
                    "name": "next",
                    "type": "number"
                  },
                  {
                    "name": "last",
                    "type": "number"
                  }
                ]
              },
              {
                "name": "current",
                "type": "number"
              },
              {
                "name": "total",
                "type": "number"
              }
            ]
          },
          {
            "name": "data",
            "type": "array",
            "sub": [
              {
                "type": "number",
                "name": "booking_id"
              },
              {
                "type": "text",
                "name": "email"
              },
              {
                "type": "text",
                "name": "mobile"
              },
              {
                "type": "text",
                "name": "membership_type"
              },
              {
                "type": "datetime",
                "name": "created_on"
              },
              {
                "type": "text",
                "name": "payment_receipt"
              },
              {
                "type": "boolean",
                "name": "ticked_emailed"
              }
            ]
          }
        ],
        "outputType": "object"
      }
    ]
  }
}
JSON
);
?>