# Project 3
+ By: Diane Bainbridge
+ Production URL: <http://p3.dianebainbridge.com>

## Outside resources
+ https://blog-en.openalfa.com/how-to-read-and-write-json-files-in-php
+ https://www.w3schools.com/Bootstrap/bootstrap_ref_css_tables.asp

## 3 Unique inputs
1. Text input for startDistance, endDistance and fuelVolume
2. Radio input for distanceUnit
3. Select for volumeUnit
4. Checkbox to indicate whether to add to log

## Packages
+ barryvdh/laravel-debugbar

## Code style divergences
+ In a few cases my lines of code wrap with over 80 characters


## Notes for instructor
+ I know I am being inconsistent by using a radio button for distanceUnit
and a drop down for volumeUnit but we needed to use 3 unique inputs for
this project.
+ Because we are not using databases yet I chose to store the log data
in a json file.  I know this is not the best method and will use a database
in project 4.  I also stored all data in one file with a fuelCalcID that 
 is stored for as a cookier for each user because this data is not sensitive.
