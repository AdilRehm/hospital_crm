namespace App/Helpers;
class UrduLanguage
{
    public static $urduChars=[
        'a' => 'ا',
'b' => 'ب',
'c' => 'س',
'd' => 'د',
'e' => 'ای',
'f' => 'ف',
'g' => 'جی',
'h' => 'ہ',
'i' => 'آئی',
'j' => 'جے',
'k' => 'کے',
'l' => 'ایل',
'm' => 'ایم',
'n' => 'این',
'o' => 'او',
'p' => 'پی',
'q' => 'کیو',
'r' => 'آر',
's' => 'اس',
't' => 'ٹی',
'u' => 'یو',
'v' => 'وی',
'w' => 'ڈبلیو',
'x' => 'ایکس',
'y' => 'وائی',
'z' => 'زی'
        ];
        public static function convertToUrdu($string){
            return strtr($string, self::$urduChars);
        }
}