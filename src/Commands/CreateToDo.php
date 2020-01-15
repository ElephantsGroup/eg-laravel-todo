<?php

namespace ElephantsGroup\ToDo\Commands;

use Illuminate\Console\Command;
use ElephantsGroup\ToDo\Task;

class CreateToDo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todo:create {title} {description?} {--done : whether the task created as done or not}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a todo task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $task = new Task;
        $task->title = $this->argument('title');
        $task->description = $this->argument('description') ?? "";
        $task->done = false;
        if ($this->option('done'))
            $task->done = true;
        $task->save();
    }
}