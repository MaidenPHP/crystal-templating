<?php

use App\Components\Crystal\Crystal;

class CrystalTest extends \PHPUnit\Framework\TestCase
{
    public function testCrystal()
    {
        $crystal = new Crystal();

        $content = $crystal->render('crystal', [
            'name' => 'Gosu',
            'game' => 'League of Legends',
            'foods' => [
                'Ramen',
                'Chips',
                'Hot pot'
            ]
        ]);

        $expected_content = file_get_contents(getcwd() . '/tests/expected_output.php');

        $this->assertEquals($content, $expected_content);
    }
}