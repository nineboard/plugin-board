{{ XeFrontend::css('plugins/board/assets/css/board.css')->load() }}

<div class="board">
    <div class="board_header">
        @if ($isManager === true)
            <div class="bd_manage_area">
                <!-- [D] 클릭시 클래스 on 추가 -->
                <a href="#" class="btn_mng bd_manage __xe_select_area_show" data-selector=".bd_manage_detail">
                    <i class="xi-minus-square-o __xe_select_area_show" data-selector=".bd_manage_detail"></i> <span class="bd_hidden">{{ xe_trans('xe::manage') }}</span>
                </a>
            </div>
            @endif

                    <!-- 모바일뷰에서 노출되는 정렬 버튼 -->
            <div class="bd_select_area bd_manage pc_hidden">
                <!-- [D] 클릭시 클래스 on 추가 및 bd_align 영역 노출 -->
            </div>
            <!-- /모바일뷰에서 노출되는 정렬 버튼 -->

            <div class="bd_btn_area">
                <ul>
                    <!-- [D] 클릭시 클래스 on 및 추가 bd_search_area 영역 활성화 -->
                    <li><a href="#" class="bd_search __xe_select_area_show" data-selector=".bd_search_area"><span class="bd_hidden">{{ xe_trans('xe::search') }}</span>
                            <i class="xi-magnifier __xe_select_area_show" data-selector=".bd_search_area"></i></a>
                    </li>
                    <li><a href="{{ $urlHandler->get('create') }}"><span class="bd_hidden">{{ xe_trans('board::newPost') }}</span><i class="xi-pen"></i></a></li>
                    @if ($isManager === true)
                        <li><a href="{{ route('manage.board.board.edit', ['boardId'=>$instanceId]) }}" target="_blank"><span class="bd_hidden">{{ xe_trans('xe::manage') }}</span><i class="xi-cog"></i></a></li>
                    @endif
                </ul>
            </div>

            <div class="bd_sorting_area mb_hidden">
                @if($config->get('category') == true)
                    <div class="bd_select_area bd_align __xe_category_change">
                        <input type="hidden" name="categoryItemId" value="{{ Input::get('categoryItemId') }}" />
                        <a href="#" class="bd_select __xe_select_box_show">{{ $categoryItem ? xe_trans($categoryItem->word) : xe_trans('xe::category') }}</a>
                        <div class="bd_select_list" data-name="categoryItemId">
                            <ul>
                                <li><a href="#" data-value="">{{xe_trans('xe::category')}}</a></li>
                                @foreach ($categoryItems as $item)
                                    <li><a href="#" data-value="{{$item->id}}">{{xe_trans($item->word)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="bd_select_area bd_align __xe_order_change">
                    {!! uio('uiobject/board@select', [
                        'name' => 'orderType',
                        'label' => xe_trans('xe::order'),
                        'value' => Input::get('orderType'),
                        'items' => $handler->getOrders(),
                    ]) !!}
                </div>
            </div>

            <!-- 게시글 관리 -->
            @if ($isManager === true)
                <div class="bd_manage_detail">
                    <dl>
                        <dt>{{ xe_trans('xe::copy') }}</dt>
                        <dd class="__xe_copy">
                            {!! uio('uiobject/board@select', [
                                'name' => 'copyTo',
                                'label' => xe_trans('xe::select'),
                                'items' => $boardList,
                            ]) !!}
                            <a href="{{ $urlHandler->managerUrl('copy') }}" class="btn btn_primary __xe_btn_submit" style="display:none;"><i class="xi-check"></i> {{ xe_trans('xe::copy') }}</a>
                        </dd>
                        <dt>{{ xe_trans('xe::move') }}</dt>
                        <dd class="__xe_move">
                            {!! uio('uiobject/board@select', [
                                'name' => 'moveTo',
                                'label' => xe_trans('xe::select'),
                                'items' => $boardList,
                            ]) !!}
                            <a href="{{ $urlHandler->managerUrl('move') }}" class="btn btn_primary __xe_btn_submit" style="display:none;"><i class="xi-check"></i> {{ xe_trans('xe::move') }}</a>
                        </dd>
                        <dt>{{ xe_trans('xe::trash') }}</dt>
                        <dd class="bd_text __xe_to_trash">
                            <a href="#">{{ xe_trans('board::moveToTrash') }}</a>
                            <a href="{{ $urlHandler->managerUrl('trash') }}" class="btn btn_primary __xe_btn_submit" style="display:none;"><i class="xi-check"></i> {{ xe_trans('xe::move') }}</a>
                        </dd>
                        <dt>{{ xe_trans('xe::delete') }}</dt>
                        <dd class="bd_text __xe_delete">
                            <a href="#">{{ xe_trans('xe::delete') }}</a>
                            <a href="{{ $urlHandler->managerUrl('destroy') }}" class="btn btn_primary __xe_btn_submit" style="display:none;"><i class="xi-check"></i> {{ xe_trans('xe::delete') }}</a>
                        </dd>
                    </dl>
                </div>
                @endif
                        <!-- /게시글 관리 -->

                <!-- 검색영역 -->
                <div class="bd_search_area">
                    <form method="get" class="__xe_simple_search" action="{{ $urlHandler->get('index') }}">
                        <div class="bd_search_box">
                            <input type="text" name="title_pureContent" class="bd_search_input" title="{{ xe_trans('board::board') }} {{ xe_trans('xe::search') }}" placeholder="{{ xe_trans('xe::enterKeyword') }}" value="{{ Input::get('title_pureContent') }}">
                            <!-- [D] 클릭시 클래스 on 및 추가 bd_search_detail 영역 활성화 -->
                            <a href="#" class="bd_btn_detail __xe_select_area_show" data-selector=".bd_search_detail" title="{{ xe_trans('board::board') }} {{ xe_trans('board::detail') }}"><span class="bd_hidden">{{ xe_trans('board::detail') }}</span></a>
                        </div>
                    </form>
                    <form method="get" class="__xe_search" action="{{ $urlHandler->get('index') }}">
                        <input type="hidden" name="categoryItemId" value="{{ Input::get('categoryItemId') }}" />
                        <input type="hidden" name="orderType" value="{{ input::get('orderType') }}" />
                        <div class="bd_search_detail">
                            <dl>
                                <dt>{{ xe_trans('board::titleAndContent') }}</dt>
                                <dd><input type="text" name="title_pureContent" class="bd_input" title="{{ xe_trans('board::titleAndContent') }}" value="{{ Input::get('title_pureContent') }}"></dd>
                                <dt>{{ xe_trans('xe::writer') }}</dt>
                                <dd><input type="text" class="bd_input" title="{{ xe_trans('xe::writer') }}"></dd>
                                <!-- 확장 필드 검색 -->
                                @foreach($fieldTypes as $typeConfig)
                                    @if($typeConfig->get('searchable') === true)
                                        <dt>{{ $typeConfig->get('label') }}</dt>
                                        <dd>
                                            {!! XeDynamicField::get($config->get('documentGroup'), $typeConfig->get('id'))->getSkin()->search(Input::all()) !!}
                                        </dd>
                                        @endif
                                        @endforeach
                                                <!-- /확장 필드 검색 -->
                            </dl>
                            <div class="bd_search_footer">
                                <a href="#" class="bd_btn_search"><i class="xi-magnifier"></i><span class="bd_hidden">{{ xe_trans('xe::search') }}</span></a>
                                <a href="#" class="bd_btn_cancel"><i class="xi-close"></i><span class="bd_hidden">{{ xe_trans('xe::cancel') }}</span></a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /검색영역 -->

    </div>

    <div class="board_list v2 blog">
        <ul>
            @foreach($paginate as $item)
                <li>
                    <div class="title_area">
                        @if ($config->get('category') == true && $item->boardCategory !== null)
                            <span class="category">{!! $item->boardCategory->categoryItem->word !!}</span>
                        @endif
                        <a class="title" href="{{$urlHandler->getShow($item, Input::all())}}" id="title_{{$item->id}}">{!! $item->title !!}</a>
                    </div>
                    <div class="thumb_area">
                        <a href="#">
                            <img src="http://placehold.it/230x140" alt="">
                            @if($item->isNew($config->get('newTime')))
                                <span class="ribbon new"><span class="bd_hidden">new</span></span>
                            @endif
                        </a>
                    </div>
                    <div class="cont_area">
                        <p>{!! mb_substr($item->pureContent, 0, 100) !!}</p>
                        <div class="more_info">
                            <input type="checkbox" title="체크" class="bd_manage_check" value="{{ $item->id }}">
                                <span class="autohr_area">
                                    <a href="#" class="mb_autohr __xe_user" data-id="{{$item->userId}}">{!! $item->writer !!}</a>
                                </span>
                            @if (in_array('createdAt', $config->get('listColumns')) == true)
                                <span class="mb_time"><i class="xi-time"></i> {!! sprintf('‘%s', str_replace('-', '.', substr($item->createdAt, 2, 8))) !!}</span>
                            @endif
                            @if (in_array('readCount', $config->get('listColumns')) == true)
                                <span class="mb_read_num"><i class="xi-eye"></i> {{ $item->readCount }}</span>
                            @endif
                            <a href="#" class="mb_reply_num"><i class="xi-comment"></i> {{ $item->commentCount }}</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="board_footer">
        {!! $paginationPresenter->render() !!}
        {!! $paginationMobilePresenter->render() !!}
    </div>
    <div class="bd_dimmed"></div>
</div>