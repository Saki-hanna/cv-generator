<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 30/09/18
 * Time: 18:53
 */

namespace App\Tests\Service;

use App\Entity\SkillCategories;
use App\Service\GenerateWordService;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class GenerateWordServiceTest extends TestCase
{

    public function test_can_get_skill_category()
    {
        //mock data
        $skillCategories = new SkillCategories();
        $skillCategories->setCategoryName('Framework');
        // Now, mock the repository so it returns the mock of the employee
        $skillCategoriesRepository = $this->createMock(ObjectRepository::class);

        // $employeeRepository = $this->getMock(ObjectRepository::class);
        $skillCategoriesRepository->expects($this->any())
            ->method('find')
            ->willReturn($skillCategories);

        // Last, mock the EntityManager to return the mock of the repository
        $objectManager = $this->createMock(ObjectManager::class);

        // $objectManager = $this->getMock(ObjectManager::class);
        $objectManager->expects($this->any())
            ->method('getRepository')
            ->willReturn($skillCategoriesRepository);

        $generateWordService = new GenerateWordService($objectManager);
        $actual = $generateWordService->getSkillCategories();

        $this->assertEquals($skillCategories, $actual);
    }

    public function testAddContentInHtml()
    {

        $content = '##NOM##';
        $objectManager = $this->createMock(ObjectManager::class);
        $generateWordService = new GenerateWordService($objectManager);
        $actual = $generateWordService->addDataInTemplateHtml($content);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals('Roux', $actual);
    }
}