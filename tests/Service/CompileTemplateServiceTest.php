<?php


namespace App\Tests\Service;


use App\Service\CompileTemplateService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class CompileTemplateServiceTest extends TestCase
{
    public function test_compile_empty()
    {
        $html = '<h1>Titre</h1>';
        $exepted = '<h1>Titre</h1>';

        $compileTemplateService = new CompileTemplateService();
        $response = $compileTemplateService->compile($html, []);

        $this->assertEquals($exepted, $response);
    }

    public function test_compile_variable()
    {
        $html = '<h1>{{title}}</h1>';
        $data = ['title'=>'CV'];
        $exepted = '<h1>CV</h1>';

        $compileTemplateService = new CompileTemplateService();
        $response = $compileTemplateService->compile($html, $data);

        $this->assertEquals($exepted, $response);
    }

    public function test_compile_multi_variables()
    {
        $html = '
            <h1>{{title}}</h1>
            <h2>{{poste}}</h2>
        ';
        $data = ['title'=>'CV', 'poste'=>'Dev'];
        $exepted = '
            <h1>CV</h1>
            <h2>Dev</h2>
        ';

        $compileTemplateService = new CompileTemplateService();
        $response = $compileTemplateService->compile($html, $data);

        $this->assertEquals($exepted, $response);
    }

    public function test_compile_loop()
    {
        $html = '
        <ul>
			{% for skill in skills %}
			<li>{{ skill.skillName }}</li>
			{% endfor %}
		</ul>
		';
        $arrayData = ['skills'=>['Symfony', 'Angular', 'Spring']];
        $exepted = '
        <ul>
			<li>Symfony</li>
			<li>Angular</li>
			<li>Spring</li>
		</ul>
		';

        $compileTemplateService = new CompileTemplateService();
        $response = $compileTemplateService->compile($html, $arrayData);

        $this->assertEquals($exepted, $response);
    }
}