
* Source:  Passwords__Have_I_Been_Pwned.java
* Command: Passwords__Have_I_Been_Pwned__Compile_and_Run.bat
* Author:  Mike "Moose" OMalley
* Email:   Moose UNDERSCORE Software AT yahoo DOT com DOT au
* WEB #1:  http://moosesoftware.16mb.com
* WEB #2:  http://moosesoftware.netau.net
* Date:    25-Feb-2018
* License: Copyleft 2018.
           Free for any person, company, or business to use.
           This comment block at the top of this file *must* remain intact.

* Description:  Check if any passwords are on the Have I Been Pwned (HIBP) web site.
* Requirements: Java Development Kit (JDK) installed on your machine.
                http://www.oracle.com/technetwork/java/javase/downloads/index.html

Step 1. Edit: Passwords__Have_I_Been_Pwned.java
* Scroll down and enter your passwords in the PASSWORDS_ARRAY.
* Examples included below.  Enter your passwords in double quotes and comma separated.
* Save the changes.

Step 2: Open a command prompt and navigate to the directory
where Passwords__Have_I_Been_Pwned.java is saved
and compile and then run.

To compile, enter this command:
   javac Passwords__Have_I_Been_Pwned.java

To run, enter this command:
   java Passwords__Have_I_Been_Pwned

Or, for Windows users, I have included a .BAT command file:

   Passwords__Have_I_Been_Pwned__Compile_and_Run.bat

which contains the compile and run commands.
Just double click on it to compile and run the java program.
NOTE: you will need to edit the directory paths in the .BAT file
to suit your Java installation.


*** Sample Output:

---------------------------------------
Have I Been Pwned Password Check:
---------------------------------------

 ID  Pwned? Password
  1.   Y    abc123
  2.   Y    P@ssw0rd
  3.   Y    password
  4.   Y    password1
  5.   Y    p@ssword
  6.   N    abcd1234.zxc

*** WARNING: YOU HAVE BEEN PWNED 5 times !!! :(


Any questions, comments, feedback, please let me know.  :)

 Mike "Moose" OMalley
____________________________________________________
Moose's Software Valley - Established July, 1996.
* Email:  Moose UNDERSCORE Software AT yahoo DOT com DOT au
* WEB #1: http://moosesoftware.16mb.com
* WEB #2: http://moosesoftware.netau.net
If web site #1 above has not had an update in months,
please check the others(s). :)
____________________________________________________
