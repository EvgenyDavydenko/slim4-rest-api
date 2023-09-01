#! /bin/bash

curl -v localhost:8080/employees/10017 \
    -X PUT \
    -H "Content-Type: application/json" \
    -d '{"birth_date":"2001-04-20","first_name":"Kolya","last_name":"Ivanov","gender":"M","hire_date":"2020-06-02"}'
    