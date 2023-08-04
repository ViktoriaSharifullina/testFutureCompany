<?php

namespace Database\Seeders;

use App\Models\Notebook;
use Database\Factories\NotebookFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factory = NotebookFactory::new();

        $factory->count(20)->create();
    }
}
