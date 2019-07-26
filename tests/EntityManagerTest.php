<?php

namespace TDD\Test;

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

use PHPUnit\Framework\TestCase;

use Src\EntityManager;

use Src\Entity\StarCorpianos;

use Src\Entity\IT;

use Src\Entity\StarCorp;

class EntityManagerTest extends TestCase
{
	public function testExpectStarCorpActualStarCorp() 
	{
		$this->expectOutputString('StarCorp');
		$entityManager = new EntityManager(5);
		$entityManager->mergeEntitiesIntoNumbers([new StarCorp], 5);
		print $entityManager->getNumber(3);
	}

	public function testExpectITActualIT() 
	{
		$this->expectOutputString('IT');
		$entityManager = new EntityManager(10);
		$entityManager->mergeEntitiesIntoNumbers([new IT], 10);
		print $entityManager->getNumber(5);
	}

	public function testExpectStarCorpianosActualStarCorpianos() 
	{
		$this->expectOutputString('StarCorpianos');
		$entityManager = new EntityManager(20);
		$entityManager->mergeEntitiesIntoNumbers([new StarCorpianos], 20);
		print $entityManager->getNumber(15);
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
		$entityManager = new EntityManager(3);
		$entityManager->mergeEntitiesIntoNumbers([new StarCorp], 3);
        $this->assertEquals($expected, $entityManager->getNumber($value));
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
		$entityManager = new EntityManager(5);
		$entityManager->mergeEntitiesIntoNumbers([new IT], 5);
        $this->assertEquals($expected, $entityManager->getNumber($value));
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
		$entityManager = new EntityManager(15);
		$entityManager->mergeEntitiesIntoNumbers([new StarCorpianos], 15);
        $this->assertEquals($expected, $entityManager->getNumber($value));
	}

	public function dataEntities()
    {
        return [
            [1, 1],
            [2, 2],
			[3, StarCorp::NAME],
			[4, 4],
			[5, IT::NAME],
			[6, StarCorp::NAME],
			[7, 7],
			[8, 8],
			[9, StarCorp::NAME],
			[10, IT::NAME],
			[11, 11],
			[12, StarCorp::NAME],
			[13, 13],
			[14, 14],
			[15, StarCorpianos::NAME]
        ];
    }

    /**
     * @dataProvider dataEntities
     */
    public function testMergeEntities($value, $expected)
    {
		$entityManager = new EntityManager(15);
		$entityManager->mergeEntitiesIntoNumbers([new Starcorp, new IT, new StarCorpianos], 15);
        $this->assertEquals($expected, $entityManager->getNumber($value));
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
	public function testMergeEntityNull($value, $expected)
	{
		$entityManager = new EntityManager(15);
		$entityManager->mergeEntitiesIntoNumbers([null], 15);
        $this->assertEquals($expected, $entityManager->getNumber($value));
	}
}
