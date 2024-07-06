#!/bin/bash

# chmod +x permissions.sh to make the file executable
# Run the script with ./permissions.sh

# Navigate to the server directory
# cd ~/Documents/ecom/server

# Set directory permissions
chmod 755 Controllers Models config database

# Set file permissions
chmod 644 api.php Controllers/ListingsController.php Models/Listing.php config/init_db.php

# Set database file permissions
chmod 644 database/database.sqlite
