#! /bin/bash

curl -v localhost:8080/employees \
    -X POST \
    -H "Content-Type: application/json" \
    -d '{"emp_no":"10017","birth_date":"2000-04-20","first_name":"Masha","last_name":"Pupkina","gender":"F","hire_date":"2020-06-02"}'
    