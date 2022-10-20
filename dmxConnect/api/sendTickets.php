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
    ],
    "$_POST": [
      {
        "type": "number",
        "name": "booking_id"
      }
    ]
  },
  "exec": {
    "steps": [
      {
        "name": "html_content",
        "module": "core",
        "action": "setvalue",
        "options": {
          "key": "html_content",
          "value": "{{null}}"
        },
        "meta": [],
        "outputType": "text",
        "output": true
      },
      {
        "name": "qBookingDetails",
        "module": "dbconnector",
        "action": "single",
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
                "column": "membership_type"
              }
            ],
            "table": {
              "name": "booking"
            },
            "primary": "booking_id",
            "joins": [],
            "wheres": {
              "condition": "AND",
              "rules": [
                {
                  "id": "booking.booking_id",
                  "field": "booking.booking_id",
                  "type": "double",
                  "operator": "equal",
                  "value": "{{$_GET.booking_id}}",
                  "data": {
                    "table": "booking",
                    "column": "booking_id",
                    "type": "number",
                    "columnObj": {
                      "type": "increments",
                      "primary": true,
                      "nullable": false,
                      "name": "booking_id"
                    }
                  },
                  "operation": "=",
                  "table": "booking"
                }
              ],
              "conditional": null,
              "valid": true
            },
            "query": "SELECT booking_id, email, membership_type\nFROM booking\nWHERE booking_id = :P1 /* {{$_GET.booking_id}} */",
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
            "name": "booking_id"
          },
          {
            "type": "text",
            "name": "email"
          },
          {
            "type": "text",
            "name": "membership_type"
          }
        ],
        "outputType": "object"
      },
      {
        "name": "qSeats",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "DBConn",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "booking_seats",
                "column": "seat"
              },
              {
                "table": "booking_seats",
                "column": "member_name"
              },
              {
                "table": "booking_seats",
                "column": "member_type"
              },
              {
                "table": "booking_seats",
                "column": "seat_type"
              },
              {
                "table": "booking_seats",
                "column": "price"
              }
            ],
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
                },
                {
                  "id": "booking_seats.accept_reject",
                  "field": "booking_seats.accept_reject",
                  "type": "string",
                  "operator": "equal",
                  "value": "ACCEPT",
                  "data": {
                    "table": "booking_seats",
                    "column": "accept_reject",
                    "type": "text",
                    "columnObj": {
                      "type": "enum",
                      "enumValues": [
                        "HOLD",
                        "ACCEPT",
                        "REJECTED"
                      ],
                      "maxLength": 8,
                      "primary": false,
                      "nullable": false,
                      "name": "accept_reject"
                    }
                  },
                  "operation": "="
                }
              ],
              "conditional": null,
              "valid": true
            },
            "query": "SELECT seat, member_name, member_type, seat_type, price\nFROM booking_seats\nWHERE booking_id = :P1 /* {{$_GET.booking_id}} */ AND accept_reject = 'ACCEPT'",
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
        "meta": [
          {
            "type": "text",
            "name": "seat"
          },
          {
            "type": "text",
            "name": "member_name"
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
      },
      {
        "name": "repeat",
        "module": "core",
        "action": "repeat",
        "options": {
          "repeat": "{{qSeats}}",
          "outputFields": [
            "seat",
            "member_name",
            "member_type",
            "seat_type",
            "price"
          ],
          "exec": {
            "steps": {
              "name": "html_content",
              "module": "core",
              "action": "setvalue",
              "options": {
                "key": "html_content",
                "value": "<br><br>{{html_content}}\n<table style=\"border:2px solid #000;margin-bottom:2px;border-bottom:0\">\n    <tr>\n      <td>\n        <div style=\"height:290px;width:290px;background-color:#eceff6;border-right:1px;padding:15px\">\n          <img style=\"height:65px\" src=\"https://iscagambia.com/assets/images/logo.jpeg\">\n          <p>Name: <strong>{{member_name}}</strong></p>\n          <p>Type: <strong>{{member_type}} - ({{seat_type}})</strong></p>\n          <p>Amount: <strong>{{price}}</strong></p>\n        </div>\n      </td>\n      <td><img style=\"height:320px;margin-left:-4px\" src=\"https://iscagambia.com/assets/images/ticket.jpeg\"></td>\n      <td>\n        <div style=\"height:290px;width:300px;background-color:#eceff6;border-right:1px;padding:15px;margin-left:-4px\">\n          <h3 style=\"color:brown;text-transform:uppercase;text-align:center\">LUCKY DIP TICKET</h3>\n          <h1 style=\"color:#ff8d00;text-transform:uppercase;text-align:center\">{{qBookingDetails.membership_type}}</h1>\n          <p style=\"color:#000;margin-top:20px;text-transform:uppercase;text-align:center\">TICKET NO:</p>\n          <p style=\"color:#ff8d00;font-size:22px;text-transform:uppercase;text-align:center;font-weight:600\">{{seat}}</p>\n          <img style=\"height:65px;float:right\" src=\"https://iscagambia.com/assets/images/logo.jpeg\">\n        </div>\n      </td>\n    </tr>\n  </table>\n  <table style=\"border:2px solid #000;border-top:2px dashed #000\">\n    <tr>\n      <td>\n        <div style=\"height:290px;width:290px;background-color:#eceff6;border-right:1px;padding:15px\">\n          <p style=\"margin-bottom:0px\">DUPLICATE</p><br>\n          <img style=\"height:65px\" src=\"https://iscagambia.com/assets/images/logo.jpeg\">\n          <p>Name: <strong>{{member_name}}</strong></p>\n          <p>Type: <strong>{{member_type}} - ({{seat_type}})</strong></p>\n          <p>Amount: <strong>{{price}}</strong></p>\n        </div>\n      </td>\n      <td><img style=\"height:320px;margin-left:-4px\" src=\"https://iscagambia.com/assets/images/ticket.jpeg\"></td>\n      <td>\n        <div style=\"height:290px;width:300px;background-color:#eceff6;border-right:1px;padding:15px;margin-left:-4px\">\n          <p>DUPLICATE</p>\n          <h3 style=\"color:brown;text-transform:uppercase;text-align:center\">LUCKY DIP TICKET</h3>\n          <h1 style=\"color:#ff8d00;text-transform:uppercase;text-align:center\">{{qBookingDetails.membership_type}}</h1>\n          <p style=\"color:#000;margin-top:20px;text-transform:uppercase;text-align:center\">TICKET NO:</p>\n          <p style=\"color:#ff8d00;font-size:22px;text-transform:uppercase;text-align:center;font-weight:600\">{{seat}}</p>\n          <img style=\"height:65px;float:right\" src=\"https://iscagambia.com/assets/images/logo.jpeg\">\n        </div>\n      </td>\n    </tr>\n  </table>"
              },
              "meta": [],
              "outputType": "text",
              "output": true
            }
          }
        },
        "output": true,
        "meta": [
          {
            "name": "$index",
            "type": "number"
          },
          {
            "name": "$number",
            "type": "number"
          },
          {
            "name": "$name",
            "type": "text"
          },
          {
            "name": "$value",
            "type": "object"
          },
          {
            "name": "seat",
            "type": "text"
          },
          {
            "name": "member_name",
            "type": "text"
          },
          {
            "name": "member_type",
            "type": "text"
          },
          {
            "name": "seat_type",
            "type": "text"
          },
          {
            "name": "price",
            "type": "number"
          }
        ],
        "outputType": "array"
      },
      {
        "name": "",
        "module": "mail",
        "action": "send",
        "options": {
          "instance": "mail",
          "toEmail": "{{qBookingDetails.email}}",
          "toName": "User",
          "fromName": "Iscagambia",
          "fromEmail": "office@iscagambia.com",
          "replyTo": "office@iscagambia.com",
          "contentType": "html",
          "embedImages": true,
          "body": "{{html_content}}",
          "subject": "Tickets"
        },
        "output": true
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
                "table": "booking",
                "column": "ticked_emailed",
                "type": "boolean",
                "value": "1"
              }
            ],
            "table": "booking",
            "wheres": {
              "condition": "AND",
              "rules": [
                {
                  "id": "booking_id",
                  "field": "booking_id",
                  "type": "double",
                  "operator": "equal",
                  "value": "{{$_GET.booking_id}}",
                  "data": {
                    "column": "booking_id"
                  },
                  "operation": "="
                }
              ],
              "conditional": null,
              "valid": true
            },
            "returning": "booking_id",
            "query": "UPDATE booking\nSET ticked_emailed = '1'\nWHERE booking_id = :P1 /* {{$_GET.booking_id}} */",
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