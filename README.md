# ZendModuleGenerator
Assuming you have a database set up like the one from this tutorial [https://docs.zendframework.com/tutorials/getting-started/skeleton-application/].  You 
can use this tool to quickly develop web applications and generate a working database.  Just following the conventions
and demonstrated in this tutorial and you can create skeleton like web applications fast in one command.
This tool can literally recreate the skeleton app in this tutorial [https://docs.zendframework.com/tutorials/getting-started/skeleton-application/].
To get started drop the QuickStartZend folder in the root project directory of your Zend project.  
- Within your root project folder give permission run the following command:

```
chmod +x QuickStart/./run.sh
```


### Database and Module Configurtion
Find the `QuickStartZend/./run.sh` and fill out your database config and module name following a strict convention:

```
	moduleName=Product
	dbName=emvc
	dbHost=localhost
	dbUser=root
	dbPass=password
```
#### Convention
- moduleName is by convention, capitalized first letter, and not allowed to be plural i.e. `Products` is not allowed.
- database table name= by convention it would be `product`
- database is using PDO you must have it installed and/or enabled in your `php.ini` file



# Some Assumptions that make this tool somewhat restrictive
- The table your using has a primary key id that is using some integer type.
- Your database table name has to be based on your on your Module Name
- Module Name must follow convention and so does database table.
	- i.e. ModuleName=Product, DatabaseTableName=product
- no plural allowed
	- i.e. ModuleName=Products, DatbaseTableName=products (DO NOT DO THIS)

# Run the file QuickStartZend/./run.sh:
Within your zend project root directory run the following command:
```
	QuickStartZend/./run.sh
```

# If you would like to test and inspect this tool
- Drop within any project root directory
- run the command within the root direct: `mkdir module`
- Following the Steps above to configure and run