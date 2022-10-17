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
      }
    ]
  },
  "exec": {
    "steps": [
      {
        "name": "permit",
        "module": "upload",
        "action": "upload",
        "options": {
          "path": "/assets/images",
          "fields": "{{$_POST.resident_permit}}",
          "template": "{guid}{ext}",
          "replaceSpace": true,
          "overwrite": true
        },
        "meta": [],
        "outputType": "file"
      },
      {
        "name": "passport",
        "module": "upload",
        "action": "upload",
        "options": {
          "path": "/assets/images",
          "fields": "{{$_POST.passport}}",
          "template": "{guid}{ext}",
          "replaceSpace": true,
          "overwrite": true
        },
        "meta": [],
        "outputType": "file"
      },
      {
        "name": "reciept",
        "module": "upload",
        "action": "upload",
        "options": {
          "path": "/assets/images",
          "fields": "{{$_POST.payment_reciept}}",
          "template": "{guid}{ext}",
          "replaceSpace": true,
          "overwrite": true
        },
        "meta": [],
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
                "value": "{{$_POST.membership_type}}"
              }
            ],
            "table": "booking",
            "query": "INSERT INTO booking\n(first_name, last_name, email, mobile, person_type, membership_type) VALUES (:P1 /* {{$_POST.first_name}} */, :P2 /* {{$_POST.last_name}} */, :P3 /* {{$_POST.email}} */, :P4 /* {{$_POST.mobile}} */, :P5 /* {{$_POST.member_type}} */, :P6 /* {{$_POST.membership_type}} */)",
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
                "value": "{{$_POST.membership_type}}"
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
      }
    ]
  }
}
JSON
);
?>