 ## Laravel Framework 6.18.35 ##


- **/login** : for login credentails
- **/register** : for register 

- **/users** :  for all users or portal excluding ourself ,excluding 
                - that users which have blocked by current user and 
                - current user send request to other user and which has still pending 
    -  **Send Request** :  request send to other user and 
                        when other user will login and it will be listing in pending request section
                        record insert into user_friends table
    -  **Block** :         block to other user and 
                        it will not show to current user
                        record insert into user_user_blocks table
    -  **filter** :    we can filter user according gender and hobbies

- **/friends** :   it show all friends of current user 
- **/pending-requests** :   it show all pending request to current user,
    

