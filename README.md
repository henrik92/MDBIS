MDBIS - Projekt
SoSe 17

 Authors: Lennard Gerdes, Henrik Weeken, David Bregulla

-------------

Table of Contents
    1. Requirements
    2. Install
    3. Datastructures
    4. Functions

--------------
1. Requirements
- JAVA v8
- PHP
- local DynamoDB


2. Install 

2.1. Load & Start local DynamoDB
-> http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/DynamoDBLocal.html
    - Open Terminal 
    - Navigate to DynamoDB Folder
    - execute "java -Djava.library.path=./DynamoDBLocal_lib -jar DynamoDBLocal.jar -sharedDb -port 8002"
        (important: -port 8002 is current Configuration)
 
2.2. Load Datasamples 
    -Open Terminal
    -Navigate to MDBIS-Project Folder
    -Start PHP Scripts:
        -1. Create Tables 
            "php createTables.php"
        -2. fetchData
            "php fetchData.php"
        -(3. Optional:)
            Delete Table
            "php deleteTable.php"

2.3. Start Project
    -Run the Code
    -Navigate to your local Webbrowser Address in Browser
    -Have fun