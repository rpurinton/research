<?php

namespace RPurinton\Research;

use RPurinton\OpenAI;

class Research
{
    private OpenAI $ai;
    private string $query;

    public function __construct(array $argv = [])
    {
	unset($argv[0]);
        $this->query = implode(" ", $argv);
        if(empty($this->query)) die("Usage: research <query>\n");
        $this->ai = OpenAI::connect(getenv('OPENAI_KEY_RESEARCH'));
        $this->ai->prompt['messages'] = [
            [
                'role' => 'system',
                'content' => file_get_contents(__DIR__ . '/../prompt/system.txt'),
            ]
        ];
    }

    public static function begin(array $argv = [])
    {
        (new self($argv))->run();
    }

    public function run()
    {
        $response = $this->ai->ask("User research request: {$this->query}");
        print_r($response);
    }
}
