dmx.config({
  "admin": {
    "query": [
      {
        "type": "text",
        "name": "offset"
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
    "ddRecords": {
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
          "name": "mobile"
        },
        {
          "type": "text",
          "name": "membership_type"
        },
        {
          "type": "datetime",
          "name": "created_on"
        }
      ],
      "outputType": "array"
    },
    "tableRepeatSeats": {
      "meta": [
        {
          "type": "number",
          "name": "seat_id"
        },
        {
          "type": "number",
          "name": "booking_id"
        },
        {
          "type": "text",
          "name": "seat"
        },
        {
          "type": "text",
          "name": "accept_reject"
        },
        {
          "type": "text",
          "name": "member_name"
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
      ],
      "outputType": "array"
    }
  }
});
