<?php

namespace EventSauce\EventSourcing\CodeGeneration;

interface DefinitionLoader
{
    public function canLoad(string $filename): bool;
    public function load(string $filename): DefinitionGroup;
}