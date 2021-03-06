<?php

namespace EventSauce\EventSourcing\CodeGeneration;

use function file_put_contents;
use PHPUnit\Framework\TestCase;

class YamlDefinitionLoaderTest extends TestCase
{
    /**
     * @test
     */
    public function loading_definitions_from_yaml()
    {
        $loader = new YamlDefinitionLoader();
        $this->assertTrue($loader->canLoad('a_yaml_file.yaml'));
        $this->assertTrue($loader->canLoad('a_yaml_file.yml'));
        $this->assertFalse($loader->canLoad('not_a_yaml_file.php'));
        $definitionGroup = $loader->load(__DIR__.'/Fixtures/exampleDefinition.yaml');
        $dumper = new CodeDumper();
        $code = $dumper->dump($definitionGroup);
        file_put_contents(__DIR__.'/Fixtures/definedWithYamlFixture.php', $code);
        $expected = file_get_contents(__DIR__.'/Fixtures/definedWithYamlFixture.php');
        $this->assertEquals($expected, $code);
    }
}