<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
[
  {
    "name": "",
    "module": "mail",
    "action": "send",
    "options": {
      "instance": "mail",
      "replyTo": "office@iscagambia.com",
      "toName": "Sanjay",
      "toEmail": "engineer.sanjay20@gmail.com",
      "body": "Test",
      "fromName": "iscagambia",
      "fromEmail": "office@iscagambia.com",
      "subject": "Test"
    },
    "disabled": true
  },
  {
    "name": "",
    "module": "mail",
    "action": "send",
    "options": {
      "instance": "mail",
      "replyTo": "office@iscagambia.com",
      "toName": "Sanjay",
      "toEmail": "engineer.sanjay20@gmail.com",
      "body": "<table style=\"border:2px solid #000;margin-bottom:2px;border-bottom:0\">\n    <tr>\n      <td>\n        <div style=\"height:290px;width:290px;background-color:#eceff6;border-right:1px;padding:15px\">\n          <img style=\"height:65px\" src=\"https://iscagambia.com/assets/images/logo.jpeg\">\n          <p>Name: <strong>Sanjay Kumar</strong></p>\n          <p>Mobile: <strong>Sanjay Kumar</strong></p>\n          <p>Type: <strong>Sanjay Kumar</strong></p>\n          <p>Amount: <strong>Sanjay Kumar</strong></p>\n        </div>\n      </td>\n      <td><img style=\"height:320px;margin-left:-4px\" src=\"https://iscagambia.com/assets/images/ticket.jpeg\"></td>\n      <td>\n        <div style=\"height:290px;width:300px;background-color:#eceff6;border-right:1px;padding:15px;margin-left:-4px\">\n          <h3 style=\"color:brown;text-transform:uppercase;text-align:center\">LUCKY DIP TICKET</h3>\n          <h1 style=\"color:#ff8d00;text-transform:uppercase;text-align:center\">SILVER</h1>\n          <p style=\"color:#000;margin-top:20px;text-transform:uppercase;text-align:center\">TICKET NO:</p>\n          <p style=\"color:#ff8d00;font-size:22px;text-transform:uppercase;text-align:center;font-weight:600\">S10</p>\n          <img style=\"height:65px;float:right\" src=\"https://iscagambia.com/assets/images/logo.jpeg\">\n        </div>\n      </td>\n    </tr>\n  </table>\n  <table style=\"border:2px solid #000;border-top:2px dashed #000\">\n    <tr>\n      <td>\n        <div style=\"height:290px;width:290px;background-color:#eceff6;border-right:1px;padding:15px\">\n          <p style=\"margin-bottom:0px\">DUPLICATE</p><br>\n          <img style=\"height:65px\" src=\"https://iscagambia.com/assets/images/logo.jpeg\">\n          <p>Name: <strong>Sanjay Kumar</strong></p>\n          <p>Mobile: <strong>Sanjay Kumar</strong></p>\n          <p>Type: <strong>Sanjay Kumar</strong></p>\n          <p>Amount: <strong>Sanjay Kumar</strong></p>\n        </div>\n      </td>\n      <td><img style=\"height:320px;margin-left:-4px\" src=\"https://iscagambia.com/assets/images/ticket.jpeg\"></td>\n      <td>\n        <div style=\"height:290px;width:300px;background-color:#eceff6;border-right:1px;padding:15px;margin-left:-4px\">\n          <p>DUPLICATE</p>\n          <h3 style=\"color:brown;text-transform:uppercase;text-align:center\">LUCKY DIP TICKET</h3>\n          <h1 style=\"color:#ff8d00;text-transform:uppercase;text-align:center\">SILVER</h1>\n          <p style=\"color:#000;margin-top:20px;text-transform:uppercase;text-align:center\">TICKET NO:</p>\n          <p style=\"color:#ff8d00;font-size:22px;text-transform:uppercase;text-align:center;font-weight:600\">S10</p>\n          <img style=\"height:65px;float:right\" src=\"https://iscagambia.com/assets/images/logo.jpeg\">\n        </div>\n      </td>\n    </tr>\n  </table>",
      "fromName": "iscagambia",
      "fromEmail": "office@iscagambia.com",
      "subject": "Test",
      "contentType": "html",
      "embedImages": true
    },
    "output": true
  }
]
JSON
);
?>