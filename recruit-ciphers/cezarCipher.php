<?php 

require_once("src.php");

class cezarCipher implements CiphersContract {

    protected $shift = 3;
    protected $checker = null;
 
    public function encrypt(string $input):string {
    
        $length = strlen($input);
        $res = '';
        for ($i = 0; $i < $length; $i++) {
            $res .= $this->shiftsletter($input[$i], 0);
        }
        return $res;
    }

    public function decrypt(string $input):string {
      
        $length = strlen($input);
        $res = '';
        for ($i = 0; $i < $length; $i++) {
            $res .= $this->shiftsletter($input[$i], 1);
        }
        return $res;
    }    

    private function shiftsletter($letter, $ster = 0) {
       $diff = $this->shift;
       if ($ster) {
           $diff *= -1;
       }
       $value = ord($letter);
       $value += $diff;
       if ($value < ord('a')) {
          $value = ord('z') - (ord('a') - $value + 1);
       }
       if ($value > ord('z')) {
          $value = ord('a') + ($value - ord('z') - 1);
       }
       return chr($value);

    }

}
 

$cipher = new cezarCipher();
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
 