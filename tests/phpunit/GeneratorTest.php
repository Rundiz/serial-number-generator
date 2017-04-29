<?php


namespace Rundiz\SerialNumberGenerator\Tests;

class GeneratorTest extends \PHPUnit\Framework\TestCase
{


    /**
     * Test standard basic generator. Expect result is 29.
     */
    public function testBasicGenerator()
    {
        $SerialNumberGenerator = new \Rundiz\SerialNumberGenerator\SerialNumberGenerator();
        $result = $SerialNumberGenerator->generate();
        unset($SerialNumberGenerator);

        $this->assertEquals(29, strlen($result));
    }// testBasicGenerator


    /**
     * Test remove separate chunk text. (-) Expect result is 25.
     */
    public function testRemoveSeparateText()
    {
        $SerialNumberGenerator = new \Rundiz\SerialNumberGenerator\SerialNumberGenerator();
        $SerialNumberGenerator->separateChunkText = '';
        $result = $SerialNumberGenerator->generate();
        unset($SerialNumberGenerator);

        $this->assertEquals(25, strlen($result));
    }// testRemoveSeparateText


    /**
     * Remove all separate chunk text, chunk number is 1, letters is 9. Expect result is 9.
     */
    public function testGenerateNineCharsOnly()
    {
        $SerialNumberGenerator = new \Rundiz\SerialNumberGenerator\SerialNumberGenerator();
        $SerialNumberGenerator->numberChunks = 1;
        $SerialNumberGenerator->numberLettersPerChunk = 9;
        $SerialNumberGenerator->separateChunkText = '';
        $result = $SerialNumberGenerator->generate();
        unset($SerialNumberGenerator);

        $this->assertEquals(9, strlen($result));
    }// testGenerateNineCharsOnly


    /**
     * Chunk number is 3, letters is 7. Expect result is 23.
     */
    public function testThreeChunksSevenLetters()
    {
        $SerialNumberGenerator = new \Rundiz\SerialNumberGenerator\SerialNumberGenerator();
        $SerialNumberGenerator->numberChunks = 3;
        $SerialNumberGenerator->numberLettersPerChunk = 7;
        $result = $SerialNumberGenerator->generate();
        unset($SerialNumberGenerator);

        $this->assertEquals(23, strlen($result));
    }// testThreeChunksSevenLetters


    /**
     * Test 3 chunks and 3 letters, separator is colon (:). Expect found colon is 2.
     */
    public function testThreeChunksAndLettersCollonSeparator()
    {
        $SerialNumberGenerator = new \Rundiz\SerialNumberGenerator\SerialNumberGenerator();
        $SerialNumberGenerator->numberChunks = 3;
        $SerialNumberGenerator->numberLettersPerChunk = 3;
        $SerialNumberGenerator->separateChunkText = ':';
        $result = $SerialNumberGenerator->generate();
        unset($SerialNumberGenerator);

        $this->assertEquals(2, substr_count($result, ':'));
    }// testThreeChunksAndLettersCollonSeparator


}
