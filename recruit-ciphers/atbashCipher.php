<?php 

require_once("src.php");

class atBashCipher implements CiphersContract {

 
 
    public function encrypt(string $input):string {
    
        $length = strlen($input);
        $res = '';
        for ($i = 0; $i < $length; $i++) {
            $res .= $this->changeletter($input[$i]);
        }
        return $res;
    }

    public function decrypt(string $input):string {      
        return $this->encrypt($input);
    }    

    private function changeletter($letter) {
 
       $value = ord('z') - (ord($letter) - ord('a'));
       return chr($value);

    }

}
 

$cipher = new atBashCipher();
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
 