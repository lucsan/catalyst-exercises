<?php
/**
 * PHP version 7
 * fileSystem.php
 * Author L Tennant
 */
namespace fauxder;


interface FaulderInterface
{
    public function setFaulder (Faulder $folder);
    public function setPhile (Phile $phile);
    public function getFaulders ();
    public function getPhiles ();
}

abstract class FaulderBase implements FaulderInterface
{
    private $name = '';
    private $faulders = [];
    private $philes =[];

    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function getName ()
    {
        return $this->name;
    }

    public function setFaulder(Faulder $faulder) {
        $this->faulders[] = $faulder;
    }

    public function setPhile (Phile $phile) {
        $this->philes[] = $phile;
    }

    public function getFaulders () {
        return $this->faulders;
    }

    public function getPhiles () {
        return $this->philes;
    }
}

class Phile
{
    private $name = '';
    private $chars = '';

    public function __construct (String $name, String $chars)
    {
        $this->name = $name;
        $this->chars = $chars;
    }

    public function getName ()
    {
        return $this->name;
    }

    public function getChars ()
    {
        return $this->chars;
    }
}

class Faulder extends FaulderBase
{


}

class OddFaulder extends FaulderBase
{
    public function __construct (String $name)
    {
        if (strlen($name) > 4) {
            echo "Error: faulder name must be less than 5 chars. you gave {$name}", PHP_EOL;
            return "Error: 123";
        }
        parent::__construct($name);
    }
}

$pa = new Phile('afile', 'somecharsaaaa');
$pb = new Phile('bfile', 'somecharsbbbb');
$pc = new Phile('cfile', 'somecharscccc');

$fa = new Faulder('afolder');
$fb = new Faulder('bfolder');
$fc = new Faulder('cfolder');

$ofa = new OddFaulder('barry');
$ofa = new OddFaulder('baza');

echo "OddFaulders", PHP_EOL;
echo $ofa->getName(), PHP_EOL;

$fa->setFaulder($fb);
$fa->setPhile($pa);
$fa->setPhile($pb);
$fc->setPhile($pc);
$fa->setFaulder($fc);

echo "Faulders", PHP_EOL;
print_r($fa->getFaulders());

echo "Philes", PHP_EOL;
print_r($fa->getPhiles());

echo "afolder files list", PHP_EOL;
foreach ($fa->getPhiles() as $phile) {
    echo $phile->getName(), PHP_EOL;
}

echo "afolder folder list", PHP_EOL;
foreach ($fa->getFaulders() as $faulder) {
    echo $faulder->getName(), PHP_EOL;
}
