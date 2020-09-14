@extends('website.website')
@section('head')
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="/styles/main.css">
	<link rel="stylesheet" href="/styles/users.css" />
@endsection
@section('scripts')
     <!-- JS Scripts -->
    <script src="https://html.crumina.net/html-olympus/js/jQuery/jquery-3.5.1.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/jquery.appear.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/jquery.mousewheel.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/perfect-scrollbar.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/svgxuse.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/imagesloaded.pkgd.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/Headroom.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/popper.min.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/material.min.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/bootstrap-select.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/smooth-scroll.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/selectize.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/swiper.jquery.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/moment.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/daterangepicker.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/isotope.pkgd.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/ajax-pagination.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/jquery.magnific-popup.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/aos.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/purecounter_vanilla.js"></script>
    
    <script src="/js/crumina-main.js"></script>
    <script defer src="https://html.crumina.net/html-olympus/fonts/fontawesome-all.js"></script>
    
    <script src="https://html.crumina.net/html-olympus/Bootstrap/dist/js/bootstrap.bundle.js"></script>
    
    <!-- SVG icons loader -->
    <script src="https://html.crumina.net/html-olympus/js/svg-loader.js"></script>
    <!-- /SVG icons loader -->
    
    
    <script type="text/javascript" src="/js/video-to-frames.js"></script>
    <script src="/alljs/users_videos.js" defer></script>
@endsection

@section('content')
    <!-- Top Header-Profile -->
    
    
    <div id="notMyDesign">
        
        
    
        <div class="inner">
            @include('inc.users-menu')
            <div class="container-fluid">
            	<div class="row">
            		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            			<div class="ui-block">
            				<div class="ui-block-title">
            					<div class="h6 title">{{ $pageTitle }}</div>
                                
                                
                                @auth
                					<div class="align-right">
                						<a href="#" class="btn btn-primary btn-md-2" data-toggle="modal" data-target="#upload-video">Загрузить видео +</a>
                					</div>
            					@endauth
                                
                                
                                <?php /*
            					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
            					*/?>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div class="container-fluid">
            	<div class="row" id="videoList" data-user-link="/users/{{ $user->nickname }}" data-user-namef="{{ $user->namef() }}" data-user-avatar="{{ $user->avatar() }}">
            	    
            	    @if(count($wallvideos) == 0)
            	        <div class="col-12 no-video-col">
            	            <div class="no-video">
            	                @if(isset($currentUser) && $currentUser->id == $user->id)
                	                Вы пока не добавили ни одного видео
                	            @else
                	                Пользователь еще не добавил ни одного видео
                	            @endif
            	            </div>
            	        </div>
            	    @endif
            	    
            	    @foreach($wallvideos as $wallvideo)
            		    <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            			
                			<div class="ui-block video-item">
                				<div class="video-player">
                				    <div class="video-player-img" style="background-image: url(/uploads/videos/{{ $user->nickname }}/{{ $wallvideo->img }})"></div>
                					<a data-id="{{ $wallvideo->id }}" data-time="{!! $wallvideo->timeElapsedString() !!}" data-desc="{{ $wallvideo->desc }}" @if($wallvideo->liked()) data-liked="1" @endif data-likes="{{ $wallvideo->likeCount }}" data-name="{{ $wallvideo->name }}" href="/uploads/videos/{{ $user->nickname }}/{{ $wallvideo->file_name }}" class="play-video">
                						<svg class="olymp-play-icon"><use xlink:href="#olymp-play-icon"></use></svg>
                					</a>
                					<div class="overlay overlay-dark"></div>
                			
                					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></div>
                				</div>
                			
                				<div class="ui-block-content video-content">
                					<a href="#" class="h6 title">{{ $wallvideo->name }}</a>
                					<time class="published">{{ $wallvideo->duration }}</time>
                				</div>
                			</div>
                			
                		</div>
            		@endforeach
            		
            		<div class="pagination">
            		    {!! $wallvideos->links() !!}
            		</div>
            	</div>
            </div>
        </div>
        <a class="back-to-top" href="#">
        	<img src="https://html.crumina.net/html-olympus/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
        </a>
        
        
        
        
        <!-- Window-popup-CHAT for responsive min-width: 768px -->
        <?php /* 
        <div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">
        
        	<div class="modal-content">
        		<div class="modal-header">
        			<span class="icon-status online"></span>
        			<h6 class="title" >Chat</h6>
        			<div class="more">
        				<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
        				<svg class="olymp-little-delete js-chat-open"><use xlink:href="#olymp-little-delete"></use></svg>
        			</div>
        		</div>
        		<div class="modal-body">
        			<div class="mCustomScrollbar">
        				<ul class="notification-list chat-message chat-message-field">
        					<li>
        						<div class="author-thumb">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
        						</div>
        						<div class="notification-event">
        							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
        							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
        						</div>
        					</li>
        
        					<li>
        						<div class="author-thumb">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/author-page.jpg" alt="author" class="mCS_img_loaded">
        						</div>
        						<div class="notification-event">
        							<span class="chat-message-item">Don’t worry Mathilda!</span>
        							<span class="chat-message-item">I already bought everything</span>
        							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
        						</div>
        					</li>
        
        					<li>
        						<div class="author-thumb">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
        						</div>
        						<div class="notification-event">
        							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
        							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
        						</div>
        					</li>
        				</ul>
        			</div>
        
        			<form class="need-validation">
        
        		<div class="form-group">
        			<textarea class="form-control" placeholder="Press enter to post..."></textarea>
        			<div class="add-options-message">
        				<a href="#" class="options-message">
        					<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
        				</a>
        				<div class="options-message smile-block">
        
        					<svg class="olymp-happy-sticker-icon"><use xlink:href="#olymp-happy-sticker-icon"></use></svg>
        
        					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat1.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat2.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat3.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat4.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat5.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat6.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat7.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat8.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat9.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat10.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat11.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat12.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat13.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat14.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat15.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat16.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat17.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat18.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat19.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat20.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat21.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat22.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat23.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat24.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat25.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat26.png" alt="icon">
        							</a>
        						</li>
        						<li>
        							<a href="#">
        								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat27.png" alt="icon">
        							</a>
        						</li>
        					</ul>
        				</div>
        			</div>
        		</div>
        
        	</form>
        		</div>
        	</div>
        
        </div>
        <?php */?>
        
        <div class="modal fade" id="upload-video" tabindex="-1" role="dialog" aria-hidden="true">
        	<div class="modal-dialog window-popup create-photo-album" role="document">
        		<div class="modal-content">
        			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
        				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
        			</a>
        
        			<div class="modal-header">
        				<h6 class="title">Добавить видео</h6>
        			</div>
        
        			<form id="uploadVideo" action="{{ route('users_add_video', $user->nickname) }}" enctype="multipart/form-data" method="post" class="modal-body">
                        @csrf
            			<div class="form-group label-floating">
            				<label class="control-label">Имя видео</label>
            				<input class="form-control" name="name" placeholder="" type="text" value="" required>
            			
            			     <input type="file" name="video" accept=".mp4,.avi" />
            			</div>
            			
            			
            			<div class="form-group label-floating">
            				<label class="control-label">Описание видео</label>
            				<textarea class="form-control" name="desc" required></textarea>
            			</div>
            
            			<div class="photo-album-wrapper">
            				<a class="photo-album-item-wrap col-3-width upload-video" href="#">
            					<div class="photo-album-item create-album">
            						<div class="content">
            							<div class="btn btn-control bg-primary">
            								<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
            							</div>
            
            							<div class="title h5">Добавить видео...</div>
            						</div>
            					</div>
            				</a>
            			</div>
            			
            			<div class="video-frames ka-row">
            			    
            			</div>
                        
                        <input type="hidden" name="img" />
                
            			<button class="btn btn-secondary btn-lg btn--half-width cancel-upload-video">Отменить</button>
            			<button class="btn btn-primary btn-lg btn--half-width">
            			    Опубликовать видео<div class="ripple-container"></div>
            			 </button>
            
            		</form>
            		
            		
            		
        		</div>
        	</div>
        </div>
        <div id="videoPopup" class="total-popup videocall-popup user-video-popup">
            <div class="videocall-popup-inner">
                <div class="container-fluid">
                	<div class="row">
                		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                			<!-- Features Video -->
                			<div class="ui-block features-video">
                				<div class="video-player">
                					<!--<img loading="lazy" src="https://html.crumina.net/html-olympus/img/video9.jpg" alt="photo">-->
                					<video  controls></video>
                					<!--<a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">-->
                					<!--	<svg class="olymp-play-icon"><use xlink:href="#olymp-play-icon"></use></svg>-->
                					<!--</a>-->
                			
                					<!--<div class="video-content">-->
                					<!--	<div class="h4 title">Rock Garden Festival - Day 3</div>-->
                					<!--	<time class="published" datetime="2017-03-24T18:18">12:06</time>-->
                					<!--</div>-->
                			
                					<!--<div class="overlay"></div>-->
                				</div>
                			
                				<div class="features-video-content">
                			
                					<article class="hentry post">
                			
                						<div class="post__author author vcard inline-items">
                						    <a href="#">
                						        <img loading="lazy" src="https://html.crumina.net/html-olympus/img/author-page.jpg" alt="author">
                						    </a>
                							
                			
                							<div class="author-date">
                								<a class="h6 post__author-name fn" href="#"></a>
                								<div class="post__date">
                									<time class="published"></time>
                								</div>
                							</div>
                			                
                							<!--<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>-->
                							<!--	<ul class="more-dropdown">-->
                							<!--		<li>-->
                							<!--			<a href="#">Edit Post</a>-->
                							<!--		</li>-->
                							<!--		<li>-->
                							<!--			<a href="#">Delete Post</a>-->
                							<!--		</li>-->
                							<!--		<li>-->
                							<!--			<a href="#">Turn Off Notifications</a>-->
                							<!--		</li>-->
                							<!--		<li>-->
                							<!--			<a href="#">Select as Featured</a>-->
                							<!--		</li>-->
                							<!--	</ul>-->
                							<!--</div>-->
                			
                						</div>
                			
                						<p class="post-description"></p>
                			
                						<div class="post-additional-info inline-items">
                			
                							<a href="#" data-id="" data-model="WallVideo" class="model-like post-add-icon inline-items">
                								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
                								<span>0</span>
                							</a>
                			
                							<div class="comments-shared">
                								<a href="#" class="post-add-icon inline-items">
                									<svg class="olymp-speech-balloon-icon"><use xlink:href="#olymp-speech-balloon-icon"></use></svg>
                									<span>0</span>
                								</a>
                			
                								<a href="#" class="post-add-icon inline-items">
                									<svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>
                									<span>0</span>
                								</a>
                							</div>
                			
                						</div>
                			
                			
                			
                					</article>
                			
                					<div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" data-ps-id="9e61ab05-11a1-d600-115f-0c296f4f9c0c">
                			
                						<ul class="comments-list">
                							<li class="comment-item">
                								<div class="post__author author vcard inline-items">
                									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar48-sm.jpg" alt="author">
                			
                									<div class="author-date">
                										<a class="h6 post__author-name fn" href="#">Marina Valentine</a>
                										<div class="post__date">
                											<time class="published" datetime="2017-03-24T18:18">
                												46 mins ago
                											</time>
                										</div>
                									</div>
                			
                									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
                			
                								</div>
                			
                								<p>I had a great time too!! We should do it again!</p>
                			
                								<a href="#" class="post-add-icon inline-items">
                									<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
                									<span>8</span>
                								</a>
                								<a href="#" class="reply">Reply</a>
                							</li>
                			
                							<li class="comment-item">
                								<div class="post__author author vcard inline-items">
                									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar4-sm.jpg" alt="author">
                			
                									<div class="author-date">
                										<a class="h6 post__author-name fn" href="#">Chris Greyson</a>
                										<div class="post__date">
                											<time class="published" datetime="2017-03-24T18:18">
                												1 hour ago
                											</time>
                										</div>
                									</div>
                			
                									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
                			
                								</div>
                			
                								<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                			
                								<a href="#" class="post-add-icon inline-items">
                									<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
                									<span>7</span>
                								</a>
                								<a href="#" class="reply">Reply</a>
                			
                							</li>
                						</ul>
                			
                					<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; height: 110px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 32px;"></div></div></div>
                			        @auth
                    					<form class="comment-form inline-items">
                			
                						<div class="post__author author vcard inline-items">
                							<img loading="lazy" src="{{ $currentUser->avatar() }}" alt="author">
                			
                							<div class="form-group with-icon-right is-empty">
                								<textarea class="form-control" placeholder="Введите комментарий..."></textarea>
                								<div class="add-options-message">
                									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                										<svg class="olymp-camera-icon"><use xlink:href="#olymp-camera-icon"></use></svg>
                									</a>
                								</div>
                							<span class="material-input"></span></div>
                						</div>
                			
                					</form>
                					@endauth
                				</div>
                			
                			</div>
                			
                			<!-- ... end Features Video -->
                		</div>
                    </div>
                </div>
                <div class="total-popup-close">X</div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
@endsection


    