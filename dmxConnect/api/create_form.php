<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "options": {
      "linkedFile": "/index.php",
      "linkedForm": "submit_data"
    },
    "$_POST": [
      {
        "type": "text",
        "fieldName": "payment_reference",
        "options": {
          "rules": {
            "core:required": {
              "param": "",
              "message": ""
            }
          }
        },
        "name": "payment_reference"
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
        "type": "text",
        "fieldName": "family_name",
        "options": {
          "rules": {
            "core:required": {
              "param": ""
            }
          }
        },
        "name": "family_name"
      },
      {
        "type": "text",
        "fieldName": "first_middle_name",
        "options": {
          "rules": {
            "core:required": {
              "param": ""
            }
          }
        },
        "name": "first_middle_name"
      },
      {
        "type": "text",
        "fieldName": "principle_number",
        "options": {
          "rules": {
            "core:required": {
              "param": ""
            }
          }
        },
        "name": "principle_number"
      },
      {
        "type": "text",
        "fieldName": "alternate_number",
        "options": {
          "rules": {
            "core:required": {
              "param": ""
            }
          }
        },
        "name": "alternate_number"
      },
      {
        "type": "text",
        "fieldName": "whatsapp_number",
        "options": {
          "rules": {
            "core:required": {
              "param": ""
            }
          }
        },
        "name": "whatsapp_number"
      },
      {
        "type": "text",
        "fieldName": "membership_type",
        "name": "membership_type"
      },
      {
        "type": "file",
        "fieldName": "resident_permit",
        "name": "resident_permit",
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
        "type": "file",
        "fieldName": "passport",
        "name": "passport",
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
        "type": "file",
        "fieldName": "payment_reciept",
        "name": "payment_reciept",
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
        "fieldName": "payment_method",
        "name": "payment_method"
      },
      {
        "type": "text",
        "fieldName": "your_address",
        "name": "your_address"
      },
      {
        "type": "text",
        "fieldName": "your_organization",
        "name": "your_organization"
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
                "table": "user_form",
                "column": "payment_reference",
                "type": "text",
                "value": "{{$_POST.payment_reference}}"
              },
              {
                "table": "user_form",
                "column": "email",
                "type": "number",
                "value": "{{$_POST.email}}"
              },
              {
                "table": "user_form",
                "column": "family_name",
                "type": "text",
                "value": "{{$_POST.family_name}}"
              },
              {
                "table": "user_form",
                "column": "first_middle_name",
                "type": "text",
                "value": "{{$_POST.first_middle_name}}"
              },
              {
                "table": "user_form",
                "column": "principle_number",
                "type": "text",
                "value": "{{$_POST.principle_number}}"
              },
              {
                "table": "user_form",
                "column": "alternate_number",
                "type": "text",
                "value": "{{$_POST.alternate_number}}"
              },
              {
                "table": "user_form",
                "column": "whatsapp_number",
                "type": "text",
                "value": "{{$_POST.whatsapp_number}}"
              },
              {
                "table": "user_form",
                "column": "your_address",
                "type": "text",
                "value": "{{$_POST.your_address}}"
              },
              {
                "table": "user_form",
                "column": "your_organization",
                "type": "text",
                "value": "{{$_POST.your_organization}}"
              },
              {
                "table": "user_form",
                "column": "resident_permit",
                "type": "text",
                "value": "{{permit.path}}"
              },
              {
                "table": "user_form",
                "column": "passport",
                "type": "text",
                "value": "{{passport.path}}"
              },
              {
                "table": "user_form",
                "column": "payment_reciept",
                "type": "text",
                "value": "{{reciept.path}}"
              },
              {
                "table": "user_form",
                "column": "payment_method",
                "type": "text",
                "value": "{{$_POST.payment_method}}"
              }
            ],
            "table": "user_form",
            "returning": "user_id",
            "query": "INSERT INTO user_form\n(payment_reference, email, family_name, first_middle_name, principle_number, alternate_number, whatsapp_number, your_address, your_organization, resident_permit, passport, payment_reciept, payment_method) VALUES (:P1 /* {{$_POST.payment_reference}} */, :P2 /* {{$_POST.email}} */, :P3 /* {{$_POST.family_name}} */, :P4 /* {{$_POST.first_middle_name}} */, :P5 /* {{$_POST.principle_number}} */, :P6 /* {{$_POST.alternate_number}} */, :P7 /* {{$_POST.whatsapp_number}} */, :P8 /* {{$_POST.your_address}} */, :P9 /* {{$_POST.your_organization}} */, :P10 /* {{permit.path}} */, :P11 /* {{passport.path}} */, :P12 /* {{reciept.path}} */, :P13 /* {{$_POST.payment_method}} */)",
            "params": [
              {
                "name": ":P1",
                "type": "expression",
                "value": "{{$_POST.payment_reference}}"
              },
              {
                "name": ":P2",
                "type": "expression",
                "value": "{{$_POST.email}}"
              },
              {
                "name": ":P3",
                "type": "expression",
                "value": "{{$_POST.family_name}}"
              },
              {
                "name": ":P4",
                "type": "expression",
                "value": "{{$_POST.first_middle_name}}"
              },
              {
                "name": ":P5",
                "type": "expression",
                "value": "{{$_POST.principle_number}}"
              },
              {
                "name": ":P6",
                "type": "expression",
                "value": "{{$_POST.alternate_number}}"
              },
              {
                "name": ":P7",
                "type": "expression",
                "value": "{{$_POST.whatsapp_number}}"
              },
              {
                "name": ":P8",
                "type": "expression",
                "value": "{{$_POST.your_address}}"
              },
              {
                "name": ":P9",
                "type": "expression",
                "value": "{{$_POST.your_organization}}"
              },
              {
                "name": ":P10",
                "type": "expression",
                "value": "{{permit.path}}"
              },
              {
                "name": ":P11",
                "type": "expression",
                "value": "{{passport.path}}"
              },
              {
                "name": ":P12",
                "type": "expression",
                "value": "{{reciept.path}}"
              },
              {
                "name": ":P13",
                "type": "expression",
                "value": "{{$_POST.payment_method}}"
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
    ]
  }
}
JSON
);
?>