Start MYSQL in Terminal:
`mysql -u root -p`
And put your password.
After that, you can create the sql scripts.
`CREATE DATABASE aula7;`
`USE aula7;`
`SHOW TABLES;`


To set a env variable, put this in the terminal:
`export var_name=var`
Example: `export db_pass=password`
And for use in the code: `getenv('db_pass')`