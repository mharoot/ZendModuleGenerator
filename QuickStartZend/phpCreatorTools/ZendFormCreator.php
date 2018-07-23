<?php
/**
 * Execute this php script by running and passing 5 arguments:
 * php ZendFormCreator.php {Module Name} {db name} {db host} {db user} {db pass}  >> path/to/file
 * 
 * Example:
 * php ZendFormCreator.php Product emvc localhost root password >> module/Product/src/Model/ProductForm.php
*/
require_once 'DB.php';
class ZendFormCreator extends DB {
    public function __construct($moduleName, $dbName, $dbHost, $dbUser, $dbPass) {
        parent::__construct($moduleName, $dbName, $dbHost, $dbUser, $dbPass);
    }

    private function header() {
        $module = ucfirst($this->tablename);
        printf("<?php\nnamespace $module\Form;\n\nuse Zend\Form\Form;\n\n");
        printf("class %sForm extends Form\n{\n", $module);
        printf("\tpublic function __construct(\$name = null) {\n");
        printf("\t\t// We will ignore the name provided to the constructor\n");
        printf("\t\tparent::__construct('%s');\n\n", $this->tablename);
    }

    private function footer() {
        printf("\t\t\$this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);\n");
    }

    public function run() {
        $this->header();
        $nodeCols = $this->getFieldInfo();

        // assumed first field is the primary key
        printf ("\t\t\$this->add([\n\t\t\t'name' => '%s',\n\t\t\t'type' => 'hidden',\n\t\t]);\n", $nodeCols[0]->field);

        // rest of cols
        $n = count( $nodeCols );
        for ($i = 1; $i < $n; $i++) {
            $name = $nodeCols[$i]->field;
            $type = $nodeCols[$i]->type;
            $size = $nodeCols[$i]->size;
            $label = ucfirst($name);

            printf ("\t\t\$this->add([\n\t\t\t'name' => '%s',\n\t\t\t'type' => '%s',\n\t\t\t'options' => [\n\t\t\t\t'label' => '%s',\n\t\t\t],\n\t\t]);\n", $name, $type, $label);
        }
        $this->footer();
        // end of constructor
        printf("\t}\n\n}");
    }

}

// php ZendFormCreator.php Product emvc localhost root password  >> codeGenerated.php
$ZFC = new ZendFormCreator($argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
$ZFC->run();