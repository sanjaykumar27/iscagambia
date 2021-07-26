<?php
$exports = <<<'JSON'
{
  "name": "securityLogin",
  "module": "auth",
  "action": "provider",
  "options": {
    "connection": "DBConn",
    "provider": "Database",
    "users": {
      "table": "users",
      "identity": "id",
      "username": "email",
      "password": "password"
    },
    "permissions": {
      "Active": {
        "table": "users",
        "identity": "id",
        "conditions": []
      }
    },
    "secret": "\"\""
  },
  "meta": [
    {
      "name": "identity",
      "type": "text"
    }
  ]
}
JSON;
?>