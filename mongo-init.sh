#!/bin/bash

username=$MONGO_USERNAME
password=$MONGO_PASSWORD
database=$MONGO_DATABASE

mongo <<EOF
db = db.getSiblingDB("$database");
db.createUser({
  user: "$username",
  pwd: "$password",
  roles: [
    { role: "readWrite", db: "$database" }
  ]
});
db.auth("$username", "$password");
EOF