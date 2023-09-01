#! /bin/bash

# Get One employee
curl  -v localhost:8080/employees/10015 | jq

# Get All employees
# curl  -v localhost:8080/employees | jq