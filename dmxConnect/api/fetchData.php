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
            "columns": [],
            "table": {
              "name": "user_form"
            },
            "joins": [],
            "query": "SELECT *\nFROM user_form",
            "params": []
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
                "name": "user_id",
                "type": "text"
              },
              {
                "name": "payment_reference",
                "type": "text"
              },
              {
                "name": "email",
                "type": "number"
              },
              {
                "name": "family_name",
                "type": "text"
              },
              {
                "name": "first_middle_name",
                "type": "text"
              },
              {
                "name": "principle_number",
                "type": "text"
              },
              {
                "name": "alternate_number",
                "type": "text"
              },
              {
                "name": "whatsapp_number",
                "type": "text"
              },
              {
                "name": "your_address",
                "type": "text"
              },
              {
                "name": "your_organization",
                "type": "text"
              },
              {
                "name": "resident_permit",
                "type": "text"
              },
              {
                "name": "passport",
                "type": "text"
              },
              {
                "name": "payment_reciept",
                "type": "text"
              },
              {
                "name": "payment_method",
                "type": "text"
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