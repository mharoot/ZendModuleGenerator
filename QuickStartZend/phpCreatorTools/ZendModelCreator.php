<?php
require_once 'DB.php';

// Product emvc localhost root password
class ZendModelCreator extends DB {
    public $moduleName;
    public $nodeCols;
    public function __construct($module, $db, $dbHost, $dbUser, $dbPass) {
        $this->moduleName = $module;
        parent::__construct($module, $db, $dbHost, $dbUser, $dbPass);
        $this->nodeCols = $this->getFieldInfo();
    }

    public function header() {
        printf("<?php\nnamespace $this->moduleName\Model;\n");
        printf("use DomainException;\n");
        printf("use Zend\Filter\StringTrim;\nuse Zend\Filter\StripTags;\nuse Zend\Filter\ToInt;\n");
        printf("use Zend\InputFilter\InputFilter;\nuse Zend\InputFilter\InputFilterAwareInterface;\nuse Zend\InputFilter\InputFilterInterface;\n");
        printf("use Zend\Validator\StringLength;\n\n");
        printf("class $this->moduleName implements InputFilterAwareInterface { \n");
    }

    public function fields() {
        foreach ($this->nodeCols as $nodeCol) {
            printf("\tpublic \$$nodeCol->field;\n");
        }
        printf("\n");
    }

    public function exchangeArray() {
        printf("\tpublic function exchangeArray(array \$data) { \n");
        foreach( $this->nodeCols as $nodeCol) {
            $field = $nodeCol->field;
            printf("\t\t\$this->$field = !empty(\$data['$field']) ? \$data['$field'] : null;\n");
        }
        printf("\t}\n\n");
    }

    public function getArrayCopy() {
        printf("\tpublic function getArrayCopy() { \n");
        printf("\t\treturn [\n");
        foreach($this->nodeCols as $nodeCol) {
            $field = $nodeCol->field;
            printf("\t\t\t'$field' => \$this->$field,\n");
        }
        printf("\t\t];\n\t}\n\n");
    }

    public function setInputFilter() {
        printf("	public function setInputFilter(InputFilterInterface \$inputFilter) {
            throw new DomainException(sprintf(
                \"Product does not allow injection of an alternate input filter\"
            ));
        }\n\n");
    }

    public function getInputFilter() {
        printf("\tpublic function getInputFilter() { \n");
        printf("		if (\$this->inputFilter) {
			return \$this->inputFilter;
        }\n 		\$inputFilter = new InputFilter();\n");
        
        foreach ($this->nodeCols as $nodeCol) {
            $type = $nodeCol->type;
            $name = $nodeCol->field;

            printf("\n\t\t\$inputFilter->add([\n");
            printf("\t\t\t'name' => '$name',\n");
            printf("\t\t\t'required' => true,\n");
            printf("\t\t\t'filters' => [ \n");

            if ($type === "text") {
                printf("\t\t\t\t['name' => StripTags::class],\n");
                printf("\t\t\t\t['name' => StringTrim::class],\n");
                printf("\t\t\t],\n");// end of filters

                printf("\t\t\t'validators' => [ \n\t\t\t\t[");
                printf("\t\t\t\t\t'name' => StringLength::class,\n");
                printf("\t\t\t\t\t'options' => [ \n");
                printf("\t\t\t\t\t\t'encoding' => 'UTF-8',\n");
                printf("\t\t\t\t\t\t'min' => 1, 'max' => $nodeCol->size,\n");
                printf("\t\t\t\t\t],\n\t\t\t\t],\n\t\t\t],\n\t\t]);");

            } else if ($type === "number") {
                printf("\t\t\t\t['name' => ToInt::class],\n");
                printf("\t\t\t],\n\t\t]);");//end
            }

        }

        printf("\n\t\t\$this->inputFilter = \$inputFilter;\n\t\treturn \$this->inputFilter;\n\t}\n\n}"); //closing class bracket
    }

    public function run() {
        $this->header();
        $this->fields();
        $this->exchangeArray();
        $this->getArrayCopy();
        $this->setInputFilter();
        $this->getInputFilter();

    }
}

$ZMC = new ZendModelCreator($argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
$ZMC->run();

