<?php

namespace TDD\Test;

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

use PHPUnit\Framework\TestCase;

use Src\EntityManager;

use Src\Entity\StarCorpianos;

use Src\Entity\IT;

use Src\Entity\StarCorp;

use Src\EntityNumbersGenerator;

class EntityManagerTest extends TestCase
{
	public function testExpectStarCorpActualStarCorp() 
	{
		$this->expectOutputString('StarCorp');
		$entity = new EntityManager(5);
		$entity->mergeEntitiesIntoNumbers([new StarCorp], 5);
		print $entity->getNumber(3);
	}

	public function testExpectITActualIT() 
	{
		$this->expectOutputString('IT');
		$entity = new EntityManager(10);
		$entity->mergeEntitiesIntoNumbers([new IT], 10);
		print $entity->getNumber(5);
	}

	public function testExpectStarCorpianosActualStarCorpianos() 
	{
		$this->expectOutputString('StarCorpianos');
		$entity = new EntityManager(20);
		$entity->mergeEntitiesIntoNumbers([new StarCorpianos], 20);
		print $entity->getNumber(15);
	}

	public function testPrintFormattedNumbers()
    {			
        $entities = [
            new StarCorp(),
            new IT(),
            new StarCorpianos(),
		];
		
		$entityManager = new EntityManager(15);
		$entityManager->mergeEntitiesIntoNumbers($entities, 15);
		ob_start();
        $entityManager->printFormattedNumbers(1, 15);
        $output = ob_get_contents();
		ob_end_clean();
		$this->assertEquals(
			"1<br>2<br>StarCorp<br>4<br>IT<br>StarCorp<br>7<br>8<br>StarCorp".
			"<br>IT<br>11<br>StarCorp<br>13<br>14<br>StarCorpianos<br>",
			$output
		);
	}
	
	public function dataStarCorp()
    {
        return [
            [1, 1],
            [2, 2],
            [3, StarCorp::NAME]
        ];
    }

    /**
     * @dataProvider dataStarCorp
     */
    public function testMergeStarCorp($value, $expected)
    {
		$entity = new EntityManager(3);
		$entity->mergeEntitiesIntoNumbers([new StarCorp], 3);
        $this->assertEquals($expected, $entity->getNumber($value));
	}
	
	public function dataIT()
    {
        return [
            [1, 1],
            [2, 2],
			[3, 3],
			[4, 4],
			[5, IT::NAME]
        ];
    }

    /**
     * @dataProvider dataIT
     */
    public function testMergeIT($value, $expected)
    {
		$entity = new EntityManager(5);
		$entity->mergeEntitiesIntoNumbers([new IT], 5);
        $this->assertEquals($expected, $entity->getNumber($value));
	}

	public function dataStarCorpianos()
    {
        return [
            [1, 1],
            [2, 2],
			[3, 3],
			[4, 4],
			[5, 5],
			[6, 6],
			[7, 7],
			[8, 8],
			[9, 9],
			[10, 10],
			[11, 11],
			[12, 12],
			[13, 13],
			[14, 14],
			[15, StarCorpianos::NAME]
        ];
    }

    /**
     * @dataProvider dataStarCorpianos
     */
    public function testMergeStarCorpianos($value, $expected)
    {
		$entity = new EntityManager(15);
		$entity->mergeEntitiesIntoNumbers([new StarCorpianos], 15);
        $this->assertEquals($expected, $entity->getNumber($value));
	}

	public function dataEntityNull()
    {
        return [
            [1, 1],
            [2, 2],
			[3, 3],
			[4, 4],
			[5, 5],
			[6, 6],
			[7, 7],
			[8, 8],
			[9, 9],
			[10, 10],
			[11, 11],
			[12, 12],
			[13, 13],
			[14, 14],
			[15, 15]
        ];
	}
	
    /**
     * @dataProvider dataEntityNull
     */
	public function testeMergeEntityNull($value, $expected)
	{
		$entity = new EntityManager(15);
		$entity->mergeEntitiesIntoNumbers([null], 15);
        $this->assertEquals($expected, $entity->getNumber($value));
	}
}
