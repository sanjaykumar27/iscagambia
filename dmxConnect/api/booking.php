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
          "rules": {
            "core:required": {
              "param": ""
            }
          }
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
        "name": "record",
        "sub": [
          {
            "type": "number",
            "name": "insert"
          },
          {
            "type": "text",
            "name": "$value"
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
                "column": "first_name",
                "type": "text",
                "value": "{{$_POST.first_name}}"
              },
              {
                "table": "booking",
                "column": "last_name",
                "type": "text",
                "value": "{{$_POST.last_name}}"
              },
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
                "column": "person_type",
                "type": "text",
                "value": "{{$_POST.member_type}}"
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
              },
              {
                "table": "booking",
                "column": "meal_type",
                "type": "text",
                "value": "{{$_POST.meal_type}}"
              },
              {
                "table": "booking",
                "column": "member_type",
                "type": "text",
                "value": "{{$_POST.member_type}}"
              },
              {
                "table": "booking",
                "column": "seat_type",
                "type": "text",
                "value": "{{$_POST.seat_type}}"
              }
            ],
            "table": "booking",
            "query": "INSERT INTO booking\n(first_name, last_name, email, mobile, person_type, membership_type, payment_receipt, meal_type, member_type, seat_type) VALUES (:P1 /* {{$_POST.first_name}} */, :P2 /* {{$_POST.last_name}} */, :P3 /* {{$_POST.email}} */, :P4 /* {{$_POST.mobile}} */, :P5 /* {{$_POST.member_type}} */, :P6 /* {{$_POST.plan_type}} */, :P7 /* {{reciept.path}} */, :P8 /* {{$_POST.meal_type}} */, :P9 /* {{$_POST.member_type}} */, :P10 /* {{$_POST.seat_type}} */)",
            "params": [
              {
                "name": ":P1",
                "type": "expression",
                "value": "{{$_POST.first_name}}"
              },
              {
                "name": ":P2",
                "type": "expression",
                "value": "{{$_POST.last_name}}"
              },
              {
                "name": ":P3",
                "type": "expression",
                "value": "{{$_POST.email}}"
              },
              {
                "name": ":P4",
                "type": "expression",
                "value": "{{$_POST.mobile}}"
              },
              {
                "name": ":P5",
                "type": "expression",
                "value": "{{$_POST.member_type}}"
              },
              {
                "name": ":P6",
                "type": "expression",
                "value": "{{$_POST.plan_type}}"
              },
              {
                "name": ":P7",
                "type": "expression",
                "value": "{{reciept.path}}"
              },
              {
                "name": ":P8",
                "type": "expression",
                "value": "{{$_POST.meal_type}}"
              },
              {
                "name": ":P9",
                "type": "expression",
                "value": "{{$_POST.member_type}}"
              },
              {
                "name": ":P10",
                "type": "expression",
                "value": "{{$_POST.seat_type}}"
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
          "repeat": "{{$_POST.platinum_seats.split(',')}}",
          "outputFields": [],
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
                      "value": "{{$value}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "accept_reject",
                      "type": "text",
                      "value": "HOLD"
                    }
                  ],
                  "table": "booking_seats",
                  "returning": "seat_id",
                  "query": "INSERT INTO booking_seats\n(booking_id, seat, accept_reject) VALUES (:P1 /* {{insert.identity}} */, :P2 /* {{$value}} */, 'HOLD')",
                  "params": [
                    {
                      "name": ":P1",
                      "type": "expression",
                      "value": "{{insert.identity}}"
                    },
                    {
                      "name": ":P2",
                      "type": "expression",
                      "value": "{{$value}}"
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
          }
        ],
        "outputType": "array"
      },
      {
        "name": "repeatGold",
        "module": "core",
        "action": "repeat",
        "options": {
          "repeat": "{{$_POST.gold_seats.split(',')}}",
          "outputFields": [],
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
                      "value": "{{$value}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "accept_reject",
                      "type": "text",
                      "value": "HOLD"
                    }
                  ],
                  "table": "booking_seats",
                  "returning": "seat_id",
                  "query": "INSERT INTO booking_seats\n(booking_id, seat, accept_reject) VALUES (:P1 /* {{insert.identity}} */, :P2 /* {{$value}} */, 'HOLD')",
                  "params": [
                    {
                      "name": ":P1",
                      "type": "expression",
                      "value": "{{insert.identity}}"
                    },
                    {
                      "name": ":P2",
                      "type": "expression",
                      "value": "{{$value}}"
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
          }
        ],
        "outputType": "array"
      },
      {
        "name": "repeatSilver",
        "module": "core",
        "action": "repeat",
        "options": {
          "repeat": "{{$_POST.silver_seats.split(',')}}",
          "outputFields": [],
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
                      "value": "{{$value}}"
                    },
                    {
                      "table": "booking_seats",
                      "column": "accept_reject",
                      "type": "text",
                      "value": "HOLD"
                    }
                  ],
                  "table": "booking_seats",
                  "returning": "seat_id",
                  "query": "INSERT INTO booking_seats\n(booking_id, seat, accept_reject) VALUES (:P1 /* {{insert.identity}} */, :P2 /* {{$value}} */, 'HOLD')",
                  "params": [
                    {
                      "name": ":P1",
                      "type": "expression",
                      "value": "{{insert.identity}}"
                    },
                    {
                      "name": ":P2",
                      "type": "expression",
                      "value": "{{$value}}"
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