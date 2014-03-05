<?php

#this is the input that will be passed in a text area from the front end to myself
#just used a placeholder to make sure it works
$output =
    "public static void main(String[] args) {
        String speak = \"Hello World from Populate!\";
        System.out.println(speak);
    }";
    
    
$file = "MyClass.java"; #this is the name of the predetermined java file, already populated with a class name. 
file_put_contents($file, $output, FILE_APPEND); #appends the input passed from the front end to the premade java file
file_put_contents($file, "}", FILE_APPEND); #adds the extra closing brace that pairs up with the class name declaration
exec("javac MyClass.java"); #compiles the java code 
echo exec("java MyClass"); #echo the output of the java code. DON"T FORGET EXEC ONLY CAPTURES THE LAST LINE OF OUTPUT. I BELIEVE PASSTHRU CAPTURES IT ALL.
exec("cp -rf ./restore/MyClass.java ."); #copies the backup java file, containing only the class declaration, back into the main folder, in preparation for another student to take the exam
exec("rm MyClass.class"); #removes the class file created from a previous student taking the exam.
                            #had to change access rights for a lot of this stuff. previous line allows deletion of my files. risky stuff.
                            #for final project, don't forget to check and modify access rights 
    
#I don't know how to show you a listing of my directories, but it successfully appends to the file, compiles, runs, replaces the "correct" java file with the empty backup file, and removes the created class file.

?>
