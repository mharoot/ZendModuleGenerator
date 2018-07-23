# testing purposes, do not uncomment 
# if you are using in zend project root directory
# rm -r module
# mkdir module

moduleName=$1
dbName=emvc
dbHost=localhost
dbUser=root
dbPass=password


QuickStartZend/./CreateModule.sh $moduleName $dbName $dbUser $dbPass

php QuickStartZend/phpCreatorTools/ZendFormCreator.php $moduleName $dbName $dbHost $dbUser $dbPass >> module/$moduleName/src/Form/$moduleName'Form.php'


php QuickStartZend/phpCreatorTools/ZendModelCreator.php $moduleName $dbName $dbHost $dbUser $dbPass >> module/$moduleName/src/Model/$moduleName.php