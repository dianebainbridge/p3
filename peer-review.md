## P3 Peer Review

+ Reviewer's name: Diane Bainbridge
+ Reviewee's name: (Michael) Bret B.
+ URL to Reviewee's P3 Github Repo URL: *https://github.com/bret-blackford/BMI-Laravel*


## 1. Interface

+ The first thing I noticed when I visited the site was that the lines of text in the form were not aligned.
+ The font size of the form text made it easy to read.
+ I found the date picker hard to use but entering the date directly into the box worked fine.
+ I liked that all of the form fields remained filled when the calculation was returned in the yellow box.
+ Maybe a different color for the calculation result text would have been better.  Red is often 
associated with errors.  
+ The text could also had a bit more padding around it.
+ I would suggest aligning all of form fields the same way.
+ I would also combine the height units i.e 
<br/>Height ___ feet ____ inches
+ The instructions were clear and the form was easy to use.
+ I would suggest bootstrap for styling.

## 2. Functional testing

+ When I tried submitting the form without entering any data I received 5 error messages.  These made it 
clear which fields were required and that I had to enter an integer weight between 1 and 800.
+ As I tried submitting the form with more fields entered the error messages began to disappear.
+ If a height is not entered the default of 1 foot is used. I would set the default values for feet 
and inches to blank so an error message is generated if they are not filled in.
+ I could enter a dob of 01/01/01 which made me 2018 years old.
+ When I entered p3.bret-dwa15.vip/aaaa I received a 404 error as expected.
+ When I entered p3.bret-dwa15.vip/calc I saw an exception. I suspect the debug setting was set to 
true in the production .env file.

## 3. Code: Routes
+ All of the routes looked good. 
+ There was one route that was not used in the production app which confused me a bit. When I tried to access 
this route as noted above I saw an exception.
Route::get('/calc/{title?}', 'BMIController@calc');

## 4. Code: Views

+ Template inheritance was used although the same css file was listed in both the master template and
the bmi view.
+ The view files looked good and used Blade syntax.
+ I liked the Blade syntax used for the old values in the select and the radio button and will 
incorporate this in my next project.

## 5. Code: General

+ There was a good deal of commented out and unused code in the controller which was not explained.
+ Function/method opening brace should be on its own line.
+ Extra spacing between lines.
+ There were no comments in the controller which made it difficult to understand especially since there were
unused functions.
+ There was an uncommented dump() in a controller method.

## 6. Misc
