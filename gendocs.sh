#!/bin/bash

# gendocs.sh - Generate documentation for website using phpdoc

# --directory The directory whose contents you intend to document
# --target    The directory to which the documents will be written
# --title     Title for the project being documented

DIR=./html/public/staff
TARGET=$HOME/Documents/RegencyWebDocumentation
TITLE=RegencyWeb

phpdoc --directory=$DIR --target=$TARGET --title=$TITLE

