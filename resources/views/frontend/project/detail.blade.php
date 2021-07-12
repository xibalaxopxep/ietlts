@extends('frontend.layouts.construction')
@section('content')
<div class="bg-grey">
    @include('frontend.construction.cover')
    <div class="container">
        <div class="construction-detail bg-white row no-gutters">
            <div class="col-md-2 col-xs-12">
                <div class="hz-sidebar plr-15 ">
                    <div id="LeftSideBar" class="comp-box">
                        <div class="sidebar">
                            <div class="sidebar-header">Dự án</div>
                            <div class="sidebar-body">
                                <ul>
                                    @foreach($record->projects as $project)
                                    <li class="sidebar-item">
                                        <a class="" href="{{route('project.detail', ['alias' => $project->alias])}}">
                                            <span class="option-text">{{$project->title}}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12 plr-15 ">
                <div class="hz-main-contents">
                    <div id="rightSideContent" class="comp-box">
                        <h1 class="header-1 top">{{$project->title}}</h1>
                        <div id="projectDesc">
                            {{$project->description}}
                        </div>
                        <div id="projectSpaces" class="reloadMe browseListBody rimg">
                            @foreach ($project->gallery as $gallery)
                            <div class="imageArea ">
                                <a href="{{$gallery->url()}}" class="image-light" >
                                    <img class="gallery-image" src="{{$gallery->getImage()}}" alt="{{$project->title}}">
                                </a>
                            </div>
                            @endforeach
                            <div style="margin-bottom:10px">
                                <h6>Chia sẻ ngay: </h6>
                                <button class=" btn-lg" style="background:#627aad;border: none;" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{$project->url()}}', 'Facebook', 'width=600,height=400');" href="javascript:void(0)" class="rounded-circle tw" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></button>
                                <button class=" btn-lg" style="background:#4d9ed8;border: none;" onclick="window.open('https://twitter.com/intent/tweet?text={{$project->url()}}', 'Google', 'width=600,height=400');" href="javascript:void(0)" class="rounded-circle ff" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
