<?php
/**
 * Serial number generator.
 * 
 * @package serial-number-generator
 * @version 0.1
 * @author Vee W.
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace Rundiz\SerialNumberGenerator;

/**
 * Serial number generator class that will generate the serial number in all UPPER case and non ambiguous letters.
 * 
 * @link http://stackoverflow.com/questions/11919708/set-of-unambiguous-looking-letters-numbers-for-user-input Ambiguous letters.
 * @link http://stackoverflow.com/questions/1051175/can-you-recommend-any-information-about-least-ambiguous-letters-numbers Ambiguous letters.
 * @author Vee W.
 */
class SerialNumberGenerator
{


    /**
     * @var array Available characters.
     */
    protected $availableCharacters = [];


    /**
     * @var integer Number of total chunks. Default is 5. Example: XXXXX-BBBBB-ZZZZZ-AAAAA-YYYYY
     */
    public $numberChunks = 5;


    /**
     * @var integer Number of total letters per chunk. Default is 5. Example: XXXXX-XXXXX-XXXXX-XXXXX
     */
    public $numberLettersPerChunk = 5;


    /**
     * @var string Separate chunk by text. Default is '-' (without single quote).
     */
    public $separateChunkText = '-';


    /**
     * @var integer Total available characters. This is for calculation only.
     */
    protected $totalAvailableCharacters = 0;


    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->availableCharacters = $this->availableCharacters();
        $this->totalAvailableCharacters = count($this->availableCharacters);
    }// __construct


    /**
     * Get all available characters.
     * 
     * @return array Return array of available characters.
     */
    protected function availableCharacters()
    {
        // number come first. any letters that ambiguous with number will be comment out.
        return [
            '0', // ambiguous with O
            '1', // ambiguous with I J L T
            '2', // ambiguous with Z
            '3',
            '4',
            '5', // ambiguous with S
            '6',
            '7',
            '8', // ambiguous with B
            '9',
            'A',
            //'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            //'I',
            //'J',
            'K',
            //'L',
            'M',
            'N',
            //'O',
            'P',
            'Q',
            'R',
            //'S',
            //'T',
            'U', // ambiguous with V
            //'V', // ambiguous with U, double V (VV) or double u (W). so, i prefer W because V also ambiguous with U but U not ambiguous with W.
            'W',
            'X',
            'Y',
            //'Z',
        ];
    }// availableCharacters


    /**
     * Generate the serial number.
     * 
     * @return string Return generated serial number.
     */
    public function generate()
    {
        $this->validateProperties();

        $output = '';

        for ($chunk = 1; $chunk <= $this->numberChunks; $chunk++) {
            for ($letter = 1; $letter <= $this->numberLettersPerChunk; $letter++) {
                if (function_exists('mt_rand')) {
                    $output .= $this->availableCharacters[mt_rand(0, ($this->totalAvailableCharacters - 1))];
                } else {
                    $output .= $this->availableCharacters[array_rand($this->availableCharacters)];
                }
            }// endfor;
            unset($letter);

            if ($chunk < $this->numberChunks) {
                $output .= $this->separateChunkText;
            }
        }// endfor;
        unset($chunk);

        return $output;
    }// generate


    /**
     * Reset all properties and begins again.
     */
    public function reset()
    {
        $this->availableCharacters = $this->availableCharacters();
        $this->numberChunks = 5;
        $this->numberLettersPerChunk = 5;
        $this->separateChunkText = '-';
        $this->totalAvailableCharacters = count($this->availableCharacters);
    }// reset


    /**
     * Validate properties that it contain valid format and value.<br>
     * If something invalid, it will automatically call to reset() method.
     */
    protected function validateProperties()
    {
        if (!is_array($this->availableCharacters) || empty($this->availableCharacters)) {
            $this->reset();
        }

        if (!is_int($this->numberChunks) || !is_int($this->numberLettersPerChunk) || $this->numberChunks < 1 || $this->numberLettersPerChunk < 1) {
            $this->reset();
        }

        if (!is_numeric($this->totalAvailableCharacters)) {
            $this->reset();
        }
    }// validateProperties


}