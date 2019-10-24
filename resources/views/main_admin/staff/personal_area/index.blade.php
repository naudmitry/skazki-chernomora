@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Персонал',
        'page' => 'Страница пользователя'
    ])

    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
                <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                    <h4>{{ $admin->full_name }}</h4>
                    <p>{{ $admin->position }}</p>
                </div>
                <div class="cover-image"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-settings" data-toggle="tab">Настройки</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-timeline" data-toggle="tab">Timeline</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">

                <div class="tab-pane fade" id="user-timeline">
                    <div class="timeline-post">
                        <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                            <div class="content">
                                <h5><a href="#">John Doe</a></h5>
                                <p class="text-muted"><small>2 January at 9:30</small></p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <ul class="post-utility">
                            <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                            <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                            <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                        </ul>
                    </div>
                    <div class="timeline-post">
                        <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                            <div class="content">
                                <h5><a href="#">John Doe</a></h5>
                                <p class="text-muted"><small>2 January at 9:30</small></p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <ul class="post-utility">
                            <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                            <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                            <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                        </ul>
                    </div>
                </div>


                <div class="tab-pane active" id="user-settings">
                    <div class="tile user-settings">
                        <h4 class="line-head">Настройки</h4>
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Фамилия</label>
                                    <input class="form-control" type="text" name="surname" value="{{ $admin->surname }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Имя</label>
                                    <input class="form-control" type="text" name="name" value="{{ $admin->name }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Отчество</label>
                                    <input class="form-control" type="text" name="middle_name" value="{{ $admin->middle_name }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" value="{{ $admin->email }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Номер мобильного телефона</label>
                                    <input class="form-control" type="text" name="phone" value="{{ $admin->phone }}">
                                </div>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-default" type="submit" disabled>
                                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection