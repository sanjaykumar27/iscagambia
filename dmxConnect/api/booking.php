<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "options": {
      "linkedFile": "/gala_dinner.php",
      "linkedForm": "formRegisterDinner"
    },
    "$_POST": [
      {
        "type": "text",
        "fieldName": "platinum_seats",
        "name": "platinum_seats"
      },
      {
        "type": "text",
        "fieldName": "gold_seats",
        "name": "gold_seats"
      },
      {
        "type": "text",
        "fieldName": "silver_seats",
        "name": "silver_seats"
      },
      {
        "type": "text",
        "fieldName": "member_type",
        "name": "member_type"
      },
      {
        "type": "text",
        "fieldName": "seat_type",
        "name": "seat_type"
      },
      {
        "type": "text",
        "fieldName": "plan_type",
        "name": "plan_type"
      },
      {
        "type": "file",
        "fieldName": "payment_receipt",
        "name": "payment_receipt",
        "sub": [
          {
            "type": "text",
            "name": "name"
          },
          {
            "type": "text",
            "name": "type"
          },
          {
            "type": "number",
            "name": "size"
          },
          {
            "type": "text",
            "name": "error"
          }
        ],
        "outputType": "file"
      },
      {
        "type": "text",
        "fieldName": "first_name",
        "options": {
          "rules": {}
        },
        "name": "first_name"
      },
      {
        "type": "text",
        "fieldName": "last_name",
        "name": "last_name"
      },
      {
        "type": "text",
        "fieldName": "email",
        "options": {
          "rules": {
            "core:required": {
              "param": ""
            },
            "core:email": {}
          }
        },
        "name": "email"
      },
      {
        "type": "number",
        "fieldName": "mobile",
        "options": {
          "rules": {
            "core:required": {
              "param": ""
            },
            "core:number": {}
          }
        },
        "name": "mobile"
      },
      {
        "type": "text",
        "name": "membership_type"
      },
      {
        "type": "text",
        "name": "meal_type"
      },
      {
        "type": "array",
        "name": "seats",
        "sub": [
          {
            "type": "text",
            "fieldName": "seats[{{$index}}][seat_name]",
            "multiple": true,
            "name": "seat_name"
          },
          {
            "type": "text",
            "fieldName": "seats[{{$index}}][name]",
            "multiple": true,
            "options": {
              "rules": {
                "core:required": {
                  "param": ""
                }
              }
            },
            "name": "name"
          },
          {
            "type": "text",
            "fieldName": "seats[{{$index}}][meal_type]",
            "name": "meal_type"
          },
          {
            "type": "text",
            "fieldName": "seats[{{$index}}][member_type]",
            "name": "member_type"
          },
          {
            "type": "text",
            "fieldName": "seats[{{$index}}][seat_type]",
            "name": "seat_type"
          },
          {
            "type": "text",
            "name": "price"
          }
        ]
      },
      {
        "type": "array",
        "name": "record",
        "sub": [
          {
            "type": "number",
            "name": "insert"
          },
          {
            "type": "text",
            "name": "seat_name"
          },
          {
            "type": "text",
            "name": "name"
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
        ]
      }
    ]
  },
  "exec": {
    "steps": [
      {
        "name": "reciept",
        "module": "upload",
        "action": "upload",
        "options": {
          "path": "/assets/images",
          "fields": "{{$_POST.payment_receipt}}",
          "template": "{guid}{ext}",
          "replaceSpace": true,
          "overwrite": true
        },
        "meta": [
          {
            "name": "name",
            "type": "text"
          },
          {
            "name": "path",
            "type": "text"
          },
          {
            "name": "url",
            "type": "text"
          },
          {
            "name": "type",
            "type": "text"
          },
          {
            "name": "size",
            "type": "text"
          },
          {
            "name": "error",
            "type": "number"
          }
        ],
        "outputType": "file"
      },
      {
        "name": "insert",
        "module": "dbupdater",
        "action": "insert",
        "options": {
          "connection": "DBConn",
          "sql": {
            "type": "insert",
            "values": [
              {
                "table": "booking",
                "column": "email",
                "type": "text",
                "value": "{{$_POST.email}}"
              },
              {
                "table": "booking",
                "column": "mobile",
                "type": "text",
                "value": "{{$_POST.mobile}}"
              },
              {
                "table": "booking",
                "column": "membership_type",
                "type": "text",
                "value": "{{$_POST.plan_type}}"
              },
              {
                "table": "booking",
                "column": "payment_receipt",
                "type": "text",
                "value": "{{reciept.path}}"
              }
            ],
            "table": "booking",
            "query": "INSERT INTO booking\n(email, mobile, membership_type, payment_receipt) VALUES (:P1 /* {{$_POST.email}} */, :P2 /* {{$_POST.mobile}} */, :P3 /* {{$_POST.plan_type}} */, :P4 /* {{reciept.path}} */)",
            "params": [
              {
                "name": ":P1",
                "type": "expression",
                "value": "{{$_POST.email}}"
              },
              {
                "name": ":P2",
                "type": "expression",
                "value": "{{$_POST.mobile}}"
              },
              {
                "name": ":P3",
                "type": "expression",
                "value": "{{$_POST.plan_type}}"
              },
              {
                "name": ":P4",
                "type": "expression",
                "value": "{{reciept.path}}"
              }
            ],
            "returning": "booking_id"
          }
        },
        "meta": [
          {
            "name": "identity",
            "type": "text"
          },
          {
            "name": "affected",
            "type": "number"
          }
        ]
      },
      {
        "name": "repeat",
        "module": "core",
        "action": "repeat",
        "options": {
          "repeat": "{{$_POST.seats}}",
          "outputFields": [
            "seat_name",
            "name",
            "meal_type",
            "member_type",
            "seat_type"
          ],
          "exec": {
            "steps": {
              "name": "iBookingSeats",
              "module": "dbupdater",
              "action": "insert",
              "options": {
                "connection": "DBConn",
                "sql": {
                  "type": "insert",
                  "values": [
                    {
                      "table": "booking_seats",
                      "column": "booking_id",
                      "type": "number",
                      "value": "{{insert.identity}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "seat",
                      "type": "text",
                      "value": "{{seat_name}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "accept_reject",
                      "type": "text",
                      "value": "HOLD"
                    },
                    {
                      "table": "booking_seats",
                      "column": "member_name",
                      "type": "text",
                      "value": "{{name}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "meal_type",
                      "type": "text",
                      "value": "{{meal_type}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "member_type",
                      "type": "text",
                      "value": "{{member_type}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "seat_type",
                      "type": "text",
                      "value": "{{seat_type}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "price",
                      "type": "number",
                      "value": "{{price}}"
                    }
                  ],
                  "table": "booking_seats",
                  "returning": "seat_id",
                  "query": "INSERT INTO booking_seats\n(booking_id, seat, accept_reject, member_name, meal_type, member_type, seat_type, price) VALUES (:P1 /* {{insert.identity}} */, :P2 /* {{seat_name}} */, 'HOLD', :P3 /* {{name}} */, :P4 /* {{meal_type}} */, :P5 /* {{member_type}} */, :P6 /* {{seat_type}} */, :P7 /* {{price}} */)",
                  "params": [
                    {
                      "name": ":P1",
                      "type": "expression",
                      "value": "{{insert.identity}}"
                    },
                    {
                      "name": ":P2",
                      "type": "expression",
                      "value": "{{seat_name}}"
                    },
                    {
                      "name": ":P3",
                      "type": "expression",
                      "value": "{{name}}"
                    },
                    {
                      "name": ":P4",
                      "type": "expression",
                      "value": "{{meal_type}}"
                    },
                    {
                      "name": ":P5",
                      "type": "expression",
                      "value": "{{member_type}}"
                    },
                    {
                      "name": ":P6",
                      "type": "expression",
                      "value": "{{seat_type}}"
                    },
                    {
                      "name": ":P7",
                      "type": "expression",
                      "value": "{{price}}"
                    }
                  ]
                }
              },
              "meta": [
                {
                  "name": "identity",
                  "type": "text"
                },
                {
                  "name": "affected",
                  "type": "number"
                }
              ]
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
            "name": "seat_name",
            "type": "text",
            "multiple": true
          },
          {
            "name": "name",
            "type": "text",
            "multiple": true
          },
          {
            "name": "meal_type",
            "type": "text"
          },
          {
            "name": "member_type",
            "type": "text"
          },
          {
            "name": "seat_type",
            "type": "text"
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