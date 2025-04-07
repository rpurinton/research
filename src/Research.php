<?php

namespace RPurinton\Research;

use RPurinton\OpenAI;

class Research
{
    private OpenAI $ai;
    private string $query;

    public function __construct(array $argv = [])
    {
        $this->ai = OpenAI::connect();
	unset($argv[0]);
        $this->query = implode(" ", $argv);
        echo("Query: {$this->query}\n");
    }
}
