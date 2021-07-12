<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\ProjectRepository;
use Repositories\ConstructionRepository;

class ProjectController extends Controller {

    //
    public function __construct(ProjectRepository $projectRepo, ConstructionRepository $constructionRepo) {
        $this->projectRepo = $projectRepo;
        $this->constructionRepo = $constructionRepo;
    }

    public function detail($alias) {
        $project = $this->projectRepo->findByAlias($alias);
        $record = $this->constructionRepo->find($project->construction_id);
        if (config('global.device') != 'pc') {
            return view('mobile/project/detail', compact('record', 'project'));
        }
        else{
            return view('frontend/project/detail', compact('record', 'project'));
        }
    }

}
