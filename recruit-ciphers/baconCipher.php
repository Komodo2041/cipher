<?php 

require_once("src.php");

class baconCipher implements CiphersContract {

 
    protected $checker = null;
    protected $map = [];

    public function __construct() {
        
        $number = 0;
        for ($i = ord('a'); $i <= ord('z'); $i++) {
 
            $this->map[chr($i)] = $this->changetoAB($this->addzero(decbin($number)));
            if ($i != ord('i') && $i != ord('u')) {
               $number++;
            }            
        }
    }

    private function addzero($str) {
        $res = "";
        for ($i = 0; $i < (5 - strlen($str)); $i++) {
           $res .= "0";
        } 
        return $res.$str;
    }

    private function changetoAB($str) {
        return str_replace(['0', '1'], ['a', 'b'], $str);
    }

    public function encrypt(string $input):string {
    
        $length = strlen($input);
        $res = '';
        for ($i = 0; $i < $length; $i++) {
            $res .= $this->changeletter($input[$i]);
        }
        return $res;
    }

    public function decrypt(string $input):string {
      
        $length = strlen($input);
        $res = '';
        $tableString = [];
        for ($i = 0; $i <= $length - 5; $i += 5) {
          $tableString[] = substr($input, $i, 5);
        }        
        $map2 = array_flip($this->map);
        for ($i = 0; $i < count($tableString); $i++) {
             $res .= $map2[$tableString[$i]];
        }
        return $res;
    }    

    private function changeletter($letter) {
        return $this->map[$letter];
    }

}
 

$cipher = new baconCipher();
$val = "kajak";
$stringA = $cipher->encrypt($val);
echo $val." -> ".$stringA."<br/>";

$val = "ananas";
$stringB = $cipher->encrypt($val);
echo $val." -> ".$stringB."<br/>";
 
$val = "abcabc";
$stringC = $cipher->encrypt($val);
echo $val." -> ".$stringC."<br/>";

$val = $cipher->decrypt($stringA);
echo "Deccrypt: ".$stringA." -> ".$val."<br/>";
 
$val = $cipher->decrypt($stringB);
echo "Deccrypt: ".$stringB." -> ".$val."<br/>";
 
$val = $cipher->decrypt($stringC);
echo "Deccrypt: ".$stringC." -> ".$val."<br/>"; 
 