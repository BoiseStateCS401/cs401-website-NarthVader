<?php

$localhost_cleardb_url = "mysql://b8deff42a987e0:4bb0d01d@us-cdbr-iron-east-05.cleardb.net/heroku_2d8fb2711d81078?reconnect=true";

if(!getenv("CLEARDB_DATABASE_URL")) {
	putenv("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
}