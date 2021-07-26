<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "options": {
      "linkedFile": "/login.php",
      "linkedForm": "formLogin"
    },
    "$_POST": [
      {
        "type": "text",
        "fieldName": "username",
        "options": {
          "rules": {
            "core:required": {
              "param": "",
              "message": "Please enter username!"
            }
          }
        },
        "name": "username"
      },
      {
        "type": "text",
        "fieldName": "password",
        "options": {
          "rules": {
            "core:required": {
              "param": "",
              "message": "Please enter password!"
            }
          }
        },
        "name": "password"
      }
    ]
  },
  "exec": {
    "steps": {
      "name": "identity",
      "module": "auth",
      "action": "login",
      "options": {
        "provider": "securityLogin",
        "remember": "",
        "password": "{{$_POST.password.md5()}}"
      },
      "output": true,
      "meta": []
    }
  }
}
JSON
);
?>