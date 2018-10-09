<?php

namespace Bpocallaghan\Titan\Commands;

use Bpocallaghan\Titan\Seeds\DatabaseSeeder;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class DatabaseSeedCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'titan:db:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database (add startup data into core tables).';

    /**
     * @var Filesystem
     */
    private $filesystem;

    private $appPath;

    private $basePath;

    // directory separator
    private $ds;

    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->ds = DIRECTORY_SEPARATOR;
        $this->filesystem = $filesystem;

        $this->basePath = __DIR__ . $this->ds . '..' . $this->ds . '..' . $this->ds;
        $this->appPath = $this->basePath . "app" . $this->ds;
    }

    /**
     * Execute the command
     */
    public function handle()
    {
        $seed = new DatabaseSeeder();
        $seed->run();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

        ];
    }
}